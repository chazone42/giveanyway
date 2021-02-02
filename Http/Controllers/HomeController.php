<?php

namespace App\Http\Controllers;

use App\Models\StepForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function myproject(Request $request)
    {
        $myproject = DB::select('SELECT *, (SELECT imageName FROM stepforms_media
        WHERE stepform_id = sf.id AND target = "acimg") AS acimg FROM stepforms AS sf
        WHERE sf.status = 2 AND user_id = '.Auth::id());
        $chunk = array_chunk($myproject, 4);
        
        return view('myproject', ['myproject' => $chunk]);
    }
}
