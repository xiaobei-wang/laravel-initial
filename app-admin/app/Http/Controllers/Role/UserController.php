<?php

namespace App\Admin\Http\Controllers\Role;

use App\Admin\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Admin\Src\Forms\Role\User\UserSearchForm;
use App\Service\Role\User\UserService;
use App\Src\Role\Domain\Model\UserSpecification;

class UserController extends BaseController
{

    public function index(Request $request, UserSearchForm $form)
    {
        $data = [];
        $form->validate($request->all());

        $user_service = new UserService();
        $data = $user_service->getUserList($form->user_specification, 20);

        $appends = $this->getAppends($form->user_specification);
        $data['appends'] = $appends;

        return view('pages.role.user.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $user_service = new UserService();
            $data = $user_service->getUserInfo($id);
        }

        return view('pages.role.user.edit', $data);
    }

    public function getAppends(UserSpecification $spec)
    {
        $appends = [];
        if ($spec->keyword) {
            $appends['keyword'] = $spec->keyword;
        }

        return $appends;
    }
}