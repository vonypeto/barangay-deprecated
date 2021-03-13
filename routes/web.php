<?php
use App\Http\Controllers\BooksController;;
use App\Http\Controllers\BrgyOfficialController;
use App\Http\Controllers\ResidentInfoController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\ScheduleController;

use App\Http\Controllers\UserController;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard',[PagesController::class, 'dashboard']);
Route::get('/blotter',[BlotterController::class, 'show']);
Route::get('/schedule',[ScheduleController::class, 'show']);
Route::get('/setting/maintenance',[BrgyOfficialController::class, 'show']);


//start von
Route::resource('resident', ResidentInfoController::class);
Route::get('resident/person/{resident_id}', [ResidentInfoController::class, 'person']);
Route::get('resident/person/{resident_id}/blotter/', [ResidentInfoController::class, 'blotter']);

Route::get('sampledata', [PagesController::class, 'sampledata']);

Route::resource('books', BooksController::class);
//end von

//start giannpogi
Route::resource('/setting/account', AccountController::class);

//test
Route::get("login", [UserController::class, 'login']);
Route::get("profile", [UserController::class, 'profile']);
Route::get("register", [UserController::class, 'register']);
Route::post("register", [UserController::class, 'register_check']);
Route::post("login", [UserController::class, 'check']);
Route::get("logout", [UserController::class, 'logout']);

Route::post("/setting/account/form",[AccountController::class, 'accountSettingCheck'])->name("accountSettingCheck");

Route::get("/setting/account/session/table", [AccountController::class, 'getSessionTable'])->name("getSessionTable");

