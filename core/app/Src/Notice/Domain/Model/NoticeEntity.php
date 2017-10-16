<?php namespace App\Src\Notice\Domain\Model;

use App\Foundation\Domain\Entity;

class NoticeEntity extends Entity
{
    /**
     * @var int
     */
    public $id;

    public $identity_key = 'id';

    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $link;

    /**
     * @var int
     */
    public $status;


    public function __construct()
    {
    }

    public function toArray($is_filter_null = false)
    {
        return [
            'id'         => $this->id,
            'from'       => $this->from,
            'title'      => $this->title,
            'content'    => $this->content,
            'link'       => $this->link,
            'status'     => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}