<?php

namespace App\Admin\Src\Forms\Role\Role;

use App\Admin\Src\Forms\Form;
use App\Src\Role\Domain\Model\RoleEntity;
use App\Src\Role\Infra\Repository\RoleRepository;

class RoleStoreForm extends Form
{
    public $role_entity;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|string',
            'permissions' => 'required|array',
        ];

    }

    protected function messages()
    {
        return [
            'required'    => ':attribute必填。',
            'string'      => ':attribute必须是字符串。',
            'date_format' => ':attribute格式错误。',
            'integer'     => ':attribute必须是数字',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function validation()
    {
        if ($id = array_get($this->data, 'id')) {
            $role_repository = new RoleRepository();
            /** @var RoleEntity $role_entity */
            $role_entity = $role_repository->fetch($id);
        } else {
            $role_entity = new RoleEntity();
        }
        $role_entity->name = array_get($this->data, 'name');
        $role_entity->permissions = array_get($this->data, 'permissions');
        $role_entity->users = array_get($this->data, 'user_roles');

        $this->role_entity = $role_entity;
    }
}
