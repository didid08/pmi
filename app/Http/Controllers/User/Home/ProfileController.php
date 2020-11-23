<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\User\Home\MasterController;
use Illuminate\Http\Request;

class ProfileController extends MasterController
{
    public $activeMenu = 'profile';

    public function viewPage ()
    {
        return $this->view('profile');
    }
}
