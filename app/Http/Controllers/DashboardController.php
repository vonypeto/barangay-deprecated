<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Certificate_request;
use App\Models\resident_info;
use App\Models\brgy_official;
use App\Models\area_setting;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $brgy_official = brgy_official::all();
        $area_setting = area_setting::all();
        $registered = DB::table('resident_infos')->count();
        $certificate_requests = DB::table('certificate_requests')->count();
        $male = DB::table('resident_infos')
            ->where('gender','=','Male')->count();
        $female = DB::table('resident_infos')
            ->where('gender','=','Female')->count();
        $voter = DB::table('resident_infos')
            ->where('voterstatus','=','Yes')->count();

        return view('pages.dashboard',['brgy_official'=>$brgy_official,'area_setting'=>$area_setting,
        'male'=>$male,'female'=>$female,'voter'=>$voter,'registered'=>$registered,'certificate_requests'=>$certificate_requests]);
    }


}
