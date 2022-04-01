<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeOfficerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AadminRegistrationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facads\File;

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
Route::get('/password',[EmployeeOfficerController::class,'changePassword']);
Route::post('/password',[EmployeeOfficerController::class,'changePasswordSubmit'])->name('officer.password');
Route::get('/profile/pic',[EmployeeOfficerController::class,'changePic'])->name('officer.changepic');
Route::post('/profile/pic',[EmployeeOfficerController::class,'changePicSubmit'])->name('profilepic');

Route::get('/officer/home',[EmployeeOfficerController::class,'home'])->name('officer.home')->middleware('officerAuthorized');
Route::get('/list',[EmployeeOfficerController::class,'officerList'])->name('officer.list')->middleware('officerAuthorized');
Route::get('/officer/details/{id}/{name}/{email}/{address}/{created_at}',[EmployeeOfficerController::class,'details'])->name('officer.details')->middleware('officerAuthorized');

/// officer edit
Route::get('/officer/edit/{id}',[EmployeeOfficerController::class,'edit']);
Route::post('/officer/edit/submit',[EmployeeOfficerController::class,'editSubmit'])->name('officer.edit');
/// officer mail
Route::get('/officer/mail/{id}',[EmployeeOfficerController::class,'mail'])->name('officer.mail');

//officer profile
Route::get('/officer/profile',[EmployeeOfficerController::class,'profile'])->name('officer.profile')->middleware('officerAuthorized');
//Route::get('/officer/profile/pic',[EmployeeOfficerController::class,'editProfilePictureSubmit'])->name('officer.profile')->middleware('officerAuthorized');
Route::get('/officer/logout',[EmployeeOfficerController::class,'logout'])->name('officer.logout');
Route::get('/officer/setting',[EmployeeOfficerController::class,'setting'])->name('officer.setting')->middleware('officerAuthorized');
Route::get('/officer/changepassword',[EmployeeOfficerController::class,'changePassword'])->name('officer.changepassword')->middleware('officerAuthorized');
Route::get('/officer/search', [EmployeeOfficerController::class,'searchOfficer'])->name('officer.search');

Route::get('/officer/supplier/{id}', [EmployeeOfficerController::class,'supplierName'])->name('officer.supplier');


//Product Controller
Route::get('/addproduct',[ProductController::class,'addProduct'])->middleware('officerAuthorized')->middleware('officerAuthorized');
Route::post('/addproduct',[ProductController::class,'addProductSubmit'])->name('product.addproduct')->middleware('officerAuthorized');
Route::get('/product/home',[ProductController::class,'home'])->name('product.home');
Route::get('/product/list',[ProductController::class,'productList'])->name('product.list')->middleware('officerAuthorized');
Route::get('/editProduct/{id}',[ProductController::class,'editProduct'])->name('product.edit.abc')->middleware('officerAuthorized');
Route::post('/editProduct',[ProductController::class,'editProductSubmit'])->name('product.edit')->middleware('officerAuthorized');
Route::get('/delete/product/{id}',[ProductController::class,'productDelete'])->name('product.delete');
Route::get('/product/search', [ProductController::class,'searchProduct'])->name('product.search');


///AdminConterller
Route::get('/viewAllAdmin',[AadminRegistrationController::class,'viewAllAdmin'])->name('viewAllAdmin')->middleware('officerAuthorized');
Route::get('/admin/search', [AadminRegistrationController::class,'searchAdmin'])->name('admin.search');


///Custoemr Controller
Route::get('/customer/list',[CustomerController::class,'customerList'])->name('customerList')->middleware('officerAuthorized');
Route::get('/delete/customer/{id}',[CustomerController::class,'customerDelete'])->name('customer.delete');
Route::get('/customer/search', [CustomerController::class,'searchCustomer'])->name('customer.search');


///supplier
Route::get('/supplier/list',[SupplierController::class,'supplierList'])->name('supplier.list');
Route::get('/supplier/search', [SupplierController::class,'searchSupplier'])->name('supplier.search');
Route::get('/register/supplier',[SupplierController::class,'register']);
Route::post('/register/supplier',[SupplierController::class,'registersubmit'])->name('supplier.register');
Route::get('/login/supplier',[SupplierController::class,'login']);
Route::post('/login/supplier',[SupplierController::class,'loginsubmit'])->name('supplier.login');
Route::get('/supplier/home',[SupplierController::class,'home'])->name('supplier.home');
Route::get('/supplier/show/{id}',[SupplierController::class,'showProductName'])->name('supplier.product.name');

///supplier for admin
Route::get('/supplier/list/officer',[SupplierController::class,'supplierListOfficer'])->name('supplier.list.officer')->middleware('officerAuthorized');
Route::get('/supplier/search/officer', [SupplierController::class,'searchSupplierOfficer'])->name('supplier.search.officer');
//Route::get('/delete/supplier/{id}',[SupplierController::class,'supplierDelete'])->name('supplier.delete');






