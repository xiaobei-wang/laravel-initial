<?php

use Illuminate\Database\Seeder;
use App\Src\Role\Infra\Eloquent\PermissionModel;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = $this->getData();
        foreach ($items as $item) {
            $permission_model = PermissionModel::find($item['id']);
            if (!isset($permission_model)) {
                $permission_model = new PermissionModel();
                $permission_model->id = $item['id'];
            }
            $permission_model->name = $item['name'];
            $permission_model->code = $item['code'];
            $permission_model->save();
        }
    }

    private function getData()
    {
        return [
            //用户管理
            [
                'id'   => 1,
                'name' => '用户管理',
                'code' => '1001',
            ],
            [
                'id'   => 2,
                'name' => '用户添加',
                'code' => '1002',
            ],
            [
                'id'   => 3,
                'name' => '用户修改',
                'code' => '1003',
            ],
            [
                'id'   => 4,
                'name' => '用户删除',
                'code' => '1004',
            ],
            //角色管理
            [
                'id'   => 5,
                'name' => '角色管理',
                'code' => '1005',
            ],
            [
                'id'   => 6,
                'name' => '角色添加',
                'code' => '1006',
            ],
            [
                'id'   => 7,
                'name' => '角色修改',
                'code' => '1007',
            ],
            [
                'id'   => 8,
                'name' => '角色删除',
                'code' => '1008',
            ],
        ];
    }
}
