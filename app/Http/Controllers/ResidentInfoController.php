<?php

namespace App\Http\Controllers;

use App\Models\resident_info;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class ResidentInfoController extends Controller
{

    public function index(Request $request)
    {
        $resident = resident_info::latest()->get();
        if ($request->ajax()) {
            $data = resident_info::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $chk = '
                             <input type="checkbox" class="flat icheckbox_flat-green checkBoxClass" id="checked" onclick="validate()" name="ids" data-id="'.$row->resident_id.'" name="table_records">';
                        return $chk;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_id.'" data-original-title="Edit" class="edit btn btn-info  btn-xs pr-4 pl-4 editResident"><i class="fa fa-pencil fa-lg"></i> </a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"   data-id="'.$row->resident_id.'" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deleteresident"><i class="fa fa-trash fa-lg"></i> </a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->resident_id.'" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewresident"><i class="fa fa-folder fa-lg"></i> </a>';
                         return $btn;
                 })
                   ->rawColumns(['checkbox','action'])
                    ->make(true);
        }

        return view('pages.resident',compact('resident'));
    }
    public function store(Request $request)
    {
        resident_info::updateOrCreate(['resident_id' => $request->resident_id],
        ['lastname' => $request->lastname, 'firstname' => $request->firstname]);
        return response()->json(['success'=>'resident saved successfully.']);
    }

    public function person($resident_id)
    {
        $person_involve = DB::table('person_involves')
        ->where('resident_id','=',$resident_id)
        ->get();
       return response()->json($person_involve);
    }
    public function blotter($resident_id,Request $request){
        if($request->ajax()){
            $data = DB::table('person_involves')
            ->select('blotters.blotter_id')
            ->join('blotters','blotters.blotter_id','=','person_involves.blotter_id')
            ->where('person_involves.resident_id','=',$resident_id)
            ->get();
            return(Datatables::of($data)->make(true));
        }
}
    public function edit($id)
    {
        $resident_info = resident_info::find($id);
        return response()->json($resident_info);
    }
    public function destroy($id)
    {
        resident_info::find($id)->delete();
        return response()->json(['success'=>'Resident deleted successfully.']);
    }

}
