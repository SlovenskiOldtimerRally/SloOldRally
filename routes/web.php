<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'],)->name('landing.index');
Route::get('filter', [LandingController::class, 'filter'],)->name('landing.filter');

Route::get('dashboard', [DashboardController::class, 'userEvents'],)->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', function(){
    return view('auth.login')->name('auth.login');
});

Route::get('/register', function(){
    return view('auth.register')->name('auth.register');
});

require __DIR__.'/auth.php';
