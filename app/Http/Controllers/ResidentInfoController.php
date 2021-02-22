<?php

namespace App\Http\Controllers;

use App\Models\resident_info;
use Illuminate\Http\Request;

class ResidentInfoController extends Controller
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
        return "welcome";
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
