<?php

namespace App\Http\Controllers;

use App\Models\QR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Generator;

class QrcodeController extends Controller
{
    public function index(){

        $qrcode = new Generator;

        $qrcodes = DB::table('qrcodes')->get();
        return view('qrcode',['qrcodes'=>$qrcodes]);

//        $dat2 = $qrcode->size(200)->generate('hello');
//
//        $qrTxt = "";
//        $billerID = "";
//        $ref1 = "";
//        $ref2 = "";
//        $amount ="";

//        function countText($txt){
//
//            $billerID = "13";
//            $ref1 = "";
//
//            $txt=trim($txt);
//            $len = strlen($txt);
//            $len = str_pad($len,2,"0",STR_PAD_LEFT);
//
//            return ($len.$txt);
//        }
//        echo $text="00".countText('00020101021130610016A0000006770101120115099400223997994021309940022399790301053037645802TH63046429');




    }

//    public function gen(Request $request){
//
//        $qr = new QR();
//        $qr ->value = $request->input('value');
//
//        $qr->save();
//
////        $qrcode = new Generator;
////        $qrcode->size(500)->generate('Make a qrcode without Laravel!');
//    }
}
