<?php

namespace App\Admin\Http\Controllers\Api;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Src\Forms\Notice\NoticeDeleteForm;
use App\Admin\Src\Forms\Notice\NoticeStoreForm;
use App\Src\Notice\Infra\Repository\NoticeRepository;
use Illuminate\Http\Request;

class NoticeController extends BaseController
{
    public function store(Request $request, NoticeStoreForm $form)
    {
        $data = [];
        $form->validate($request->all());
        $notice_repository = new NoticeRepository();
        $notice_repository->save($form->notice_entity);
        $data['id'] = $form->notice_entity->id;

        return response()->json($data, 200);
    }

    public function update(Request $request, NoticeStoreForm $form, $id)
    {
        return $this->store($request, $form, $id);
    }

    public function delete(Request $request, NoticeDeleteForm $form, $id)
    {
        $data = [];
        $request->merge(['id' => $id]);
        $form->validate($request->all());
        $notice_repository = new NoticeRepository();
        $notice_repository->delete($id);

        return response()->json($data, 200);
    }
}