<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\User\Home\MasterController;
use Illuminate\Http\Request;

class DashboardController extends MasterController
{
    public $activeMenu = 'dashboard';

    public function viewPage ()
    {
        return $this->view('dashboard');
    }
}
