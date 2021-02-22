<?php

use App\Http\Controllers\BrgyOfficialController;
use App\Http\Controllers\ResidentInfoController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\ScheduleController;
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
Route::get('/setting/account',[AccountController::class, 'show']);
Route::get('/resident',[ResidentInfoController::class, 'show']);

//start von
Route::post('/resident/add',[ResidentInfoController::class, 'store']);


//end von
