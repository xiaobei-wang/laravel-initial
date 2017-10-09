<?php

namespace App\Web\Http\Controllers\Api;

use App\Web\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{


    public function login()
    {

    }

    public function logout(Request $request)
    {
        Auth::logout();
        //在哪里退出再那个页面
        return redirect()->back();
    }
}