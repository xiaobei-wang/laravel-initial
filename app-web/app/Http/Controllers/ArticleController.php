<?php

namespace App\Web\Http\Controllers;

use App\Web\Http\Controllers\BaseController;
use App\Service\Article\NoticeService;
use App\Src\Article\Domain\Model\ArticleSpecification;
use App\Web\Src\Forms\Article\ArticleSearchForm;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticleController extends BaseController
{
    public function index(Request $request, ArticleSearchForm $form)
    {
        $data = [];
        $article_service = new NoticeService();
        $form->validate($request->all());
        $data = $article_service->getArticleList($form->article_specification, 20);
        $appends = $this->getAppends($form->article_specification);
        $data['appends'] = $appends;

        foreach ($data['items'] as $key => $item) {
            $data['items'][$key]['created_at'] = Carbon::parse($item['created_at'])->toFormattedDateString();
        }

        return $this->view('pages.article.index', $data);
    }

    public function detail(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $article_service = new NoticeService();
            $data = $article_service->getArticleInfo($id);
        }
        return $this->view('pages.article.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $article_service = new NoticeService();
            $data = $article_service->getArticleInfo($id);
        }
        return $this->view('pages.article.edit', $data);
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
