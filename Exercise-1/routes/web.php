<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['role:admin'])->group(function() {
    Route::get('/users', [UserController::class, 'indexWeb'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'storeWeb'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'updateWeb'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroyWeb'])->name('users.destroy');
});



Route::middleware(['role:employee'])->group(function () {
    Route::get('/employee', [UserController::class, 'employeeView'])->name('users.employee');
});


Route::get('/{public_uri}', [PublicProfileController::class, 'show'])
    ->name('employees.public');
