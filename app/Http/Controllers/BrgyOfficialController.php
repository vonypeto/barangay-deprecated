<?php

namespace App\Http\Controllers;

use App\Models\brgy_official;
use App\Models\area_setting;
use Illuminate\Http\Request;

class BrgyOfficialController extends Controller
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
     * @param  \App\Models\brgy_official  $brgy_official
     * @return \Illuminate\Http\Response
     */
    public function show(brgy_official $brgy_official,area_setting $area_setting)
    {
        $brgy_official =  brgy_official::all();
        $official_empty = brgy_official::orderBy('official_id')
                ->limit(1)
                ->get();
        $area_setting = area_setting::all();
        $area_empty = brgy_official::orderBy('official_id')
                ->limit(1)
                ->get();


        return view('pages.setting.maintenance',
        ['brgy_officials'=>$brgy_official,
        'official_empty'=>$official_empty,'area_setting'=>$area_setting,'area_empty'=>$area_empty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brgy_official  $brgy_official
     * @return \Illuminate\Http\Response
     */
    public function edit(brgy_official $brgy_official)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brgy_official  $brgy_official
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brgy_official $brgy_official)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brgy_official  $brgy_official
     * @return \Illuminate\Http\Response
     */
    public function destroy(brgy_official $brgy_official)
    {
        //
    }
}
