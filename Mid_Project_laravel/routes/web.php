<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;

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
Route::get('login',[customerController::class,'login'])->name('c.login');
Route::post('login',[customerController::class,'login'])->name('c.login.p');
Route::get('registration',[customerController::class,'registration'])->name('c.registration');
Route::post('registration',[customerController::class,'registration'])->name('c.registration.p');
Route::post('home',[customerController::class,'home'])->name('c.home');
Route::get('categoty',[customerController::class,'category'])->name('category');
Route::post('search',[customerController::class,'search'])->name('search');
