<?php

namespace App\Web\Src\Forms\Article;

use App\Src\Article\Domain\Model\ArticleSpecification;
use App\Web\Src\Forms\Form;

class ArticleSearchForm extends Form
{

    /**
     * @var ArticleSpecification
     */
    public $article_specification;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'nullable|string',
            'content' => 'nullable|string',
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
        return [
            'keyword' => '关键字',
        ];
    }

    public function validation()
    {
        $this->article_specification = new ArticleSpecification();
        $this->article_specification->keyword = array_get($this->data, 'keyword');
    }
}