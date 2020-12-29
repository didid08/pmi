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

		//TSR
		Route::get('/user/home/tsr', [User\Home\SubHome\TSRController::class, 'viewPage'])->name('user.home.tsr');

		//KSR
		Route::get('/user/home/ksr/perguruan-tinggi', [User\Home\SubHome\KSR\PerguruanTinggiController::class, 'viewPage'])->name('user.home.ksr.perguruan-tinggi');
		Route::get('/user/home/ksr/pmi-kota-lhokseumawe', [User\Home\SubHome\KSR\PMIKotaLhokseumaweController::class, 'viewPage'])->name('user.home.ksr.pmi-kota-lhokseumawe');

		//PMR
		Route::get('/user/home/pmr/madya', [User\Home\SubHome\PMR\MadyaController::class, 'viewPage'])->name('user.home.pmr.madya');
		Route::get('/user/home/pmr/mula', [User\Home\SubHome\PMR\MulaController::class, 'viewPage'])->name('user.home.pmr.mula');
		Route::get('/user/home/pmr/wira', [User\Home\SubHome\PMR\WiraController::class, 'viewPage'])->name('user.home.pmr.wira');

		//Profile
		Route::get('/user/home/profile', [User\Home\SubHome\ProfileController::class, 'viewPage'])->name('user.home.profile');
		Route::post('/user/home/profile/data-anggota/update', [User\Home\SubHome\ProfileController::class, 'updateDataAnggota'])->name('user.home.profile.data-anggota.update');
		Route::post('/user/home/profile/data-instansi/update', [User\Home\SubHome\ProfileController::class, 'updateDataInstansi'])->name('user.home.profile.data-instansi.update');

		//User Management
		Route::get('/user/home/manajemen-user', [User\Home\SubHome\UserManagementController::class, 'viewPage'])->name('user.home.user-management');
		Route::post('/user/home/manajemen-user/anggota/tambah', [User\Home\SubHome\UserManagementController::class, 'tambahAnggota'])->name('user.home.user-management.anggota.add');

		Route::post('/user/home/manajemen-user/instansi/tambah', [User\Home\SubHome\UserManagementController::class, 'tambahInstansi'])->name('user.home.user-management.instansi.add');

		Route::post('/user/home/manajemen-user/admin/tambah', [User\Home\SubHome\UserManagementController::class, 'tambahAdmin'])->name('user.home.user-management.admin.add');

		Route::delete('/user/home/manajemen-user/{userId}/hapus', [User\Home\SubHome\UserManagementController::class, 'hapusUser'])->name('user.home.user-management.hapus');
});