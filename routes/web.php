<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\AdmissionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return redirect()->route('login');
});

//login routes
Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');



//register
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


//user
 Route::get('/all_user', [UserController::class, 'all_user'])->name('all_user');
 Route::get('/user_labour/{id}', [AuthController::class, 'destroy'])->name('user.delete');
// User AJAX Data
Route::get('data-all-user', [UserController::class, 'data_all_user'])->name('data_all_user');
// User Activate or Deactivate Routes
Route::get('/active_status/{id}/{value}', [AuthController::class, 'active_status'])->name('active_status');
//edit user
Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
// Update User Details
Route::post('/update', [AuthController::class, 'update'])->name('update');

//college
Route::get('/index_college', [CollegeController::class, 'index'])->name('index_college');
Route::post('/store', [CollegeController::class, 'store'])->name('college.store');
Route::get('/edit_college/{id}', [CollegeController::class, 'edit'])->name('edit.college');
Route::post('/update_college', [CollegeController::class, 'update'])->name('college.update');
Route::get('/delete_college/{id}', [CollegeController::class, 'destroy'])->name('delete_college');


// college AJAX Data
Route::get('/data-all-college', [CollegeController::class, 'data_all_college'])->name('data_all_college');

 //admission
 Route::get('/index_admission',[AdmissionController::class,'index'])->name('index_admission');
 Route::post('/index_admission',[AdmissionController::class,'store'])->name('admission.store');
 Route::get('/show_admission',[AdmissionController::class,'show'])->name('show_admission');

 // Admission AJAX Data
Route::get('/list_admission', [AdmissionController::class, 'list_admission'])->name('list_admission');
