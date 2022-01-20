 <?php

use App\Http\Controllers\College\AddmissionConfirm;
use  App\Http\Controllers\College\CollegeController;
use App\Http\Controllers\College\CourseController;
use App\Http\Controllers\College\LoginController;
use App\Http\Controllers\College\MeritController;
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
Route::group(['middleware' => 'auth:college'], function () {
    Route::get('/dasboard', function () {
        return view('backend.college.admin.dashboard');
    })->name('dasboard');


//--------------------------------------College Profile Module---------------------------
    Route::get('/profile', [CollegeController::class, 'profileview'])->name('profile_view');
    Route::post('/profile-update', [CollegeController::class, 'profileupdate'])->name('profile_update');
    Route::get('change-view', [CollegeController::class, 'changePasswordview'])->name('view');
    Route::post('change-pass', [CollegeController::class, 'changePassword'])->name('change_pass');


//--------------------------------------Admission Expot------------------------------------
    Route::get('/file-import', [CollegeController::class, 'importView'])->name('import-view');
    Route::post('/import', [CollegeController::class, 'import'])->name('import');
    Route::get('/export-meal', [CollegeController::class, 'exportmeal'])->name('export-meal');

//---------------------------------------Course Selection----------------------------------

Route::resource('course',CourseController::class);


//---------------------------------------Course Selection----------------------------------
Route::resource('merit',MeritController::class);


//--------------------------------------------Addmission Confirm----------------------------
Route::resource('college-confirm-addmission',AddmissionConfirm::class);

});
