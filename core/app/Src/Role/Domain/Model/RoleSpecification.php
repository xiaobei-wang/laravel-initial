<?php
namespace App\Src\Role\Domain\Model;

use App\Foundation\Domain\ValueObject;
use App\Foundation\Support\Interfaces\Validatable;

class RoleSpecification extends ValueObject implements Validatable
{
    /**
     * @var int
     */
    public $page;

    /**
     * @var string
     */
    public $keyword;

    public function __construct()
    {

    }

    public function validate()
    {

    }
}