<?php namespace App\Src\User\Infra\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserModel extends Model
{
    use SoftDeletes;

    protected $table = 'user';

    protected $fillable = [
        'account',
        'email',
        'password',
    ];
}