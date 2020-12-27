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
        $kasusCovidProvId = json_decode(file_get_contents('http://localhost/api-corona/provinsi-all.php'), true);
        return $this->view('dashboard', [
            'kasusCovidProvId' => $kasusCovidProvId
        ]);
    }
}
