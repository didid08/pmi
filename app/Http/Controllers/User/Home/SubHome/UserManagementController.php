<?php

namespace App\Http\Controllers\User\Home\SubHome;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataAnggota;
use App\Models\DataInstansi;

class UserManagementController extends HomeController
{
    public $activeMenu = 'manajemen-user';
    public $subTitle = 'Manajemen User';

    public function viewPage ()
    {
        return $this->view('user-management', [
            'semuaAnggota' => User::where('role', '1')->get(),
            'semuaInstansi' => User::where('role', '2')->get(),
            'semuaModerator' => User::where('role', '3')->get(),
            'semuaAdmin' => User::where('role', '4')->get()
        ]);
    }
}
