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

Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [\App\Http\Controllers\Auth\LoginController::class, 'loginStudent'])->name('login');
Route::get('/collaborator/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginCollaboratorForm'])->name('login.collaborator');
Route::post("/collaborator/login", [\App\Http\Controllers\Auth\LoginController::class, 'loginCollaborator'])->name('collaborator.login');

Route::view('Admin', 'formsCreationEnseignant');

Route::view('adminvue', 'AdminVue');
Route::view('etudiantvue', 'EtudiantVue');
Route::view('enseignantvue', 'EnseignantVue');

Route::middleware('auth')->group(function () {
    Route::get('/collaborator/home', [\App\Http\Controllers\Collaborator\CollaboratorController::class, 'index'])->name('collaborator.home');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [\App\Http\Controllers\User\UserController::class, 'index'])->name('user.home');
    
    // Permissions
    Route::get('/premission', [App\Http\Controllers\Collaborator\PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/premission/create', [App\Http\Controllers\Collaborator\PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/premission/save', [App\Http\Controllers\Collaborator\PermissionController::class, 'store'])->name('permissions.store');
    // Roles
    Route::get('/role', [App\Http\Controllers\Collaborator\RoleController::class, 'index'])->name('roles.index');
    Route::get('/role/create', [App\Http\Controllers\Collaborator\RoleController::class, 'create'])->name('roles.create');
    Route::post('/role/save', [App\Http\Controllers\Collaborator\RoleController::class, 'store'])->name('roles.store');
    Route::get('/role/edit/{id}', [App\Http\Controllers\Collaborator\RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/role/show/{id}', [App\Http\Controllers\Collaborator\RoleController::class, 'show'])->name('roles.show');
    Route::post('/role/update/{id}', [App\Http\Controllers\Collaborator\RoleController::class, 'update'])->name('roles.update');


    Route::resources([
        //student
        'user' =>  UserController::class,
        //collaborator
        'collaborator' => CollaboratorController::class,
        'teacher' => TeacherController::class
    ]);
});
