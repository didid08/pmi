<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
    	return redirect()->route('user.dashboard');
	});

	//Dashboard
	Route::get('/user/dashboard', function () {
    	return view('user.dashboard');
	})->name('user.dashboard');

});