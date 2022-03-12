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

Route::get('/adminEdit/{id}',[adminCrudController::class,'adminEdit'])->name('adminEdit');
Route::post('/adminEditSubmit',[adminCrudController::class,'adminEditSubmit'])->name('adminEditSubmit');

Route::get('/adminDelete/{id}',[adminCrudController::class,'adminDelete'])->name('adminDelete');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
Route::get('generatePDF_allAdmin', [PDFController::class, 'generatePDF_allAdmin'])->name('generatePDF_allAdmin');
