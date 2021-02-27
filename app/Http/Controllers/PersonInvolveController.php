<?php

namespace App\Http\Controllers;

use App\Models\person_involve;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\blotters;
use Illuminate\Support\Facades\DB;

class PersonInvolveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $blotter = blotters::latest()->get();
        if ($request->ajax()) {

                    $data2 = blotters::latest()->get();
                    return Datatables::of($data2)
                    ->make(true);



        }

        return view('pages.resident',compact('blotter'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blotter($resident_id){




        $person_involve = DB::table('person_involves')
      //  ->select('blotters.blotter_id','blotters.incident_type','blotters.status','blotters.date_reported','blotters.date_incident','blotters.incident_location')
      ->select('blotters.blotter_id')

      ->join('blotters','blotters.blotter_id','=','person_involves.blotter_id')
      //  ->where('blotters.blotter_id','=',$blotter_id)
        ->where(    'person_involves.resident_id','=',$resident_id)
        ->get();
       return response()->json(array($person_involve));




    }

}
