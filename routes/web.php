<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('userindex');
Route::get('/contact_us', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/home', [HomeController::class, 'redirectToHome'])->name('redirectohome')->middleware('auth', 'verified' );




Route::post('/appointment', [HomeController::class, 'appointment'])->name('appointment');

Route::get('/my_appointment', [HomeController::class, 'showAppointment'])->name('showappointment');

Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancelAppointment'])->name('cancelappointment');

Route::get('/doctors', [HomeController::class, 'showAllDoctors'])->name('showalldoctors');

Route::post('/contact', [HomeController::class, 'contactUs'])->name('contactusemail');

Route::middleware(['auth', 'isAdmin'])->group(function () {


    Route::get('/add_doctor', [AdminController::class, 'AddDoctor'])->name('adddoctor');
    Route::post('/save_doctor', [AdminController::class, 'saveDoctor'])->name('savedoctor');

    Route::get('/show_appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments');

    Route::get('/admincancel_appointment/{id}', [AdminController::class, 'cancelAppointment'])->name('admin.cancelappointment');

    Route::get('/approve_appointment/{id}', [AdminController::class, 'approveAppointment'])->name('admin.approveappointment');

    Route::get('/show_doctors', [AdminController::class, 'showDoctors'])->name('admin.showdoctors');

    Route::get('/edit_doctor/{id}', [AdminController::class, 'editDoctor'])->name('admin.editdoctor');

    Route::get('/delete_doctor/{id}', [AdminController::class, 'deleteDoctor'])->name('admin.deletedoctor');

    Route::post('/update_doctor/{id}', [AdminController::class, 'updateDoctor'])->name('admin.updatedoctor');

    Route::get('/mail_view/{id}', [AdminController::class, 'viewMail'])->name('admin.viewmail');

    Route::post('/send_mail/{id}', [AdminController::class, 'sendMail'])->name('admin.sendmail');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
