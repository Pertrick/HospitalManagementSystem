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
Route::get('/home', [HomeController::class, 'redirectToHome'])->name('redirectohome');



Route::post('/appointment', [HomeController::class, 'appointment'])->name('appointment');

Route::get('/my_appointment', [HomeController::class, 'showAppointment'])->name('showappointment');

Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancelAppointment'])->name('cancelappointment');

Route::get('/show_all_doctors', [HomeController::class, 'showAllDoctors'])->name('showalldoctors');

Route::middleware(['auth', 'isAdmin'])->group(function () {


    Route::get('/add_doctor', [AdminController::class, 'AddDoctor'])->name('adddoctor');
    Route::post('/save_doctor', [AdminController::class, 'saveDoctor'])->name('savedoctor');

    Route::get('/show_appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments');

    Route::get('/admincancel_appointment/{id}', [AdminController::class, 'cancelAppointment'])->name('admin.cancelappointment');

    Route::get('/approve_appointment/{id}', [AdminController::class, 'approveAppointment'])->name('admin.approveappointment');

    Route::get('/show_doctors', [AdminController::class, 'showDoctors'])->name('admin.showdoctors');

    Route::get('/edit_doctor/{id}', [AdminController::class, 'editDoctor'])->name('admin.editdoctor');

    Route::get('/delete_doctor/{id}', [AdminController::class, 'deleteDoctor'])->name('admin.deletedoctor');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
