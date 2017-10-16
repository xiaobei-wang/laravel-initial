<?php

namespace App\Admin\Src\Forms\Notice;

use App\Admin\Src\Forms\Form;
use App\Src\Notice\Domain\Model\NoticeEntity;
use App\Src\Notice\Infra\Repository\NoticeRepository;

class NoticeStoreForm extends Form
{
    public $notice_entity;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from'    => 'required|integer',
            'title'   => 'required|string',
            'content' => 'required|string',
            'link'    => 'required|string',
        ];

    }

    protected function messages()
    {
        return [
            'required'    => ':attribute必填。',
            'string'      => ':attribute必须是字符串。',
            'date_format' => ':attribute格式错误。',
            'integer'     => ':attribute必须是数字',
        ];
    }

    public function attributes()
    {
        return [
            'from'    => '发送者',
            'title'   => '标题',
            'content' => '内容',
            'link'    => '链接',
            'status'  => '状态',
        ];
    }

    public function validation()
    {
        if ($id = array_get($this->data, 'id')) {
            $notice_repository = new NoticeRepository();
            /** @var NoticeEntity $notice_entity */
            $notice_entity = $notice_repository->fetch(array_get($this->data, 'id'));
        } else {
            $notice_entity = new NoticeEntity();
        }

        $notice_entity->from = array_get($this->data, 'from');
        $notice_entity->title = array_get($this->data, 'title');
        $notice_entity->content = array_get($this->data, 'content');
        $notice_entity->link = array_get($this->data, 'link');
        $this->notice_entity = $notice_entity;
    }

}