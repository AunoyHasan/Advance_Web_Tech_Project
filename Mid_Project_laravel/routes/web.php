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
    return view('employee.dashboard.home');
});

Route::get('/register',[EmployeeOfficerController::class,'register']);
Route::post('/register',[EmployeeOfficerController::class,'registersubmit'])->name('register.submit');

