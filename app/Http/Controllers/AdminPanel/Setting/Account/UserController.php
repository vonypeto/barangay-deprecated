<?php

namespace App\Http\Controllers\AdminPanel\Setting\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\Account;
use App\Models\Sessions;
//Plugins
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


// Custom Rules
use App\Rules\ConfirmPassword;
use App\Rules\EmailExists;

class UserController extends Controller
{
    public function login(){
        if (session()->has("user")) {
            return redirect("dashboard");
         }

        return view("pages.AdminPanel.user.login");
    }

    public function client_login(){
        if (session()->has("client")) {
            return redirect("/barangay/home");
         }

        return view('pages.ClientSide.userlogin.login');
    }

    public function check(Request $request){

        $validator = Validator::make($request->all(), [
            "login_email" => ["required", new EmailExists],
            "login_password" => ["required", new ConfirmPassword($request->login_email)]
        ],
        [
            "login_email.required" => "Enter your username!!!",
            "login_password.required" => "Enter your password!!!"
        ])->validate();

        $user = Account::where("email","=", $request->login_email)->first();

        session('user');
        session(['user.email' => $request->login_email]);
        session(['user.firstname' => $user->first_name]);
        session(['user.id' => $user->account_id]);
        session(['user.type' => $user->type]);


        $data = new Sessions;
        $data->user_id = $user->account_id;
        $data->username = $user->username;
        $data->login_at = Carbon::now();
        $query = $data->save();

        if ($user->type == "client") {
            return redirect("client");
        }
        else {
            return redirect("dashboard");
        }

    }

    public function client_check(Request $request){

        $validator = Validator::make($request->all(), [
            "client_login_email" => ["required", new EmailExists],
            "client_login_password" => ["required", new ConfirmPassword($request->client_login_email)]
        ],
        [
            "client_login_email.required" => "Enter your username!!!",
            "client_login_password.required" => "Enter your password!!!"
        ])->validate();

        $client = Account::where("email","=", $request->client_login_email)->first();

        session('client');
        session(['client.email' => $request->client_login_email]);
        session(['client.firstname' => $client->first_name]);
        session(['client.id' => $client->account_id]);
        session(['client.type' => $client->type]);

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
            "register_email" => ["required", "ends_with:@gmail.com,@yahoo.com", "unique:accounts,email"],
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


        $user = new Account;
        $user->first_name = $request->register_firstname;
        $user->last_name = $request->register_lastname;
        $user->username = $request->register_username;
        $user->email = $request->register_email;
        $user->password = Hash::make($request->register_password);
        $user->type = "Client";
        $query = $user->save();

        return back()->with('success_register', 'Account successfully registered!');
    }

    public function profile(){

        if (!session()->has("user")) {
            return back();
        }
        return view ("pages.AdminPanel.user.profile");
    }

    
    public function logout(){
        if (session()->has("user")) {
            session()->pull("user");
        }

        return redirect ("login");
    }

    public function client_logout(){
        if (session()->has("client")) {
            session()->pull("client");
        }

        return redirect ("/barangay/login");
    }
}
