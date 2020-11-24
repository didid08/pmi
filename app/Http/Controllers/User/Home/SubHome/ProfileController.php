<?php

namespace App\Http\Controllers\User\Home\SubHome;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Http\Request;

class ProfileController extends HomeController
{
    public $activeMenu = 'profile';
    public $subTitle = 'Profil Saya';

    public function viewPage ()
    {
        return $this->view('profile');
    }
}
