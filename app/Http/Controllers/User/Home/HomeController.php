<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public $activeMenu = '';
    public $subTitle = 'Main';

    public function view($view, $data = [])
    {
        return view('user.home.subhome.'.$view, array_merge([
            'activeMenu' => $this->activeMenu,
            'subTitle' => $this->subTitle
        ], $data));
    }
}
