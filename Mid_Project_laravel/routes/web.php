<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeOfficerController;

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
    return view('welcome');
});

Route::get('/home', function () {
    //return view('employee.dashboard.home');
});

Route::get('/register',[EmployeeOfficerController::class,'register']);
Route::post('/register',[EmployeeOfficerController::class,'registersubmit'])->name('register.submit');

Route::get('/login',[EmployeeOfficerController::class,'login']);
Route::post('/login',[EmployeeOfficerController::class,'loginsubmit'])->name('login.submit');

Route::get('/officer/home',[EmployeeOfficerController::class,'home'])->name('officer.home');

Route::get('/list',[EmployeeOfficerController::class,'officerList'])->name('officer.list');
Route::get('/officer/details/{id}/{name}',[EmployeeOfficerController::class,'details'])->name('officer.details');
Route::get('/officer/edit/{id}',[EmployeeOfficerController::class,'edit'])->name('officer.edit');

Route::get('/officer/profile',[EmployeeOfficerController::class,'profile'])->name('officer.profile');
Route::get('/officer/logout',[EmployeeOfficerController::class,'logout'])->name('officer.logout');

