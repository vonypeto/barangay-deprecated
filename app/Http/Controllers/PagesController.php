<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area_setting;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    //

    public function  sampledata(){

        // $data = DB::table('sessions')
        // ->select('username')
        // ->where('user_id', '=', 1);

        // $test = DB::table('sessions')
        // ->where('user_id', '=', 1)
        // ->update(['username' => "giannpogi"]);

        
        echo "running";
      



    }


    public function ajaxCall($page){

        if(Request::ajax()) {
           return view('content.'.$page)->render();
        } else {

        }
    }


    public function  dashboard(Request $request){

        if($request->ajax()){
            //ajax call
            return view('pages.dashboard')->render();
        }
        //http
        return view('pages.dashboard')->render();

    }

    public function  blotter(){

        return view('pages.blotter');

    }

    public function  schedule(){

        return view('pages.schedule');

    }
    public function  certificate(){

        return view('pages.certificate');

    }

    public function  account(){

        return view('pages.setting.account');

    }

    public function  maintenance(){

        return view('pages.setting.maintenance');

    }

    public function jakol(){

    }
}
