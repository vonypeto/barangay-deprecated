<?php

namespace App\Http\Controllers;

use App\Models\resident_info;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlotterForResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resident = resident_info::latest()->get();

        if ($request->ajax()) {
            $data = resident_info::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->resident_id . '" data-original-title="Edit" class="edit btn btn-primary  btn-xs pr-4 pl-4 editBlotter"> Add </a>';

                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"   data-id="' . $row->resident_id . '" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deleteBlotter"><i class="fa fa-trash fa-lg"></i> </a>';
                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->resident_id . '" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewBlotter"><i class="fa fa-folder fa-lg"></i> </a>';

                    return $btn;
                })
                ->addColumn('fullname', function ($fullname) {
                    return $fullname->lastname . ", " . $fullname->firstname . " " . $fullname->middlename;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.blotter',  compact('resident'));
    }


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\blotter  $blotter
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(blotters $blotter)
    // {
    //     $resident = resident_info::all();
    //     $blotter = blotters::all();
    //     return view('pages.blotter', ['blotter' => $blotter,  'resident' => $resident]);
    // }
}
