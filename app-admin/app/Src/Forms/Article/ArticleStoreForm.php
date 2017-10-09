<?php
namespace App\Admin\Src\Forms\Article;

use App\Admin\Src\Forms\Form;
use App\Src\Article\Domain\Model\ArticleEntity;
use App\Src\Article\Infra\Repository\ArticleRepository;

class ArticleStoreForm extends Form
{
    public $article_entity;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'required|string',
            'content' => 'required|string',
        ];

    }

    protected function messages()
    {
        return [
            'required'    => ':attribute必填。',
            'string'      => ':attribute必须是字符串。',
            'date_format' => ':attribute格式错误。',
        ];
    }

    public function attributes()
    {
        return [
            'title'   => '标题',
            'content' => '内容',
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
        $this->article_entity = $article_entity;
    }

}