<?php

namespace App\Admin\Http\Controllers\Role;

use App\Admin\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    public function index()
    {
        $data = [];
        return view('pages.role.user.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        return view('pages.role.user.edit', $data);
    }

}


