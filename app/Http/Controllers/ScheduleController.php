<?php

namespace App\Http\Controllers;

use App\Models\person_involve;
use App\Models\blotters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(blotters $schedule)
    {
        $person_involves = person_involve::all();

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
            'settledCount' => $settledCount,
            'person_involves' => $person_involves
        ]);
    }


    public function edit($id)
    {

        $blotter = blotters::find($id);
        $person_involve = person_involve::where('blotter_id', $blotter->blotter_id)->get();


        return response()->json([$blotter, $person_involve]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
