<?php namespace App\Src\Role\Infra\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartModel extends Model
{
    use SoftDeletes;

    protected $table = 'depart';

    protected $fillable = [
        'parent_id',
        'name',
        'level',
        'desc',
    ];

    public function users()
    {
        return $this->belongsToMany(UserModel::class, 'user_depart', 'depart_id', 'user_id');
    }

}