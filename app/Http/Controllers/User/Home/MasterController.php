<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public $activeMenu = '';

    public function view($view, $data = [])
    {
        return view('user.home.'.$view, array_merge([
            'activeMenu' => $this->activeMenu
        ], $data));
    }
}
