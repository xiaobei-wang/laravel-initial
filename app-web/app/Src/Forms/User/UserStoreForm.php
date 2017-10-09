<?php

namespace App\Web\Src\Forms\User;


use App\Web\Src\Forms\Form;
use App\Src\User\Domain\Model\UserEntity;

class UserStoreForm extends Form
{
    /**
     * @var UserEntity
     */
    public $user_entity;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6',
        ];
    }

    protected function messages()
    {
        return [
            'required'    => ':attribute必填。',
            'date_format' => ':attribute格式错误',
            'string'      => ':attribute必须是字符串',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function validation()
    {
        $article_entity = new UserEntity();
        $article_entity->account = array_get($this->data, 'account');
        $article_entity->email = array_get($this->data, 'email');
        $article_entity->password = array_get($this->data, 'password');
        $this->user_entity = $article_entity;
    }

}