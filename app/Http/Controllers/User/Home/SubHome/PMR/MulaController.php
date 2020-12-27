<?php

namespace App\Http\Controllers\User\Home\SubHome\PMR;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataInstansi;

class MulaController extends HomeController
{
    public function viewPage ()
    {
        return view('user.coming-soon');
    }
}
