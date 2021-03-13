<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use app\Rules\emailValidate;
use Hash;
use Validator;
use DB;

// Custom Rules
use App\Rules\ConfirmPassword;

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
             "create_account_form_email"=> "required|ends_with:@gmail.com,@yahoo.com|unique:accounts,email",
             "create_account_form_password"=>"required|same:create_account_form_verify_password",
             "create_account_form_verify_password"=>"required|same:create_account_form_password"
         ],
         [
             "create_account_form_firstname.required" => "This field cannot be empty",
             "create_account_form_lastname.required" => "This field cannot be empty",
             "create_account_form_username.required" => "This field cannot be empty",
             "create_account_form_email.required" => "This field cannot be empty",
             "create_account_form_password.required" => "This field cannot be empty",
             "create_account_form_verify_password.required" => "This field cannot be empty",
 
             "create_account_form_email.ends_with" => "Valid email is required",
 
             "create_account_form_password.same" => "Password does not match",
             "create_account_form_verify_password.same" => "Password does not match",
         ]);
 
 
         if (!$validator->passes()) {
             return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
         }
         else {
             $values = [
                 'first_name'=>$request->create_account_form_firstname,
                  'last_name'=>$request->create_account_form_lastname,
                  'username'=>$request->create_account_form_username,
                  'email'=>$request->create_account_form_email,
                  'password'=>Hash::make($request->create_account_form_password),
                  'type'=> "admin",
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
    //    $account = Account::all();
    //    $session = Sessions::all();
    //  return view('pages.setting.account',['account'=>$account,'sessions'=>$session]);
     //  return view('hello');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
     public function update($id, Request $request)
     {
         $accounts = Account::findorfail($id);
 
         $request->request->add(['old_database_password' => $accounts->password]);
         
         $validator2 = Validator::make($request->all(),[
             "manage_account_username" => "required",
             "manage_account_current_password" => "required|same:old_database_password",
             "manage_account_new_password" => "required|same:manage_account_confirm_password",
             "manage_account_confirm_password" => "required|same:manage_account_new_password",
         ],
         [
             "manage_account_username.required" => "Username cannot be empty",
             "manage_account_new_password.required" => "New Password cannot be empty",
             "manage_account_current_password.required" => "Password cannot be empty",
             "manage_account_confirm_password.required" => "Please verify your password",
             "manage_account_current_password.same" => "Does not match with your old password",
             "manage_account_new_password.same" => "Password does not match",
             "manage_account_confirm_password.same" => "password does not match",
             
 
         ]);
 
         if (!$validator2->passes()) {
             return response()->json(['status'=> 0, 'error'=>$validator2->errors()->toArray()]);
         }
         else {
             // $values = [
             //     'password'=>$request->manage_account_new_password
             // ];
 
             // $query = DB::table('accounts')->update($values);
 
             // if($query) {
             //     return response()->json(['status'=>1, 'msg'=> 'Password has been changed']);
             // }
             
             $accounts -> password = Hash::make($request->manage_account_new_password);
             $accounts->save();
 
             return response()->json(['status'=>1, 'msg'=> 'Password has been changed']);
             
         }
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Account::find($id)->delete();

        return response()->json(['success'=>'Account deleted successfully.']);
    }

    public function accountSettingCheck(Request $request){
        $id = $request->current_id;
        $accounts = Account::findorfail($id);
        
        $validator = Validator::make($request->all(),[
            "new_input_modal" => ["required","sometimes"],
            "new_input_email_modal" => ["required", "ends_with:@gmail.com,@yahoo.com", "sometimes"],
            "current_password_modal_confirmation" => ["required", "same:new_input_modal", "sometimes"],
            "current_password_modal" => ["required", "sometimes", new ConfirmPassword($accounts->email)],

        ],
        [
            "new_input_modal.required" => "This cannot be empty.",
            "new_input_email_modal.required" => "This cannot be empty.",
            "new_input_email_modal.ends_with" => "We need a valid email!!",
            "current_password_modal.required" => "Please enter your password!!",
            "current_password_modal_confirmation.required" => "Verify your new password!!",
            "current_password_modal_confirmation.same" => "Does not match with new password"
            
        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
        }
        else {
    
            if ($request->table_edit == "firstname") {
                $accounts -> first_name = $request->new_input_modal;
                session(['user.firstname' => $request->new_input_modal]);
                $accounts->save();
            }

            if ($request->table_edit == "lastname") {
                $accounts -> last_name = $request->new_input_modal;
                $accounts->save();
            }

            if ($request->table_edit == "username") {
                $accounts -> username = $request->new_input_modal;
                $accounts->save();
            }

            if ($request->table_edit == "email") {
                $accounts -> email = $request->new_input_email_modal;
                $accounts->save();
            }

            if ($request->table_edit == "password") {
                $accounts -> password = Hash::make($request->new_input_modal);
                $accounts->save();
            }
    
            return response()->json(['msg'=>'Account information has been changed successfully.']);
            
        }
    }
}
