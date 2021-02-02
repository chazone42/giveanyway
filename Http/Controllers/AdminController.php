<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    const OP_REPORT = [
        1 => "เนื้อโครงการนี้ไม่เหมาะสม",
        2 => "เนื้อหาโครงการนี้ไม่ใช่ของจริง",
        3 => "เนื้อโครงการนี้ไม่สมเหตุสมผล",
        4 => "หลักฐานที่แนบมาไม่ใช่ของจริง"
    ];
    const OP_STATUS = [
        1 => "สร้าง",
        2 => "อนุมัติ"
    ];
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $enrolls = DB::table('enrolls')->get();
        return view('admin', ['users' => $users]
            ,['enrolls' => $enrolls]);
    }

    public function status(Request $request, $id){
        $data = User::find($id);

        if($data->status ==0){
            $data->status=1;
        }else{
            $data->status=0;
        }
        $data->save();

        return Redirect::to('admin')->with('message', $data->name. 'OK');

    }

    public function showReport(Request $request)
    {
        $report = DB::select('SELECT *, (SELECT imageName FROM stepforms_media
        WHERE stepform_id = sf.id AND target = "eviimg") AS eviimg, rp.id as report_id FROM stepforms AS sf
        JOIN report AS rp ON rp.project_id = sf.id');
        return view('report')->with('reports', $report)->with('op_report', self::OP_REPORT);
    }
    public function confirm_report(Request $request)
    {
        if ($request->input('status') == 2) {
            $report = DB::table('report')->where('project_id', '=', $request->input('project_id'))->get();
            DB::table('stepforms')->where('id', $report[0]->project_id)->update(['status' => $request->input('status')]);
            DB::delete('delete from report where project_id=?', [$request->input('project_id')]);
        } else if ($request->input('status') == 3) {
            $report = DB::table('report')->where('project_id', '=', $request->input('project_id'))->get();
            DB::table('stepforms')->where('id', $report[0]->project_id)->update(['status' => $request->input('status')]);
        } else {
            $report = DB::table('report')->where('project_id', '=', $request->input('project_id'))->get();
            DB::table('stepforms')->where('id', $report[0]->project_id)->update(['status' => $request->input('status')]);
            DB::delete('delete from report where project_id=?', [$request->input('project_id')]);
        }

        return redirect('admin/report');
    }
    public function confirm()
    {
        $projects = DB::select('SELECT *, (SELECT imageName FROM stepforms_media
        WHERE stepform_id = sf.id AND target = "pjimg" ) AS acimg FROM stepforms AS sf
        WHERE sf.status = 1');

//        $id = $request->id;
//        $plan = DB::select('select * from `stepforms_details` where `stepform_id` = ?', [$id]);

//        return view('adminConfirm',['plan' => $plan])->with('projects', $projects)->with('op_status', self::OP_STATUS);
        return view('adminConfirm')->with('projects', $projects)->with('op_status', self::OP_STATUS);

    }


    public function projectAutherize(Request $request)
    {
        $update = DB::table('stepforms')->where('id', $request->get('id'))
        ->update(['status' => $request->input('status')]);

        return redirect('admin/confirm_stepform');
    }
//    public function statuspost(Request $request, $id){
//        $data = Enroll::find($id);
//
//        if($data->status ==0){
//            $data->status=1;
//        }else{
//            $data->status=0;
//        }
//        $data->save();
//
//        return Redirect::to('admin')->with('message', $data->firstname. 'OK');
//    }
}
