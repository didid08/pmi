<?php

namespace App\Http\Controllers\User\Home\SubHome;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Http\Request;

class DashboardController extends HomeController
{
    public $activeMenu = 'dashboard';
    public $subTitle = 'Dashboard';

    public function viewPage ()
    {
        return $this->view('dashboard');
    }
}
