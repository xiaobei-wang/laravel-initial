<?php

namespace App\Web\Http\Controllers;

use App\Web\Http\Controllers\BaseController;

class RegisterController extends BaseController
{
    //注册页面
    public function index()
    {
        return $this->view('pages.register.index');
    }
}
