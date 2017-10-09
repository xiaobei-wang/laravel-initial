<?php namespace App\Src\User\Infra\Repository;

use App\Foundation\Domain\Repository;
use App\Src\User\Domain\Interfaces\UserInterface;
use App\Src\User\Domain\Model\UserEntity;
use App\Src\User\Infra\Eloquent\UserModel;
use Illuminate\Support\Facades\Hash;


class UserRepository extends Repository implements UserInterface
{

    /**
     * @param UserEntity $user_entity
     */
    protected function store($user_entity)
    {
        $model = new UserModel();
        $model->fill(
            [
                'account'  => $user_entity->account,
                'email'    => $user_entity->email,
                'password' => Hash::make($user_entity->password)
            ]
        );
        $model->save();
        $user_entity->setIdentity($model->id);
    }

    protected function reconstitute($id, $params = [])
    {

    }
}
