<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnrollFormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('enroll');
    }

    public function enrollform(Request $request){

//        $new_name = rand().'.'.$request->idcardimg->extension();
//        $request->idcardimg->move(public_path('enrollimg'), $new_name);

        $enroll = new Enroll();
        $enroll->prefix = $request->input('prefix');
        $enroll->firstname = $request->input('firstname');
        $enroll->lastname = $request->input('lastname');
        $enroll->company = $request->input('company');
        $enroll->idcard = $request->input('idcard');
        $enroll->housenum = $request->input('housenum');
        $enroll->road = $request->input('road');
        $enroll->district = $request->input('district');
        $enroll->country = $request->input('country');
        $enroll->province = $request->input('province');
        $enroll->postalcode = $request->input('postalcode');
        $enroll->tel = $request->input('tel');
//        $enroll->new_name = $new_name;

        if ($request->hasFile('idcardimg')){
            $file = $request->file('idcardimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('enrollimg/', $filename);
            $enroll->idcardimg = $filename;
        }else{
            return $request;
            $enroll->idcardimg ='';
        }

        $enroll->save();

        if($enroll){
            $red = redirect('/')->with('Success Title', 'ลงทะเบียนเรียบร้อย');
        } else{
            $red = redirect('enrollform')->with('Error Title', 'Error Message');
        }
        return $red;

    }

}
