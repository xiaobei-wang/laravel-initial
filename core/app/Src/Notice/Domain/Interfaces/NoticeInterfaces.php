<?php namespace App\Src\Notice\Domain\Interfaces;

use App\Foundation\Domain\Interfaces\Repository;
use App\Src\Notice\Domain\Model\NoticeSpecification;

interface NoticeInterfaces extends Repository
{

    public function search(NoticeSpecification $spec, $per_page = 10);

    public function delete($ids);
}