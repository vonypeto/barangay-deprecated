<?php
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrgyOfficialController;
use App\Http\Controllers\ResidentInfoController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\PersonInvolveController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BarangayimageController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UnscheduleController;
use App\Http\Controllers\ScheduleTodayController;
use App\Http\Controllers\SettledCasesController;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

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
Route::get('/', function () {
    return redirect('/home');
});


/*
Route::get('/blotter',[BlotterController::class, 'show']);
Route::get('/schedule',[ScheduleController::class, 'show']);
Route::get('/setting/maintenance',[BrgyOfficialController::class, 'show']);
Route::get('/setting/account',[AccountController::class, 'show']);
Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/setting/maintenance', [BrgyOfficialController::class, 'show']);
Route::get('/setting/account', [AccountController::class, 'show']);
*/

//start von
//dashboard
Route::get('/dashboard',[DashboardController::class, 'dashboard']);
//resident

Route::resource('resident', ResidentInfoController::class);
Route::get('resident/person/{resident_id}', [ResidentInfoController::class, 'person']);
Route::get('resident/person/{resident_id}/blotter/', [ResidentInfoController::class, 'blotter']);


//maintenance
Route::resource('setting/maintenance', BrgyOfficialController::class);
Route::get('setting/maintenance/official/table', [BrgyOfficialController::class, 'barangay'])->name('barangay.index');
Route::post('setting/maintenance/official/table', [BrgyOfficialController::class, 'barangayPOST'])->name('barangay.post');
Route::get('setting/maintenance/official/table/{barangay}/edit', [BrgyOfficialController::class, 'barangayedit'])->name('barangay.edit');
Route::delete('setting/maintenance/official/table/{barangay}/', [BrgyOfficialController::class, 'barangaydelete'])->name('barangay.destroy');
Route::post('setting/maintenance/barangay/image', [ BarangayimageController::class, 'store' ])->name('image.store');

//Route::get('image/view', [BarangayimageController::class, 'boot']);
//Route::post('setting/maintenance/official/table/{official}/edit', [BrgyOfficialController::class, '']);
//Route::get('invoice', [PagesController::class, 'invoice']);

//Certificate
Route::resource('certificate', CertificateController::class);
Route::get('certificate/table/paid', [CertificateController::class, 'certrequestpaid'])->name('certrequestpaid.index');
Route::post('certificate/table/paid', [CertificateController::class, 'storerequest'])->name('storerequest.post');
Route::delete('certificate/table/paid/{request_id}', [CertificateController::class, 'deleterequest'])->name('deleterequest.delete');

Route::get('certificate/table/type', [CertificateController::class, 'certificate_type'])->name('certificate_type.index');
Route::post('certificate/table/type', [CertificateController::class, 'certtypesubmit'])->name('certtypesubmit.post');
Route::get('certificate/table/type/{cert_id}/edit', [CertificateController::class, 'certtypeedit'])->name('certtypesubmit.edit');
Route::delete('certificate/table/type/{cert_id}', [CertificateController::class, 'certtypedelete'])->name('certtypedelete.delete');


//end von






// Rojhon pogi
// Blotter
Route::get('/blotter', [BlotterController::class, 'show']);
Route::resource('blotters', BlotterController::class);

// Person Involves
Route::resource('personinvolves', PersonInvolveController::class);

//Settlement Schedule
Route::get('/schedule', [ScheduleController::class, 'index']);

Route::resource('schedules', ScheduleController::class);
Route::resource('unschedules', UnscheduleController::class);
Route::resource('scheduletoday', ScheduleTodayController::class);
Route::resource('settled', SettledCasesController::class);

// Rojhon pogi paren






























Route::get('/invoice', function () {
    return view('invoice');

    $pdf = PDF::loadView('invoice')->setOptions(['defaultFont' => 'sans-serif']);;
    return $pdf->download('invoice.pdf');
});

Route::get('/invoice-pdf', function () {
 //   return view('/invoice-pdf');

    $pdf = PDF::loadView('invoice-pdf')->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled' => true,'format' => 'letter']);;
    return $pdf->download('invoice.pdf');
});



Route::get('/certificates', function () {
    return view('certificate');


});
Route::get('/certificate-pdf', function () {
    return view('certificate-pdf');

    $pdf = PDF::loadView('certificate-pdf')->setPaper('A4','portrait')->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled' => true]) ;
    return $pdf->download('certificate.pdf');
});


Route::resource('books', BooksController::class);
Route::get('sampledata', [PagesController::class, 'sampledata']);

