<?php

namespace App\Web\Src\Forms\Article;


use App\Src\Article\Infra\Repository\ArticleRepository;
use App\Web\Src\Forms\Form;

class ArticleDeleteForm extends Form
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