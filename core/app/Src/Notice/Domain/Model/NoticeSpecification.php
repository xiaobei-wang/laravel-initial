<?php

namespace App\Src\Notice\Domain\Model;

use App\Foundation\Domain\ValueObject;
use App\Foundation\Support\Interfaces\Validatable;

class NoticeSpecification extends ValueObject implements Validatable
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