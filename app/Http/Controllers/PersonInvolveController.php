<?php

namespace App\Http\Controllers;

use App\Models\blotters;
use App\Models\resident_info;
use App\Models\person_involve;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PersonInvolveController extends Controller
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
                ->addColumn('add_complainant', function ($row) {

                    $chk = '
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addComplainant addComplainantp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addComplainant' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addComplainant' . $row->resident_id . '" name="involvement_type[]" value="Complainant" hidden>';
                    return $chk;
                })
                ->addColumn('add_respondent', function ($row) {

                    $chk = '
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addRespondent addRespondentp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addRespondent' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addRespondent' . $row->resident_id . '" name="involvement_type[]" value="Respondent" hidden>';
                    return $chk;
                })
                ->addColumn('add_victim', function ($row) {

                    $chk = '
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addVictim addVictimp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addVictim' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addVictim' . $row->resident_id . '" name="involvement_type[]" value="Victim" hidden>';
                    return $chk;
                })
                ->addColumn('add_attacker', function ($row) {
                    $chk = '
                    <input type="checkbox" data-id="' . $row->resident_id . '" class="flat icheckbox_flat-green text-center addAttacker addAttackerp' . $row->resident_id . '" name="ids[]" value="' . $row->resident_id . '">
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addAttacker' . $row->resident_id . '" name="person_involve[]" value="' . $row->lastname . ", " . $row->firstname . " " . $row->middlename . '" hidden>
                    <input type="checkbox" class="flat icheckbox_flat-green text-center addAttacker' . $row->resident_id . '" name="involvement_type[]" value="Attacker" hidden>';
                    return $chk;
                })
                ->addColumn('fullname', function ($fullname) {
                    return $fullname->lastname . ", " . $fullname->firstname . " " . $fullname->middlename;
                })
                ->rawColumns(['add_complainant', 'add_respondent', 'add_victim', 'add_attacker'])
                ->make(true);
        }

        return view('pages.blotter',  compact('resident'));
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
     * @param  \App\Models\person_involve  $person_involve
     * @return \Illuminate\Http\Response
     */
    public function show(person_involve $person_involve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\person_involve  $person_involve
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resident = resident_info::find($id);
        return response()->json($resident);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\person_involve  $person_involve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, person_involve $person_involve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\person_involve  $person_involve
     * @return \Illuminate\Http\Response
     */
    public function destroy(person_involve $person_involve)
    {
        //
    }
}
