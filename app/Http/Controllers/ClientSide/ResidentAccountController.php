<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\resident_account;

//Plugins
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

// Custom Rules
use App\Rules\ResidentConfirmPassword;
use App\Rules\ResidentEmailExists;

class ResidentAccountController extends Controller
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
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function show(resident_account $resident_account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function edit($resident_id)
    {
        $account = resident_account::find($resident_id);
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resident_account $resident_account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resident_account  $resident_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(resident_account $resident_account)
    {
        //
    }

    public function client_login(){
        if (session()->has("client")) {
            return redirect("/barangay/home");
         }

        return view('pages.ClientSide.userlogin.login');
    }

    public function client_check(Request $request){

        $validator = Validator::make($request->all(), [
            "client_login_email" => ["required", new ResidentEmailExists],
            "client_login_password" => ["required", new ResidentConfirmPassword($request->client_login_email)]
        ],
        [
            "client_login_email.required" => "Enter your username!!!",
            "client_login_password.required" => "Enter your password!!!"
        ])->validate();

        $resident = resident_account::where("email","=", $request->client_login_email)->first();

        session('resident');
        session(['resident.email' => $request->client_login_email]);
        session(['resident.firstname' => $resident->first_name]);
        session(['resident.id' => $resident->resident_account_id]);

        return redirect("/barangay/home");
        
    }

    public function client_register(){
        return view("pages.ClientSide.userlogin.register");
    }

    public function client_register_check(Request $request){

        $validator = Validator::make($request->all(), [
            "register_firstname" => "required",
            "register_lastname" => "required",
            "register_username" => "required",
            "register_email" => ["required", "ends_with:@gmail.com,@yahoo.com", "unique:resident_accounts,email"],
            "register_password" => ["required", "confirmed"],
            "register_password_confirmation" => "required"
        ],
        [
            "register_firstname.required" => "We need to know your name.",
            "register_lastname.required" => "We need to know your name.",
            "register_username.required" => "You need a username to register.",
            "register_email.required" => "Enter an email to register.",
            "register_email.ends_with" => "we need you to give us a valid email.",
            "register_password.required" => "Enter your password!!!",
            "register_password_confirmation.required" => "We need you to verify your password!!!"
        ])->validate();


        $new_resident = new resident_account;
        $new_resident->first_name = $request->register_firstname;
        $new_resident->last_name = $request->register_lastname;
        $new_resident->username = $request->register_username;
        $new_resident->email = $request->register_email;
        $new_resident->password = Hash::make($request->register_password);
        $query = $new_resident->save();

        return back()->with('success_register', 'Account successfully registered!');
    }

    public function client_logout(){
        if (session()->has("resident")) {
            session()->pull("resident");
        }

        return redirect ("/barangay/login");
    }

    public function ClientAccountSettingCheck(Request $request){
        $id = $request->current_id;
        $resident = resident_account::findorfail($id);

        $validator = Validator::make($request->all(),[
            "new_input_modal" => ["required","sometimes"],
            "new_input_username_modal" => ["required", "unique:resident_accounts,username","sometimes"],
            "new_input_email_modal" => ["required", "ends_with:@gmail.com,@yahoo.com","unique:resident_accounts,email", "sometimes"],
            "current_password_modal_confirmation" => ["required", "same:new_input_modal", "sometimes"],
            "current_password_modal" => ["required", "sometimes", new ResidentConfirmPassword($resident->email)],

        ],
        [
            "new_input_modal.required" => "This cannot be empty.",
            "new_input_email_modal.required" => "This cannot be empty.",
            "new_input_email_modal.ends_with" => "We need a valid email!!",
            "new_input_email_modal.unique" => "Thi email is already taken!!",
            "current_password_modal.required" => "Please enter your password!!",
            "new_input_username_modal.unique" => "Username taken.",
            "current_password_modal_confirmation.required" => "Verify your new password!!",
            "current_password_modal_confirmation.same" => "Does not match with new password"

        ]);

        if ($validator->fails()) {
            return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
        }
        else {

            if ($request->table_edit == "firstname") {
                $resident -> first_name = $request->new_input_modal;
                $resident->save();

                session(['resident.firstname' => $request->new_input_modal]);
            }

            if ($request->table_edit == "lastname") {
                $resident -> last_name = $request->new_input_modal;
                $resident->save();
            }

            if ($request->table_edit == "username") {

                $resident -> username = $request->new_input_username_modal;
                $resident->save();

            }

            if ($request->table_edit == "email") {
                $resident -> email = $request->new_input_email_modal;
                $resident->save();
            }

            if ($request->table_edit == "password") {
                $resident -> password = Hash::make($request->new_input_modal);
                $resident->save();
            }

            return response()->json(['msg'=>'Account information has been changed successfully.']);

        }
    }
}
