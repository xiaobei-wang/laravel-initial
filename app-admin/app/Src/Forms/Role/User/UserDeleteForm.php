<?php

namespace App\Admin\Src\Forms\Role\User;

use App\Admin\Src\Forms\Form;

class UserDeleteForm extends Form
{
    public $id;

    public function rules()
    {
        return [
            'id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required'    => ':attribute必填。',
            'date_format' => ':attribute格式错误。',
            'integer'     => ':attribute必须是数字',
        ];
    }

    public function attributes()
    {
        return [
            'id' => '标识',
        ];
    }

    public function validation()
    {
        $this->id = array_get($this->data, 'id');
    }

}
