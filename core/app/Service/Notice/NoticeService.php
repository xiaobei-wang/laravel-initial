<?php

namespace App\Service\Notice;


use App\Src\Notice\Domain\Model\NoticeEntity;
use App\Src\Notice\Domain\Model\NoticeSpecification;
use App\Src\Notice\Infra\Repository\NoticeRepository;

class NoticeService
{
    public function getNoticeList(NoticeSpecification $spec, $per_page)
    {
        $data = [];
        $notice_repository = new NoticeRepository();
        $paginate = $notice_repository->search($spec, $per_page);
        $items = [];

        /**
         * @var int                  $key
         * @var NoticeEntity         $notice_entity
         * @var LengthAwarePaginator $paginate
         */
        foreach ($paginate as $key => $notice_entity) {
            $item = $notice_entity->toArray();
            $items[] = $item;
        }

        $data['items'] = $items;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        $data['paginate'] = $paginate;

        return $data;
    }


    public function getNoticeInfo($id)
    {
        $data = [];
        $notice_repository = new NoticeRepository();
        /** @var NoticeEntity $notice_entity */
        $notice_entity = $notice_repository->fetch($id);
        if (isset($notice_entity)) {
            $data['id'] = $notice_entity->id;
            $data['from'] = $notice_entity->from;
            $data['title'] = $notice_entity->title;
            $data['content'] = $notice_entity->content;
            $data['link'] = $notice_entity->link;
            $data['status'] = $notice_entity->status;
        }
        return $data;
    }

}