<?php

namespace App\Src\Notice\Domain\Model;

use App\Foundation\Domain\Enum;

/**
 *  通知类型
 * Class NOticeType
 * @package App\Src\Notice\Domain\Model
 */
class NoticeStatus extends Enum
{
    const HAS_READ = 1;    //已读
    const NOT_READ = 2;    //未读

    /**
     * OperationModelType type.
     *
     * @var int
     */
    public $type;

    /**
     * Define property name of enum value.
     *
     * @var string
     */
    protected $enum = 'status';

    /**
     * Acceptable operation  model type.
     *
     * @var array
     */
    protected static $enums = [
        self::HAS_READ => '已读',
        self::NOT_READ => '未读',
    ];
}