<?php

namespace App\Http\Controllers;

use App\Models\blotters;
use App\Models\resident_info;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlotterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blotters = blotters::latest()->get();

        if ($request->ajax()) {
            $data = blotters::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="Edit" class="edit btn btn-info  btn-xs pr-4 pl-4 editBlotter"><i class="fa fa-pencil fa-lg"></i> </a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"   data-id="' . $row->blotter_id . '" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deleteBlotter"><i class="fa fa-trash fa-lg"></i> </a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewBlotter"><i class="fa fa-folder fa-lg"></i> </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.blotter',  compact('blotters'));
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

        // if ($request->schedule_date != null && $request->schedule_time != null) {
        //     $request->schedule = "Schedule";
        // } else {
        //     $request->schedule = "Unschedule";
        // }

        if ($request->schedule_date != null) {
            $request->schedule = "Schedule";
        } else {
            $request->schedule = "Unschedule";
        }

        if ($request->status == "Settled") {
            $request->schedule = "Settled";
        }

        blotters::updateOrCreate(
            ['blotter_id' => $request->blotter_id],
            [
                'incident_location' => $request->incident_location,
                'incident_type' => $request->incident_type,
                'date_incident' => $request->date_incident,
                'time_incident' => $request->time_incident,
                'date_reported' => $request->date_reported,
                'time_reported' => $request->time_reported,
                'status' => $request->status,
                'schedule_date' => $request->schedule_date,
                // 'schedule_time' => $request->schedule_time,
                'schedule' => $request->schedule,
                'incident_narrative' => $request->incident_narrative
            ]
        );

        return response()->json(['success' => 'NewBlotter saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blotter  $blotter
     * @return \Illuminate\Http\Response
     */
    public function show(blotters $blotter)
    {
        $resident = resident_info::all();
        $blotter = blotters::all();
        return view('pages.blotter', ['blotter' => $blotter,  'resident' => $resident]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blotter  $blotter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blotter = blotters::find($id);
        return response()->json($blotter);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blotter  $blotter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blotters $blotter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blotter  $blotter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blotters::find($id)->delete();

        return response()->json(['success' => 'Blotter deleted successfully.']);
    }
}
