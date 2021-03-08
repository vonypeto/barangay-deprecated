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
        ->where('area','=','gitna')->first();

       // echo $add + $area_setting->population;


        $resident_area = DB::table('area_settings')
        ->where('area','=','gitna')->count();

       // echo $resident_area;
       $sss = DB::table('area_settings')
       ->where('area','=','14')
       ->get();
       echo $sss;
       echo "dasa";


       $data = DB::table('area_settings')
       ->select('area')->get();

       if(count($data))
        foreach ($data as $data) {

            $test = DB::table('resident_infos')
            ->where('area','=',$data->area)->count();

            area_setting::where('area', '=', $data->area)
           ->update(['population' => $test]);

            echo $test;
            echo "<br>";


        }



       /*



// try this after software

        Flight::where('active', 1)
      ->where('destination', 'San Diego')
      ->update(['delayed' => 1]);












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
