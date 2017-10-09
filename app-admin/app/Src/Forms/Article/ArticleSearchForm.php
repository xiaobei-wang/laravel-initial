<?php
namespace App\Admin\Src\Forms\Article;

use App\Admin\Src\Forms\Form;
use App\Src\Article\Domain\Model\ArticleSpecification;

class ArticleSearchForm extends Form
{
    public $article_specification;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keyword' => 'string|',
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
        $this->article_specification = new ArticleSpecification();
        $this->article_specification->keyword = array_get($this->data, 'keyword');
    }

}