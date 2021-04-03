<?php

namespace App\Http\Controllers\ClientSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\resident_account;
use App\Models\resident_info;
use App\Models\area_setting;

//Plugins
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

// Custom Rules
use App\Rules\ResidentConfirmPassword;
use App\Rules\ResidentEmailExists;

class ResidentUserAccountController extends Controller
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
        session(['resident.username' => $resident->username]);
        session(['resident.id' => $resident->resident_id]);

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

        //Validation Success
        $resident_info = resident_info::where("email","=", $request->register_email)->first();
        
        //Check if resident_info exist
        if ($resident_info == null) {
            $new_resident_info = new resident_info;
        }
        else {
            $new_resident_info = $resident_info;
        }

        //resident_info insert
        $new_resident_info->firstname = $request->register_firstname;
        $new_resident_info->lastname = $request->register_lastname;
        $new_resident_info->email = $request->register_email;
        $query = $new_resident_info->save();

        // $resident_info = resident_info::where("email","=", $request->register_email)->first();

        //resident_account insert
        $new_resident = new resident_account;
        $new_resident->resident_id = $new_resident_info->resident_id;
        $new_resident->first_name = $request->register_firstname;
        $new_resident->last_name = $request->register_lastname;
        $new_resident->username = $request->register_username;
        $new_resident->email = $request->register_email;
        $new_resident->password = Hash::make($request->register_password);
        $query = $new_resident->save();
        
        return redirect ("/barangay/login")->with('success_register', 'Account successfully registered!');
    }

    public function client_logout(){
        if (session()->has("resident")) {
            session()->pull("resident");
        }

        return redirect ("/barangay/login");
    }

}
