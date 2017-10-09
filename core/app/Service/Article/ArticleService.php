<?php

namespace App\Service\Article;


use App\Src\Article\Domain\Model\ArticleEntity;
use App\Src\Article\Domain\Model\ArticleSpecification;
use App\Src\Article\Infra\Repository\ArticleRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function getArticleList(ArticleSpecification $spec, $per_page)
    {
        $data = [];
        $article_repository = new ArticleRepository();
        $paginate = $article_repository->search($spec, $per_page);

        $items = [];

        /**
         * @var int                  $key
         * @var ArticleEntity        $article_entity
         * @var LengthAwarePaginator $paginate
         */
        foreach ($paginate as $key => $article_entity) {
            $item = $article_entity->toArray();

            $items[] = $item;
        }
        $data['items'] = $items;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        $data['paginate'] = $paginate;

        return $data;
    }

    public function getArticleInfo($id)
    {
        $data = [];
        $article_repository = new ArticleRepository();
        /** @var ArticleEntity $article_entity */
        $article_entity = $article_repository->fetch($id);
        if (isset($article_entity)) {
            $data['id'] = $article_entity->id;
            $data['title'] = $article_entity->title;
            $data['content'] = $article_entity->content;
        }
        return $data;
    }
}