<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeOfficerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AadminRegistrationController;

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

//reset password
//Route::get('/password',[EmployeeOfficerController::class,'resetPassword'])->name('officer.password');

Route::get('/officer/home',[EmployeeOfficerController::class,'home'])->name('officer.home')->middleware('officerAuthorized');

Route::get('/list',[EmployeeOfficerController::class,'officerList'])->name('officer.list')->middleware('officerAuthorized');
Route::get('/officer/details/{id}/{name}/{email}/{address}/{created_at}',[EmployeeOfficerController::class,'details'])->name('officer.details');

/// officer edit
Route::get('/officer/edit/{id}',[EmployeeOfficerController::class,'edit']);
Route::post('/officer/edit/submit',[EmployeeOfficerController::class,'editSubmit'])->name('officer.edit');

Route::get('/officer/delete/{id}',[EmployeeOfficerController::class,'delete'])->name('officer.delete');
Route::get('/officer/mail/{id}',[EmployeeOfficerController::class,'mail'])->name('officer.mail');

//officer profile
Route::get('/officer/profile/{id}/{name}/{email}/{address}/{created_at}',[EmployeeOfficerController::class,'profile'])->name('officer.profile')->middleware('officerAuthorized');
Route::get('/officer/logout',[EmployeeOfficerController::class,'logout'])->name('officer.logout');


//Product Controller
Route::get('/addproduct',[ProductController::class,'addProduct'])->middleware('officerAuthorized');
Route::post('/addproduct',[ProductController::class,'addProductSubmit'])->name('product.addproduct');

Route::get('/product/home',[ProductController::class,'home'])->name('product.home');

Route::get('/product/list',[ProductController::class,'productList'])->name('product.list')->middleware('officerAuthorized');

Route::get('/editProduct/{id}',[ProductController::class,'editProduct'])->name('product.edit.abc')->middleware('officerAuthorized');
Route::post('/editProduct',[ProductController::class,'editProductSubmit'])->name('product.edit');


Route::get('/delete/product/{id}',[ProductController::class,'productDelete'])->name('product.delete');



///AdminConterller
Route::get('/viewAllAdmin',[AadminRegistrationController::class,'viewAllAdmin'])->name('viewAllAdmin');