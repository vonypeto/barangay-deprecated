<?php

namespace App\Http\Controllers;

use App\Models\resident_info;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
class ResidentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if($request->ajax()){

            $data = resident_info::latest()->get();
            return Datatables::of($data)
                       ->addIndexColumn()
                    ->addcolumn('action',function($row){
                    $button = '<button name="show" id="'.$row->resident_id.'" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </button>';
                    $button .=  '<button name="edit id="'.$row->resident_id.'" class="edit btn btn-info btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i> </button>';
                        return $button;

                    })
                    ->rawColumns(['action'])
                    ->make(true);

        }
        return view('pages.sample_data');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    $resident = new resident_info();

        $resident->lastname = $request->input('lastname');
        $resident->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\resident_info  $resident_info
     * @return \Illuminate\Http\Response
     */
    public function show(resident_info $resident_info)
    {
       $resident_info = resident_info::all();


        return view('pages.resident',['resident_info'=>$resident_info]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resident_info  $resident_info
     * @return \Illuminate\Http\Response
     */
    public function edit(resident_info $resident_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resident_info  $resident_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resident_info $resident_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resident_info  $resident_info
     * @return \Illuminate\Http\Response
     */
    public function destroy(resident_info $resident_info)
    {
        //
    }
}
