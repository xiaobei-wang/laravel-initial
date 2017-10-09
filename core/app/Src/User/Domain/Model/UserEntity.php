<?php namespace App\Src\User\Domain\Model;

use App\Foundation\Domain\Entity;

class UserEntity extends Entity
{
    /**
     * @var string
     */
    public $account;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    public function __construct()
    {
    }

    public function toArray($is_filter_null = false)
    {
        return [
            'account'    => $this->account,
            'email'      => $this->email,
            'password'   => $this->password,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }


}