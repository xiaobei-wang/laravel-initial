<?php

namespace App\Web\Http\Controllers\Api;

use App\Src\User\Infra\Repository\UserRepository;
use App\Web\Http\Controllers\BaseController;
use App\Web\Src\Forms\User\UserStoreForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    public function register(Request $request, UserStoreForm $form)
    {
        $data = [];
        $form->validate($request->all());
        $user_repository = new UserRepository();
        $user_repository->save($form->user_entity);
        return response()->json($data, 200);
    }
}