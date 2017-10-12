<?php

namespace App\Admin\Http\Controllers\Api\Role;

use App\Admin\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Admin\Src\Forms\Role\User\UserStoreForm;
use App\Src\Role\Infra\Repository\UserRepository;
use App\Admin\Src\Forms\Role\User\UserDeleteForm;

class UserController extends BaseController
{
    public function store(Request $request, UserStoreForm $form)
    {
        $data =  [];
        $form->validate($request->all());
        $user_repository = new UserRepository();
        $user_repository->save($form->user_entity);
        $data['id'] = $form->user_entity->id;
        return response()->json($data, 200);
    }

    public function update(Request $request, UserStoreForm $form, $id)
    {
        return $this->store($request, $form, $id);
    }

    public function delete(Request $request, UserDeleteForm $form, $id)
    {
      $data = [];
      $request->merge(['id' => $id]);
      $form->validate($request->all());
      $user_repository = new UserRepository();
      $user_repository->delete($id);

      return response()->json($data, 200);
    }
}
