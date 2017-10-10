<?php
namespace App\Admin\Src\Forms\User;

use App\Admin\Src\Forms\Form;
use App\Src\Role\Domain\Model\UserSpecification;

class UserSearchForm extends Form
{
    public $user_specification;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keyword' => 'string',
        ];

    }

    protected function messages()
    {
        return [
            'string' => ':attribute必须是字符串',
        ];
    }

    public function attributes()
    {
        return [
            'keyword' => '关键字',
        ];
    }

    public function validation()
    {
        $this->user_specification = new UserSpecification();
        $this->user_specification->keyword = array_get($this->data, 'keyword');
    }

}