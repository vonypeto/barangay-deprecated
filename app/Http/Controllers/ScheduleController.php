<?php

namespace App\Http\Controllers;

use App\Models\blotters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(blotters $schedule)
    {
        $schedule = DB::table('blotters')
            ->where('schedule', '=', 'Schedule')
            ->where('schedule_date', '<>', '')
            ->get();
        $unschedule = DB::table('blotters')
            ->where('schedule', '=', 'Unschedule')
            ->whereNull('schedule_date')
            // ->orWhereNull('schedule_time')
            ->get();
        $today = DB::table('blotters')
            ->where('schedule', '=', 'Schedule')
            ->where('schedule_date', '=', Carbon::today()->toDateString())
            ->get();
        $settled = DB::table('blotters')
            ->where('schedule', '=', 'Settled')
            ->get();
        $scheduleCount = $schedule->count();
        $unscheduleCount = $unschedule->count();
        $todayCount = $today->count();
        $settledCount = $settled->count();


        return view('pages.schedule', [
            'schedule' => $schedule,
            'unschedule' => $unschedule,
            'today' => $today,
            'settled' => $settled,
            'scheduleCount' => $scheduleCount,
            'unscheduleCount' => $unscheduleCount,
            'todayCount' => $todayCount,
            'settledCount' => $settledCount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
