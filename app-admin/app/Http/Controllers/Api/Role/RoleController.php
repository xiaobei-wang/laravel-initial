<?php

namespace App\Admin\Http\Controllers\Api\Role;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Src\Forms\Role\Role\RoleStoreForm;
use App\Src\Role\Infra\Repository\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    public function store(Request $request, RoleStoreForm $form)
    {
        $data = [];
        $form->validate($request->all());
        $role_repository = new RoleRepository();
        $role_repository->save($form->role_entity);
        $data['id'] = $form->role_entity->id;
        return response()->json($data, 200);
    }

    public function update(Request $request, RoleStoreForm $form, $id)
    {
        return $this->store($request, $form, $id);
    }

    public function delete(Request $request, UserDeleteForm $form, $id)
    {
        $data = [];
        return response()->json($data, 200);
    }
}
