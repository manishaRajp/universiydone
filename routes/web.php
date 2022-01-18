<?php


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


//---------------------------Admission-------------------------------------

Route::resource('addmission', AdmissionController::class);

//---------------------------marks-------------------------------------

Route::resource('marks',MarkController::class);