<?php

namespace App\Service\User;

use App\Src\Role\Domain\Model\UserSpecification;
use App\Src\Role\Infra\Repository\UserRepository;

class UserService
{
    public function getUserList(UserSpecification $spec, $per_page)
    {
        $data = [];
        $user_repository = new UserRepository();
        $paginate = $user_repository->search($spec, $per_page);

        $items = [];

        /**
         * @var int                  $key
         * @var UserEntity        $user_entity
         * @var LengthAwarePaginator $paginate
         */
        foreach ($paginate as $key => $user_entity) {
            $item = $user_entity->toArray();

            $items[] = $item;
        }
        $data['items'] = $items;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        $data['paginate'] = $paginate;

        return $data;
    }


    public function getUserInfo($id)
    {
        $data = [];
        $user_repository = new UserRepository();
        /** @var UserEntity $user_entity */
        $user_entity = $user_repository->fetch($id);
        if(isset($user_entity)){
            $data['id'] = $user_entity->id;
            $data['account'] = $user_entity->account;
            $data['company_name'] = $user_entity->company_name;
            $data['position'] = $user_entity->position;
            $data['name'] = $user_entity->name;
            $data['phone'] = $user_entity->phone;
            $data['email'] = $user_entity->email;
        }
        return $data;
    }

}