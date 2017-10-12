<?php

namespace App\Service\Role\Role;


use App\Src\Role\Domain\Model\PermissionEntity;
use App\Src\Role\Domain\Model\RoleEntity;
use App\Src\Role\Domain\Model\RoleSpecification;
use App\Src\Role\Infra\Repository\PermissionRepository;
use App\Src\Role\Infra\Repository\RoleRepository;
use App\Src\Role\Infra\Repository\UserRoleRepository;

class RoleService
{
    public function getUserList(RoleSpecification $spec, $per_page)
    {
        $data = [];
        $role_repository = new RoleRepository();
        $paginate = $role_repository->search($spec, $per_page);

        $items = [];

        /**
         * @var int                  $key
         * @var RoleEntity           $role_entity
         * @var LengthAwarePaginator $paginate
         */
        $permission_repository = new PermissionRepository();
        $permission_entities = $permission_repository->all();
        $user_role_repository = new UserRoleRepository();

        /** @var int $key
         * @var RoleEntity           $role_entity
         * @var LengthAwarePaginator $paginate
         */
        foreach ($paginate as $key => $role_entity) {
            $item = $role_entity->toArray();
            $items[] = $item;
        }

        $data['items'] = $items;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        $data['paginate'] = $paginate;
        return $data;
    }


    public function getRoleInfo($id)
    {
        $data = [];
        $role_repository = new RoleRepository();
        /** @var RoleEntity $role_entity */
        $role_entity = $role_repository->fetch($id);
        if (isset($role_entity)) {
            $data = $role_entity->toArray();
        }
        return $data;
    }

    public function getPermissions()
    {
        $items = [];
        $permissions_repository = new PermissionRepository();
        /** @var PermissionEntity $permissions_entity */
        $permissions_entityes = $permissions_repository->all();
        foreach ($permissions_entityes as $permissions_entity) {
            $items[$permissions_entity->id] = $permissions_entity->toArray();
        }
        return $items;
    }

}