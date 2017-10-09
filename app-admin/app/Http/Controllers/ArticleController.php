<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Src\Forms\Article\ArticleSearchForm;
use App\Service\Article\ArticleService;
use App\Src\Article\Domain\Model\ArticleSpecification;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function index(Request $request, ArticleSearchForm $form)
    {
        $data = [];
        $article_service = new ArticleService();
        $form->validate($request->all());

        $data = $article_service->getArticleList($form->article_specification, 20);
        $appends = $this->getAppends($form->article_specification);
        $data['appends'] = $appends;

        return view('pages.article.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $article_service = new ArticleService();
            $data = $article_service->getArticleInfo($id);
        }

        return view('pages.article.edit', $data);
    }

    public function getAppends(ArticleSpecification $spec)
    {
        $appends = [];
        if ($spec->keyword) {
            $appends['keyword'] = $spec->keyword;
        }

        return $appends;
    }
}