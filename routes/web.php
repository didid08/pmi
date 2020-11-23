<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;

use App\Http\Controllers\User\Home as UserHome;

Route::get('/', function() {
	return '<a href="/user/login">Login</a>';
});

//Auth
Route::get('/user/login', [LoginController::class, 'showLoginForm'])->name('user.auth.login');
Route::post('/user/login', [LoginController::class, 'login'])->name('user.auth.login.process');
Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.auth.logout');

//Home
Route::middleware('auth')->group(function ()
{
	Route::get('/user', function () {
    	return redirect()->route('user.home.dashboard');
	});
	Route::get('/user/home', function () {
    	return redirect()->route('user.home.dashboard');
	});

	//Dashboard
	Route::get('/user/home/dashboard', [UserHome\DashboardController::class, 'viewPage'])->name('user.home.dashboard');

	//Profile
	Route::get('/user/home/profile', [UserHome\ProfileController::class, 'viewPage'])->name('user.home.profile');

});