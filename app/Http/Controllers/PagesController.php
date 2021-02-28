<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area_setting;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    //

    public function  sampledata(){

        $area_setting = DB::table('area_settings')
        ->where('area','=','wwww')->first();
        $add = 1;
        echo $add + $area_setting->population;
        /*
        $area_setting = $area_setting->get();
        foreach ($area_setting as $area_setting) {
            $add +=  $area_setting->population;
        }
        foreach ($area_setting as $area_setting) {
            echo $add;
        }
*/
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
}
