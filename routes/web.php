<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/hola', function () {
    return view ('hola');
});
Route::get('/actions/create/{id}', [ActionController::class, 'create'])->name('actions.create');
Route::resource('actions', \App\Http\Controllers\ActionController::class);
Route::resource('companies', \App\Http\Controllers\CompanyController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::post('/users/teach', [UserController::class, 'teach'])->name('users.teach');


require __DIR__.'/auth.php';
