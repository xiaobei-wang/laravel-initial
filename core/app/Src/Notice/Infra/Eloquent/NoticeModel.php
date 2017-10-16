<?php namespace App\Src\Notice\Infra\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NoticeModel extends Model
{
    use SoftDeletes;

    protected $table = 'notice';

    protected $fillable = [
        'from',
        'title',
        'content',
        'link',
        'status',
    ];
}