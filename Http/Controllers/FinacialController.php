<?php

namespace App\Http\Controllers;

use App\Models\asset;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\asset_add;
use App\Models\statement;
use App\Models\StepFormmd;
use DateTime;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;

class FinacialController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show_withdraw(Request $request)
    {
        $id = $request->id;
        $donate = new statement();
        $donatelist = $donate->where('stepforms_id', '=', $id)
        ->where('type', '=', '1')
        ->get()->toArray();

        $donatearr = array_chunk($donatelist, 3);

        return view('withdraw', [
            'donate' => $donatearr,
            'project_id' => $id,
        ]);
    }
    function Defaultdonate(Request $request)
    {
        $donate = new statement();

        /**
         * statements
         * Fields
         *
         * stepform_id
         * accountNumber
         * date
         * sum
         * currency
         * type
         */

        $statement = [
            ['6', '7070117272', '20200818', '700700.14', 'THB', '1'],
            ['6', '7070117272', '20200818', '731.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '16581.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '6026.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '30.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '-4126.00', 'THB', '0'],
            ['6', '7070117272', '20200818', '4408.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '30.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '107410.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '128.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '-107410.00', 'THB', '0'],
            ['6', '7070117272', '20200818', '-128.00', 'THB', '0'],
            ['6', '7070117272', '20200818', '2000.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '2500.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '30.00', 'THB', '1'],
            ['6', '7070117272', '20200818', '40519.42', 'THB', '1']
        ];

        for ($i = 0;$i < count($statement);$i++) {
            $stt = $statement[$i];

            DB::table('statement')->insert([
                'stepforms_id' => $stt[0], 
                'accountNumber' => $stt[1], 
                'date' => $stt[2], 
                'sum' => $stt[3], 
                'currency' => $stt[4], 
                'type' => $stt[5], 
            ]);
        }

        return redirect('/admin');
    }
    public function donate(Request $request)
    {
        $donate = new asset_add();

        $donate->stepforms_id = $request->id;
        $donate->user_id = Auth::id();
        $donate->baht = $request->get('input-baht');

        $donate->save();
        return redirect()->route('/projetcs', ['id' => $request->id]);
    }
    function save_withdraw(Request $request)
    {
        $media = new StepFormmd();

        if ($request->file_attrachments !== null) {
            $media->stepform_id = $request->project_id;
            $media->target = 'widthdraw';
            $media->imageName = $request->file_attrachments[0];

            $media->save();
        }

        $sttid = DB::table('statement')->insertGetId([
                'stepforms_id' => $request->project_id, 
                'accountNumber' => '7070117272', 
                'date' => date('Ymd'), 
                'sum' => (FLOAT)$request->donate*-1, 
                'currency' => "THB", 
                'type' => '0'
            ]);

        DB::table('sf_withdraw')->insert([
            'stepforms_id' => $request->project_id,
            'reason' => 'widthdraw',
            'img_id' => $media->id,
            'des' => $request->des,
            'withdraw_id' => $sttid
        ]);

        return redirect('/myproject/'.$request->project_id);
    }
}