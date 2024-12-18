<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Collaborator\TeacherController;
use App\Http\Controllers\Collaborator\CollaboratorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/', [\App\Http\Controllers\Auth\LoginController::class,'loginStudent'])->name('login');
Route::get('/collaborator/login', [\App\Http\Controllers\Auth\LoginController::class,'showLoginCollaboratorForm'])->name('login.collaborator');
Route::post("/collaborator/login",[\App\Http\Controllers\Auth\LoginController::class,'loginCollaborator'])->name('collaborator.login');

Route::view('Admin','formsCreationEnseignant');

Route::view('adminvue','AdminVue');
Route::view('etudiantvue','EtudiantVue');
Route::view('enseignantvue','EnseignantVue');

Route::middleware('auth')->group(function(){
    Route::get('/collaborator/home', [\App\Http\Controllers\Collaborator\CollaboratorController::class,'index'])->name('collaborator.home');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
    Route::get('/home', [\App\Http\Controllers\User\UserController::class,'index'])->name('user.home');

    
    Route::resources([
        //student
        'user' =>  UserController::class,
        //collaborator
        'collaborator' => CollaboratorController::class,
        'teacher' => TeacherController::class
    ]);
    
});
