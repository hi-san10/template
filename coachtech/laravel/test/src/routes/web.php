<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ThanksController;
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
Route::get('/',[ContactController::class,'index']);

Route::get('/register',[RegisterController::class,'index']);

Route::post('/register/store',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index']);

Route::get('admin',[LoginController::class,'login']);

Route::post('/admin',[LoginController::class,'login']);

Route::get('/logout',[LoginController::class,'logout']);

Route::post('/confirm',[ConfirmController::class,'confirm']);

Route::post('/contact/store',[ContactController::class,'store']);

Route::get('/thanks',[ThanksController::class,'index']);

Route::get('/admin/search',[AdminController::class,'search']);

Route::post('/admin/csv',[AdminController::class,'csv']);