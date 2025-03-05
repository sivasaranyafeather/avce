<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\EducationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return redirect()->route('login');
});


//login routes
Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::middleware(['is-active'])->group(function () {


//register
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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
 Route::post('/store_admission',[AdmissionController::class,'store'])->name('admission.store');
 Route::get('/show_admission',[AdmissionController::class,'show'])->name('show_admission');

 // Admission AJAX Data
Route::get('/list_admission', [AdmissionController::class, 'list_admission'])->name('list_admission');
//edit admission
Route::get('/edit_register/{id}', [AdmissionController::class, 'edit'])->name('edit_register');
Route::post('/update_register', [AdmissionController::class, 'update'])->name('admission.update');
//delete admission
Route::get('/delete_register/{id}', [AdmissionController::class, 'destroy'])->name('delete_register');
//admission print
Route::get('/print_register/{id}', [AdmissionController::class, 'print'])->name('print_register');
});

//Staff 
Route::get('/index_staff',[StaffController::class,'index'])->name('index_staff');
Route::post('/staff_store', [StaffController::class, 'store'])->name('staff.store');
Route::get('/edit_staff/{id}', [StaffController::class, 'edit'])->name('edit.staff');
Route::post('/update_staff', [StaffController::class, 'update'])->name('staff.update');
Route::get('/delete_staff/{id}', [StaffController::class, 'destroy'])->name('delete_staff');
// staff AJAX Data
 Route::get('/data-all-staff', [StaffController::class, 'data_all_staff'])->name('data_all_staff');

 //Education
 Route::get('/index_education',[EducationController::class,'index'])->name('index_education');
 Route::post('/education_store', [EducationController::class, 'store'])->name('education.store');
 Route::get('/edit_education/{id}', [EducationController::class, 'edit'])->name('edit.education');
 Route::post('/update_education', [EducationController::class, 'update'])->name('education.update');
 Route::get('/delete_education/{id}', [EducationController::class, 'destroy'])->name('delete_education');
 // education AJAX Data
 Route::get('/data-all-education', [EducationController::class, 'data_all_education'])->name('data_all_education');

