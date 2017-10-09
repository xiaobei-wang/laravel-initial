<?php namespace App\Src\Article\Domain\Model;

use App\Foundation\Domain\Entity;

class ArticleEntity extends Entity
{
    /**
     * @var int
     */
    public $id;

    public $identity_key = 'id';

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * @var int
     */
    public $user_id;

    public function __construct()
    {
    }

    public function toArray($is_filter_null = false)
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'content'    => $this->content,
            'user_id'    => $this->user_id,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}