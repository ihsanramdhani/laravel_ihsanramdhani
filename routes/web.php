<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login.process');

Route::get('/hospital', [HospitalController::class, 'index'])->name('hospital');
Route::get('/hospital/create', [HospitalController::class, 'create'])->name('hospital.create');
Route::post('/hospital/store', [HospitalController::class, 'store'])->name('hospital.store');
Route::get('/hospital/edit/{id}', [HospitalController::class, 'edit'])->name('hospital.edit');
Route::put('/hospital/update/{id}', [HospitalController::class, 'update'])->name('hospital.update');
ROute::delete('hospital/delete/{id}', [HospitalController::class, 'destroy'])->name('hospital.delete');

Route::get('/patient', [PatientController::class, 'index'])->name('patient');
Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');
Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
Route::put('/patient/update/{id}', [PatientController::class, 'update'])->name('patient.update');
Route::delete('/patient/delete/{id}', [PatientController::class, 'destroy'])->name('patient.delete');
Route::get('/filter-patients', [PatientController::class, 'filterPatients'])->name('patient.filter');
