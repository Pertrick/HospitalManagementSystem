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

Route::get('/add_doctor', [AdminController::class, 'AddDoctor'])->name('adddoctor');
Route::post('/save_doctor', [AdminController::class, 'saveDoctor'])->name('savedoctor');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
