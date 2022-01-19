<?php

use App\Http\Controllers\University\AddmissionConfirm;
use App\Http\Controllers\University\LoginController;
use App\Http\Controllers\University\CollegeController;
use App\Http\Controllers\University\Comman_setting;
use App\Http\Controllers\University\CourseController;
use App\Http\Controllers\University\Meritcontroller;
use App\Http\Controllers\University\SubjectController;
use App\Http\Controllers\University\UniversityController;
use Illuminate\Support\Facades\Route;



// ------------------------------Admin ForgetPassword--------------------------
Route::get('foregtpassword', function () {
    return view('Backend.Admin.forget_email');
})->name('foregtpassword');

Route::get('resetpassword', function () {
    return view('Backend.Admin.reset');
})->name('resetpassword');



Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


// --------------------------------------Dashbooard View------------------------------
Route::group(['middleware' => 'auth:university'], function () {
    Route::get('/dasboard', function () {
        return view('backend.university.admin.dashboard');
    })->name('dasboard');


    //--------------------------------------Admin Profile Module/Commansetting---------------------------
    Route::get('/profile', [UniversityController::class, 'profileview'])->name('profile_view');
    Route::post('/profile-update', [UniversityController::class, 'profileupdate'])->name('profile_update');
    Route::get('change-view', [UniversityController::class, 'changePasswordview'])->name('view');
    Route::post('change-pass', [UniversityController::class, 'changePassword'])->name('change_pass');


    //---------------------------------------College Manage--------------------------------
    Route::resource('college', CollegeController::class);
    // Route::get('delete', [CollegeController::class, 'destroy'])->name('college_delete');



    //-------------------------------------merit-------------------------------------------
    Route::resource('merti',Meritcontroller::class);
    Route::get('merti-status', [Meritcontroller::class, 'MeritStatus'])->name('merti_status');


    //-------------------------------------Common_setings-----------------------------------
    Route::resource('comman-setting',Comman_setting::class);


    //-------------------------------------subject-----------------------------------
    Route::resource('subject',SubjectController::class);


    //-------------------------------------Course-----------------------------------
    Route::resource('course',CourseController::class);

    //-----------------------------------AddmissionConfirm--------------------------
    Route::resource('confirm-addmission',AddmissionConfirm::class);
});
