<?php namespace App\Src\Article\Infra\Repository;

use App\Foundation\Domain\Repository;
use App\Src\Article\Domain\Interfaces\ArticleInterface;
use App\Src\Article\Domain\Model\ArticleEntity;
use App\Src\Article\Domain\Model\ArticleSpecification;
use App\Src\Article\Infra\Eloquent\ArticleModel;

class ArticleRepository extends Repository implements ArticleInterface
{

    /**
     * Store an entity into persistence.
     *
     * @param ArticleEntity $article_entity
     */
    protected function store($article_entity)
    {
        if ($article_entity->isStored()) {
            $model = ArticleModel::find($article_entity->id);
        } else {
            $model = new ArticleModel();
        }

        $model->fill(
            [
                'title'   => $article_entity->title,
                'content' => $article_entity->content,
//                'user_id' => $article_entity->user_id,
            ]
        );
        $model->save();
        $article_entity->setIdentity($model->id);
    }

    protected function reconstitute($id, $params = [])
    {
        $model = ArticleModel::find($id);
        if (!isset($model)) {
            return null;
        }
        return $this->reconstituteFromModel($model);

    }


    /**
     * @param $model
     * @return ArticleEntity
     */
    private function reconstituteFromModel($model)
    {
        $entity = new ArticleEntity();
        $entity->id = $model->id;
        $entity->title = $model->title;
        $entity->content = $model->content;
//        $entity->user_id = $model->user_id;
        $entity->created_at = $model->created_at;
        $entity->updated_at = $model->updated_at;
        $entity->setIdentity($model->id);
        $entity->stored();
        return $entity;
    }

    /**
     * @param ArticleSpecification $spec
     * @param int                  $per_page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(ArticleSpecification $spec, $per_page = 10)
    {
        $builder = ArticleModel::query();

        if ($spec->keyword) {
            $builder->where('title', 'like', '%' . $spec->keyword . '%');
        }
        $builder->orderBy('id', 'desc');
        if ($spec->page) {
            $paginator = $builder->paginate($per_page, ['*'], 'page', $spec->page);
        } else {
            $paginator = $builder->paginate($per_page);
        }

        foreach ($paginator as $key => $model) {
            $paginator[$key] = $this->reconstituteFromModel($model)->stored();
        }
        return $paginator;
    }

    /**
     * @param $ids\array $ids
     */
    public function delete($ids)
    {
        $builder = ArticleModel::query();
        $builder->whereIn('id', (array)$ids);
        $models = $builder->get();
        foreach ($models as $model) {
            $model->delete();
        }
    }
}