<?php

namespace App\Http\Controllers;

use App\Models\blotters;
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

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBlotter">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->blotter_id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBlotter">Delete</a>';

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
        blotters::updateOrCreate(
            ['blotter_id' => $request->blotter_id],
            ['incident_narrative' => $request->incident_narrative]
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
        $blotter = blotters::all();
        return view('pages.blotter', ['blotter' => $blotter]);
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
