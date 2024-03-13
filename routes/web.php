<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DiagnosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register'=>false]);

/////// Patient Routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("home" , [HomeController::class , "store"])->name('patients.store');

Route::post("home/update-patient" , [HomeController::class , "update"])->name('patients.update');

Route::post("home/delete-patient" , [HomeController::class , "delete"])->name('patients.destroy');

Route::get("/pagination/paginate-data" , [HomeController::class , "pagination"]);


//////////////////////////////////////  END Patient Routes  ////////////////////////////////////////////////////////////////////////

//********************************* ِAppointments Routes ***************************************//

Route::resource('appointments', AppointmentController::class);


//********************************* End ِAppointments Routes ***************************************//


//********************************* ِAppointments Routes ***************************************//


Route::resource('diagnoses' , DiagnosController::class);


//********************************* End ِAppointments Routes ***************************************//


//********************************* ِAppointments Routes ***************************************//


Route::resource('prescriptions' , PrescriptionController::class);


//********************************* End ِAppointments Routes ***************************************//


Route::get('/{page}', [\App\Http\Controllers\AdminController::class , "index"]);
