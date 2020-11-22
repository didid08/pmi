<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\User\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
	return '<a href="/user/login">Login</a>';
});

//Auth
Route::get('/user/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [LoginController::class, 'login'])->name('user.login.process');
Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

//Users
Route::middleware('auth')->group(function ()
{
	Route::get('/user', function () {
    	return redirect()->route('user.home.dashboard');
	});
	Route::get('/user/home', function () {
    	return redirect()->route('user.home.dashboard');
	});

	//Dashboard
	Route::get('/user/home/dashboard', function () {
    	return view('user.home.dashboard');
	})->name('user.home.dashboard');

	//Profile
	Route::get('/user/home/profile', function () {
    	return view('user.home.profile');
	})->name('user.home.profile');

});