<?php

namespace App\Web\Http\Controllers\Api;

use App\Src\Article\Infra\Repository\ArticleRepository;
use App\Web\Http\Controllers\BaseController;
use App\Web\Src\Forms\Article\ArticleDeleteForm;
use App\Web\Src\Forms\Article\ArticleStoreForm;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function store(Request $request, ArticleStoreForm $form, $id)
    {
        $data = [];
        $form->validate($request->all());
        $article_repository = new ArticleRepository();

        $article_repository->save($form->article_entity);
        $data['id'] = $form->article_entity->id;
        return response()->json($data, 200);
    }

    public function update(Request $request, ArticleStoreForm $form, $id)
    {
        return $this->store($request, $form, $id);
    }

    public function delete(Request $request, ArticleDeleteForm $form, $id)
    {
        $data = [];
        $request->merge(['id' => $id]);
        $form->validate($request->all());
        $article_repository = new ArticleRepository();
        $article_repository->delete($id);

        return response()->json($data, 200);
    }

    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/' . $path);
    }
}