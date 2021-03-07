<?php

use App\Http\Controllers\BooksController;;

use App\Http\Controllers\BrgyOfficialController;
use App\Http\Controllers\ResidentInfoController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\BlotterForResController;
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



Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/setting/maintenance', [BrgyOfficialController::class, 'show']);
Route::get('/setting/account', [AccountController::class, 'show']);


//start von
Route::resource('resident', ResidentInfoController::class);
Route::get('resident/person/{resident_id}', [ResidentInfoController::class, 'person']);
Route::get('resident/person/{resident_id}/blotter/', [ResidentInfoController::class, 'blotter']);
Route::get('resident/person/{resident_id}/', [PersonInvolveController::class, 'index']);

Route::get('sampledata', [PagesController::class, 'sampledata']);



Route::resource('books', BooksController::class);


//end von

// Rojhon pogi
Route::get('/blotter', [BlotterController::class, 'show']);
Route::resource('blotters', BlotterController::class);
Route::resource('blotterforesident', BlotterForResController::class);
Route::get('/schedule', [ScheduleController::class, 'show']);

// Rojhon pogi paren
