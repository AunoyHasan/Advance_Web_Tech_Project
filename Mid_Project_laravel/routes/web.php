<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminCrudController;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PDFController;
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

Route::get('/adminLogin',[adminController::class,'adminLogin'])->name('adminLogin');
Route::post('/adminLoginSubmit',[adminController::class,'adminLoginSubmit'])->name('adminLoginSubmit');

Route::get('/adminDashboard',[adminController::class,'adminDashboard'])->name('adminDashboard')->middleware('authorized');
Route::get('/adminlogout',[adminController::class,'adminlogout'])->name('adminlogout');

Route::get('/regis',[adminController::class,'registration'])->name('registration')->middleware('authorized');
Route::post('/registration_submit',[adminController::class,'registration_submit'])->name('registration_submit')->middleware('authorized');

Route::get('/viewAllAdmin',[adminCrudController::class,'viewAllAdmin'])->name('viewAllAdmin')->middleware('authorized');
Route::get('/viewAllUser',[adminCrudController::class,'viewAllUser'])->name('viewAllUser')->middleware('authorized');
Route::get('/viewAllProducts',[adminCrudController::class,'viewAllProducts'])->name('viewAllProducts')->middleware('authorized');
Route::get('/viewAllEmployee',[adminCrudController::class,'viewAllEmployee'])->name('viewAllEmployee')->middleware('authorized');

Route::get('/adminEdit/{id}',[adminCrudController::class,'adminEdit'])->name('adminEdit');
Route::post('/adminEditSubmit',[adminCrudController::class,'adminEditSubmit'])->name('adminEditSubmit');

Route::get('/adminDelete/{id}',[adminCrudController::class,'adminDelete'])->name('adminDelete');
Route::get('/userDelete/{id}',[adminCrudController::class,'userDelete'])->name('userDelete');
Route::get('/productDelete/{id}',[adminCrudController::class,'productDelete'])->name('productDelete');
Route::get('/employeeDelete/{id}',[adminCrudController::class,'employeeDelete'])->name('employeeDelete');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('generatePDF_allUser', [PDFController::class, 'generatePDF_allUser'])->name('generatePDF_allUser');
Route::get('generatePDF_allAdmin', [PDFController::class, 'generatePDF_allAdmin'])->name('generatePDF_allAdmin');
Route::get('generatePDF_allProduct', [PDFController::class, 'generatePDF_allProduct'])->name('generatePDF_allProduct');
Route::get('generatePDF_allEmployee', [PDFController::class, 'generatePDF_allEmployee'])->name('generatePDF_allEmployee');

Route::get('/searchAdmin/', [adminCrudController::class,'searchAdmin'])->name('searchAdmin');
Route::get('/searchCustomer/', [adminCrudController::class,'searchCustomer'])->name('searchCustomer');
Route::get('/searchProduct/', [adminCrudController::class,'searchProduct'])->name('searchProduct');
Route::get('/searchEmployee/', [adminCrudController::class,'searchEmployee'])->name('searchEmployee');

Route::get('/addPerformance',[adminCrudController::class,'addPerformance'])->name('addPerformance')->middleware('authorized');
Route::post('/addPerformance_submit',[adminCrudController::class,'addPerformance_submit'])->name('addPerformance_submit')->middleware('authorized');
Route::get('/viewAllPerformance',[adminCrudController::class,'viewAllPerformance'])->name('viewAllPerformance')->middleware('authorized');
Route::get('/performaneDelete/{id}',[adminCrudController::class,'performaneDelete'])->name('performaneDelete');
