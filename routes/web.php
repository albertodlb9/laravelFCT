<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CompanyController;

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

Route::middleware('role:admin,teacher,tutor')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
});

Route::middleware('role:admin,teacher')->group(function () {
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
});


Route::middleware('role:pupil,teacher,tutor')->group(function () {
    Route::get('actions', [ActionController::class, 'index'])->name('actions.index');
    Route::get('action/{action}', [ActionController::class, 'show'])->name('actions.show');
});

Route::middleware('role:teacher,pupil')->group(function () {
    Route::get('actions/create', [ActionController::class, 'create'])->name('actions.create');
    Route::get('actions/{action}/edit', [ActionController::class, 'edit'])->name('actions.edit');
    Route::delete('actions/{action}', [ActionController::class, 'destroy'])->name('actions.destroy');
    Route::post('actions', [ActionController::class, 'store'])->name('actions.store');
    Route::patch('actions/{action}', [ActionController::class, 'update'])->name('actions.update');
});

Route::middleware('role:admin')->group(function () {
    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::patch('companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
});





require __DIR__.'/auth.php';
