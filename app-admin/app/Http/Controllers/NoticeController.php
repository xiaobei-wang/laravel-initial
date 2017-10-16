<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Src\Forms\Notice\NoticeSearchForm;
use App\Service\Notice\NoticeService;
use App\Src\Notice\Domain\Model\NoticeSpecification;
use Illuminate\Http\Request;

class NoticeController extends BaseController
{
    public function index(Request $request, NoticeSearchForm $form)
    {
        $data = [];
        $form->validate($request->all());
        $notice_service = new NoticeService();
        $data = $notice_service->getNoticeList($form->notice_specification, 20);
        $appends = $this->getAppends($form->notice_specification);
        $data['appends'] = $appends;

        return view('pages.notice.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        if (!empty($id)) {
            $notice_service = new NoticeService();
            $data = $notice_service->getNoticeInfo($id);
        }

        return view('pages.notice.edit', $data);
    }

    public function getAppends(NoticeSpecification $spec)
    {
        $appends = [];
        if ($spec->keyword) {
            $appends['keyword'] = $spec->keyword;
        }

        return $appends;
    }
}