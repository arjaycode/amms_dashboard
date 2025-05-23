<?php

use App\Http\Controllers\AircraftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


Route::get('/', function () {
	return redirect('sign-in');
})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});



//my custom routes
Route::get('/aircrafts', [AircraftController::class, 'index'])->middleware('auth')->name('aircraft.index');
Route::get('/aircrafts/deleted', [AircraftController::class, 'deleted'])->middleware('auth')->name('aircraft.deleted');
// Create view and Store routes
Route::get('/aircrafts/create', [AircraftController::class, 'create'])->middleware('auth')->name('aircraft.create');
Route::post('/aircrafts', [AircraftController::class, 'store'])->middleware('auth')->name('aircraft.store');
// Permanent Delete route
Route::delete('/aircrafts/{aircraft}', [AircraftController::class, 'destroy'])->middleware('auth')->name('aircraft.destroy');
// Edit view and Update routes
Route::get('/aircrafts/edit/{aircraft}', [AircraftController::class, 'edit'])->middleware('auth')->name('aircraft.edit');
Route::put('/aircrafts/update/{aircraft}', [AircraftController::class, 'update'])->middleware('auth')->name('aircraft.update');
// Soft Delete and Restore routes
Route::put('/aircrafts/soft-delete/{aircraft}', [AircraftController::class, 'soft_delete'])->middleware('auth')->name('aircraft.soft_delete');
Route::put('/aircrafts/restore/{aircraft}', [AircraftController::class, 'restore'])->middleware('auth')->name('aircraft.restore');
