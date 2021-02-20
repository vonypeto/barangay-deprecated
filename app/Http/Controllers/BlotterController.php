<?php

namespace App\Http\Controllers;

use App\Models\blotters;
use Illuminate\Http\Request;

class BlotterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('pages.blotter',['blotter'=>$blotter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blotter  $blotter
     * @return \Illuminate\Http\Response
     */
    public function edit(blotters $blotter)
    {
        //
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
    public function destroy(blotters $blotter)
    {
        //
    }
}
