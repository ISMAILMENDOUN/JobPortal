<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Models\Job;
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

//ROUTE FOR HOME PAGE
Route::get('/', function () {
    return view('home');
})->name('home');
//ROUTE FOR CANDIDATES
Route::get('/candidates', function () {
    return view('candidates.index');
})->name('candidates.index');
Route::get('/login/candidate', function () {
    return view('candidates.login');
})->name('candidates.login');
Route::get('/candidates/register', function () {
    return view('candidates.register');
})->name('candidates.register');
Route::middleware(['auth', 'role:Candidate'])->group(function () {
Route::get('/{user}/candidate', function () {
    return view('candidates.candidate');
})->name('candidates.candidate');
Route::post('/{job}/job', [ApplicationController::class,'apply'])->name('jobs.apply');});

//ROUTE FOR RECRUITERS
Route::get('/recruiters', function () {
    return view('recruiters.index');
})->name('recruiters.index');
Route::get('/login/recruiter', function () {
    return view('recruiters.login');
})->name('recruiters.login');
Route::get('/register/recruiter', function () {
    return view('recruiters.register');
})->name('recruiters.register');
Route::middleware(['auth', 'role:Recruiter'])->group(function () {
Route::get('/{user}/recruiter', function () {
    return view('recruiters.recruiter');
})->name('recruiters.recruiter');
Route::get('/{user}/recruiter/createJob', function () {
    return view('recruiters.createJob');
})->name('recruiters.create');
Route::post('/addJob',[JobController::class, 'addJob'])->name('addJob');
Route::get('/{job}/edit',function(Job $job){
    return view('recruiters.edit',['job'=>$job]);
})->name('editJob');
Route::put('/{job}/update',[JobController::class, 'updateJob'])->name('updateJob');
Route::delete('/{job}/delete',[JobController::class, 'deleteJob'])->name('deleteJob');
});
Route::post('/recruiterRegistration',[UserController::class, 'registerRecruiter'])->name('registerRecruiter');

//ROUTE FOR ADMINS
Route::get('/admin', function () {
    return view('admins.login');
})->name('admins.login');

Route::post('/adminLogged', [UserController::class, 'login'])->name('login');
Route::middleware(['auth', 'role:Admin'])->group(function () {
Route::get('/admin/index', function () {
    return view('admins.index');
})->name('admins.index');
Route::get('/admin/candidates', function () {
    return view('admins.candidates');
})->name('admins.candidates');
Route::get('/admin/recruiters', function () {
    return view('admins.recruiters');
})->name('admins.recruiters');
}
);
//ROUTE FOR LOGOUT
Route::get('/logout', [UserController::class,'logout'])->name('logout');
//ROUTE FOR SEARCH BAR
Route::get('/search', [JobController::class,'search'])->name('search');
//ROUTE FOR A JOB
Route::get('/{job}/job', function(Job $job){
    return view('jobs.index',['job'=>$job]);
})->name('job');



