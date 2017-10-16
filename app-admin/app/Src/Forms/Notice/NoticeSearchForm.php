<?php

namespace App\Admin\Src\Forms\Notice;

use App\Admin\Src\Forms\Form;
use App\Src\Notice\Domain\Model\NoticeSpecification;

class NoticeSearchForm extends Form
{
    public $notice_specification;

    /**
     * Get the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keyword' => 'string|nullable',
        ];

    }

    protected function messages()
    {
        return [
            'string' => ':attribute必须是字符串',
        ];
    }

    public function attributes()
    {
        return [
            'keyword' => '关键字',
        ];
    }

    public function validation()
    {
        $this->notice_specification = new NoticeSpecification();
        $this->notice_specification->keyword = array_get($this->data, 'keyword');
    }

}