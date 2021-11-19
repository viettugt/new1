<?php

use App\Http\Controllers\Auth\FaceBookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
//admin
Route::prefix('admin')->middleware('auth')->group(function () {
    // Route::get('/',[A::class,'index']);
    Route::get('courses',[CourseController::class,'list'])->name('course');
    Route::get('add-courses',[CourseController::class,'addcourses'])->name('add-course');
    Route::post('save-add-courses',[CourseController::class,'savecourses'])->name('savecourses');
    Route::get('edit-courses/{id}',[CourseController::class,'editcourses'])->name('edit-course');
    Route::post('save-edit-courses{id}',[CourseController::class,'saveEdit'])->name('saveEdit1');
    Route::post('delete-courses/{id}',[CourseController::class,'deletecourses'])->name('delete-courses');

    Route::get('subjects',[SubjectsController::class,'list'])->name('subjects');
    Route::get('add-subjects',[SubjectsController::class,'addsubjects'])->name('add-subjects');
    Route::post('save-add-subjects',[SubjectsController::class,'savesubjects'])->name('savesubjects');
    Route::get('edit-subjects/{id}',[SubjectsController::class,'editsubjects'])->name('edit-subjects');
    Route::post('save-edit-subjects/{id}',[SubjectsController::class,'saveEdit'])->name('saveEditsu');
    Route::post('delete-subjects/{id}',[SubjectsController::class,'deletesubjects'])->name('delete-subjects');

    Route::get('students',[StudentsController::class,'list'])->name('students');
    Route::get('add-students',[StudentsController::class,'addstudents'])->name('add-students');
    Route::post('save-add-students',[StudentsController::class,'saveAdd'])->name('savestudents');
    Route::get('edit-students/{id}',[StudentsController::class,'editstudents'])->name('edit-students');
    Route::post('edit-students/{id}',[StudentsController::class,'saveEdit'])->name('saveEdit');
    Route::post('delete-students/{id}',[StudentsController::class,'deletestudents'])->name('deletestudents');
    Route::post('ajax-students',[StudentsController::class,'ajaxStudent'])->name('ajaxstudent');
    Route::post('update-ajax-students',[StudentsController::class,'ajaxstudentupdate'])->name('ajaxstudentupdate');

    
    Route::get('results',[ResultsController::class,'list'])->name('results');
    Route::get('add-results',[ResultsController::class,'addresults'])->name('add-results');
    Route::post('save-add-results',[ResultsController::class,'saveAdd'])->name('saveresults');
    Route::get('edit-results/{id}',[ResultsController::class,'editresults1'])->name('edit-results');
    Route::post('edit-results/{id}',[ResultsController::class,'saverEdit'])->name('save-edit-results');
    Route::post('delete-results/{id}',[ResultsController::class,'deletere'])->name('delete-results');
  
    
});
    Route::get('search',[StudentsController::class,'search']);
    Route::get('search1',[ResultsController::class,'search_resuls']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('login',[LoginController::class,'loginForm'])->name("login");

// Auth::routes();

//login google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//login facebook
// Route::prefix('facebook')->name('facebook.')->group( function(){
//     Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
//     Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');

    // Route::get('auth/facebook', [FaceBookController::class, 'loginUsingFacebook'])->name('login');;
    // Route::get('auth/facebook/callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');

Route::get('profile/{id}', [ProfileController::class, 'listprofile'])->name('listprofile');
Route::post('profile/{id}', [ProfileController::class, 'savelistprofile'])->name('savelistprofile');
