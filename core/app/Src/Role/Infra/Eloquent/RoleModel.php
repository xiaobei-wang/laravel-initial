<?php namespace App\Src\Role\Infra\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends Model
{
    use SoftDeletes;

    protected $table = 'role';

    protected $fillable = [
        'name',
        'desc',
    ];

    public function permissions()
    {
        return $this->belongsToMany(PermissionModel::class, 'role_permission', 'role_id', 'permission_id')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(UserModel::class, 'user_role', 'role_id', 'user_id')->withTimestamps();
    }


}