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

        $test = resident_info::latest()->get();

        if ($request->ajax()) {
            $data = resident_info::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_id.'" data-original-title="Edit" class="edit btn btn-primary  btn-xs pr-4 pl-4 editResident"><i class="fa fa-pencil fa-lg"></i> </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_id.'" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deleteresident"><i class="fa fa-folder fa-lg"></i> </a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.resident',compact('test'));
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

        resident_info::updateOrCreate(['resident_id' => $request->resident_id],
        ['lastname' => $request->lastname, 'firstname' => $request->firstname]);

        return response()->json(['success'=>'resident saved successfully.']);
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
    public function edit($id)
    {
        $resident_info = resident_info::find($id);
        return response()->json($resident_info);
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
    public function destroy($id)
    {
        resident_info::find($id)->delete();

        return response()->json(['success'=>'Book deleted successfully.']);
    }
}
