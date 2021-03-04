<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use app\Rules\emailValidate;
use Validator;
use DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accounts = Account::latest()->get();

        if ($request->ajax()) {
            $data = Account::latest()->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-username="'.$row->username.'" data-id="'.$row->account_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" id="selectBtn"></i><i class="fa fa-pencil" aria-hidden="true"></i> Select</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->account_id.'" data-original-title="Delete" class="btn btn-danger btn-sm" id="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.setting.account',compact('accounts'));
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
        $validator = Validator::make($request->all(),[
            "create_account_form_firstname"=>"required",
            "create_account_form_lastname"=>"required",
            "create_account_form_username"=>"required",
            "create_account_form_email"=> "required|ends_with:@gmail.com,@yahoo.com",
            "create_account_form_password"=>"required|same:create_account_form_verify_password",
            "create_account_form_verify_password"=>"required|same:create_account_form_password"
        ],
        [
            "create_account_form_firstname.required" => "Tang ina mo lagyan mo to!!",
            "create_account_form_email.ends_with" => "Ayusin mo email mo tang ina ka!"
        ]);


        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        else {
            $values = [
                'first_name'=>$request->create_account_form_firstname,
                 'last_name'=>$request->create_account_form_lastname,
                 'username'=>$request->create_account_form_username,
                 'email'=>$request->create_account_form_email,
                 'password'=>$request->create_account_form_password
            ];

            $query = DB::table('accounts')->insert($values);

            if($query) {
                return response()->json(['status'=>1, 'msg'=> 'Added new account :)']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account,Sessions $session)
    {
       $account = Account::all();
       $session = Sessions::all();
     return view('pages.setting.account',['account'=>$account,'sessions'=>$session]);
     //  return view('hello');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $accounts = Account::find($request->id);
        $accounts -> password = $request->password;
        $accounts->save();

        return response()->json(['success'=>'Password changed successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
