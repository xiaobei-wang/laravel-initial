<?php

namespace App\Web\Src\Forms\Article;


use App\Web\Src\Forms\Form;
use App\Service\Article\NoticeService;
use App\Src\Article\Domain\Model\ArticleEntity;
use App\Src\Article\Infra\Repository\ArticleRepository;

class ArticleStoreForm extends Form
{
    /**
     * @var ArticleEntity
     */
    public $article_entity;

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
        if ($id = array_get($this->data, 'id')) {
            $article_repository = new ArticleRepository();
            /** @var ArticleEntity $article_entity */
            $article_entity = $article_repository->fetch(array_get($this->data, 'id'));
        } else {
            $article_entity = new ArticleEntity();
        }

        $article_entity->title = array_get($this->data, 'title');
        $article_entity->content = array_get($this->data, 'content');
//        $article_entity->user_id = array_get($this->data, 'user_id');
        $this->article_entity = $article_entity;
    }

}