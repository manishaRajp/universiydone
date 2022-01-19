<?php

use App\Http\Controllers\Student\AddmissionConfirm;
use App\Http\Controllers\Student\AdmissionController;
use App\Http\Controllers\Student\MarkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('frontend/dashboard/welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth:web'], function () {
    

//---------------------------Admission-------------------------------------

Route::resource('addmission', AdmissionController::class);

//---------------------------marks-------------------------------------

Route::resource('marks',MarkController::class);



//---------------------------Addmission confirm-------------------------------------

Route::resource('addmoission-confirm', AddmissionConfirm::class);
});