<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User as User;

Route::get('/', function() {
	return '<a href="/user/auth/login">Login</a>';
});

//Auth
Route::get('/login', function () {
	return redirect()->route('user.auth.login');
});
Route::get('/user/login', function () {
	return redirect()->route('user.auth.login');
});
Route::get('/user/auth/login', [User\Auth\LoginController::class, 'showLoginForm'])->name('user.auth.login');
Route::post('/user/auth/login', [User\Auth\LoginController::class, 'login'])->name('user.auth.login.process');
Route::get('/user/auth/logout', [User\Auth\LoginController::class, 'logout'])->name('user.auth.logout');

//User
Route::middleware('auth')->group(function ()
{
	//Home
		Route::get('/user', function () {
			return redirect()->route('user.home.dashboard');
		});
		Route::get('/user/home', function () {
			return redirect()->route('user.home.dashboard');
		});

		//Dashboard
		Route::get('/user/home/dashboard', [User\Home\SubHome\DashboardController::class, 'viewPage'])->name('user.home.dashboard');

		//Profile
		Route::get('/user/home/profile', [User\Home\SubHome\ProfileController::class, 'viewPage'])->name('user.home.profile');
		Route::post('/user/home/profile/data-anggota/update', [User\Home\SubHome\ProfileController::class, 'updateDataAnggota'])->name('user.home.profile.data-anggota.update');
		Route::post('/user/home/profile/data-instansi/update', [User\Home\SubHome\ProfileController::class, 'updateDataInstansi'])->name('user.home.profile.data-instansi.update');
});