<?php namespace App\Src\Notice\Infra\Repository;

use App\Foundation\Domain\Repository;
use App\Src\Notice\Infra\Eloquent\NoticeModel;
use App\Src\Notice\Domain\Interfaces\NoticeInterfaces;
use App\Src\Notice\Domain\Model\NoticeEntity;
use App\Src\Notice\Domain\Model\NoticeSpecification;

class NoticeRepository extends Repository implements NoticeInterfaces
{

    /**
     * Store an entity into persistence.
     *
     * @param NoticeEntity $notice_entity
     */
    protected function store($notice_entity)
    {
        if ($notice_entity->isStored()) {
            $model = NoticeModel::find($notice_entity->id);
        } else {
            $model = new NoticeModel();
        }
        $model->fill([
            'from'    => $notice_entity->from,
            'title'   => $notice_entity->title,
            'content' => $notice_entity->content,
            'link'    => $notice_entity->link,
        ]);
        $model->save();
        $notice_entity->setIdentity($model->id);
    }

    protected function reconstitute($id, $params = [])
    {
        $model = NoticeModel::find($id);
        if (!isset($model)) {
            return null;
        }
        return $this->reconstituteFromModel($model);
    }


    /**
     * @param $model
     * @return NoticeEntity
     */
    private function reconstituteFromModel($model)
    {
        $notice_entity = new NoticeEntity();
        $notice_entity->id = $model->id;
        $notice_entity->from = $model->from;
        $notice_entity->title = $model->title;
        $notice_entity->content = $model->content;
        $notice_entity->link = $model->link;
        $notice_entity->created_at = $model->created_at;
        $notice_entity->updated_at = $model->updated_at;
        $notice_entity->setIdentity($model->id);
        $notice_entity->stored();
        return $notice_entity;
    }

    /**
     * @param NoticeSpecification $spec
     * @param int                 $per_page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(NoticeSpecification $spec, $per_page = 10)
    {
        $builder = NoticeModel::query();
        if ($spec->keyword) {
            $builder->where('title', 'like', '%' . $spec->keyword . '%');
        }

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
        $builder = NoticeModel::query();
        $builder->where('id', (array)$ids);
        $models = $builder->get();
        foreach ($models as $model) {
            $model->delete();
        }

    }
}