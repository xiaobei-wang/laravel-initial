<?php
namespace App\Admin\Src\Forms\User;

use App\Admin\Src\Forms\Form;
use App\Src\Role\Infra\Repository\UserRepository;
use App\Src\Role\Domain\Model\UserEntity;

class UserStoreForm extends Form
{
    public $user_entity;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account'   => 'required|string',
            'company_name' => 'required|string',
            'position' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|integer',
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
            $user_repository = new UserRepository();
             /** @var UserEntity $user_entity */
            $user_entity = $user_repository->fetch(array_get($this->data, 'id'));
        }else{
            $user_entity = new UserEntity();
        }

        $user_entity->account = array_get($this->data,'account');
        $user_entity->company_id = array_get($this->data,'company_id') ?? 0;
        $user_entity->employee_id = array_get($this->data,'employee_id') ?? 0;
        $user_entity->company_name = array_get($this->data,'company_name');
        $user_entity->position = array_get($this->data,'position');
        $user_entity->name = array_get($this->data,'name');
        $user_entity->phone = array_get($this->data,'phone');
        $user_entity->email = array_get($this->data,'email');
        $user_entity->status = array_get($this->data,'status') ?? 0;
        $this->user_entity = $user_entity;
    }
}