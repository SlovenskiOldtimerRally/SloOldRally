<?php

use App\Http\Controllers\ClubDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isClubAdmin;
use App\Http\Controllers\CarController;


Route::get('/', [LandingController::class, 'index'],)->name('landing.index');
Route::get('filter', [LandingController::class, 'filter'],)->name('landing.filter');

Route::get('/login', function(){
    return view('auth.login')->name('auth.login');
});

Route::get('/register', function(){
    return view('auth.register')->name('auth.register');
});




Route::get('dashboard', [DashboardController::class, 'userEvents'],)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('event/{event}', [DashboardController::class, 'event_detail'],)->name('event-detail');

Route::middleware([isClubAdmin::class])->group(function () {
    Route::get('club-dashboard', [ClubDashboardController::class, 'createdEvents'])->name('club.dashboard');
    Route::get('club-dashboard/create-event', [ClubDashboardController::class, 'createEvent'])->name('club.create-event');
    Route::post('club-dashboard/create-event/create', [ClubDashboardController::class, 'create_event'])->name('club.create-event.create');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('dashboard/{event}/register', [EventRegistrationController::class, 'create_registration'])->name('event.register');
    Route::delete('dashboard/{event}/register-delete', [EventRegistrationController::class, 'delete_registration'])->name('event.register.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/car', [CarController::class, 'store'])->name('profile.car.store');
    Route::put('/profile/car', [CarController::class, 'update'])->name('profile.car.update');
    Route::delete('/profile/car', [CarController::class, 'destroy'])->name('profile.car.destroy');
});



require __DIR__.'/auth.php';
