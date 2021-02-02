<?php

namespace App\Http\Controllers;

use App\Models\statement;
use App\Models\StepForm;
use App\Models\StepFormdts;
use App\Models\StepFormmd;
use Illuminate\Http\Request;
//use App\Http\Controllers\DB;
use DB;
use SimpleSoftwareIO\QrCode\Generator;


class PostController extends Controller
{
    public function index()
    {
        $stepforms = DB::select('select `stepforms`.*, 
        (select `imageName` from `stepforms_media` where `stepform_id` = stepforms.id and `target` = "pjimg" limit 1)
        as `pjimg` from `stepforms` where `status` = 2 OR `status` = 3 order by `created_at` desc limit 6 offset 0');
    
        return view('home', ['stepforms'=>$stepforms]);
    }

    public function show($id){
        $stepforms = DB::select('select sf.*, rp.id AS report_id from stepforms AS sf
        LEFT JOIN report AS rp ON sf.id = rp.project_id where sf.id=?',[$id, $id]);

        $gallery = DB::table('stepforms_media')
        ->where('stepform_id', $id)
        ->where('target', 'pjimg')
        ->get();

        $plan = DB::select('select * from `stepforms_details` where `stepform_id` = ?', [$id]);

        $statement = new statement();
        $stt = $statement
        ->join('sf_withdraw', 'statement.id', '=', 'sf_withdraw.withdraw_id')
        ->where('statement.stepforms_id', '=', $id)
        ->where('type', '=', '0')
        ->get();
        
        return view('show',['stepforms'=>$stepforms, 'plan' => $plan, 'gallery' => $gallery, 'statement' => $stt]);
    }
}
