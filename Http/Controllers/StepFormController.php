<?php

namespace App\Http\Controllers;

use App\Models\asset_add;
use App\Models\StepForm;
use App\Models\report;
use App\Models\statement;
use App\Models\StepFormdts;
use App\Models\StepFormmd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class StepFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('form');
    }

    public function stepform(Request $request){

        $form = New StepForm();

        // get list and sum detail
        $sum = 0;
        for($i = 0;$i < count($request->input('total'));$i++) {
            $sum += (INT)$request->input('total')[$i];
        }

        $form->projectname = $request->input('projectname');
        $form->detail = $request->input('detail');
        $form->object = $request->input('object');
        $form->sum = $sum;
        $form->total = 0;
        $form->startat = $request->input('startat');
        $form->endat = $request->input('endat');
        $form->tel = $request->input('tel');
        $form->email = $request->input('email');
        $form->cate = $request->input('cate');
        $form->status = 1;
        $form->namebank = $request->input('namebank');
        $form->numberbank = $request->input('numberbank');
        $form->bank = $request->input('bank');
        $form->branch = $request->input('branch');
        $form->user_id = Auth::id();


        $form->save();

        for($i = 0;$i < count($request->input('list'));$i++) {
            $detail = new StepFormdts();
            $detail->stepform_id = $form->id;
            $detail->list = $request->input('list')[$i];
            $detail->qty = $request->input('total')[$i];
            $detail->save();
        }

        $media = new StepFormmd();
        $media->stepform_id = $form->id;
        $media->target = 'eviimg';
        $media->imageName = $request->input('file_eviimg')[0];
        $media->save();

        $media = new StepFormmd();
        $media->stepform_id = $form->id;
        $media->target = 'acimg';
        $media->imageName = $request->input('file_acimg')[0];
        $media->save();

        for($i = 0;$i < count($request->input('file_pjimg'));$i++) {
            $media = new StepFormmd();
            $media->stepform_id = $form->id;
            $media->target = 'pjimg';
            $media->imageName = $request->input('file_pjimg')[$i];
            $media->save();
        }

        if($form){
            $red = redirect('/')->with('success','เสนอโครงการเรียบร้อย');
        } else{
            $red = redirect('stepform')->with('danger', 'Error Message');
        }
        return $red;
    }
    public function store_report(Request $request)
    {
        $report = new report();

        $report->problem = $request->input('mreport');
        $report->remark = $request->input('remark_report');
        $report->project_id = $request->input('project_id');
        $report->user_id = Auth::id();

        $report->save();

        if($report){
            $red = redirect('/')->with('success','แจ้งรายงานความไม่เหมาะสมเรียบร้อย');
        } else{
            $red = redirect('/')->with('danger', 'Error Message');
        }
        return $red;
    }
    function get_project(Request $request)
    {
        $id = $request->id;
        $project = StepForm::where('id', '=', $id)->get();
        $detail = StepFormdts::where('stepform_id', '=', $id)->get();
        $media = StepFormmd::where('stepform_id', '=', $id)
        ->where('target', '=', 'eviimg')->get();
        $donate = new statement();
        $donatelist = $donate->where('stepforms_id', '=', $id)
        ->where('type', '=', '1')->get()->toArray();

        $donatearr = array_chunk($donatelist, 3);

        return view('withdraw', [
            'project' => $project,
            'detail'=> $detail,
            'media' => $media,
            'donate' => $donatearr,
            'project_id' => $id
        ]);
    }
    function donate(Request $request)
    {
        $donate = new asset_add();
        dd($request);
    }
//    public function destroy($id){
//        $stepforms = DB::delete('delete * from stepforms where id=?',[$id]);
//        return view('home');
//    }

}
