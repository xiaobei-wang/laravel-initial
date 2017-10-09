<?php namespace App\Src\Article\Domain\Interfaces;

use App\Foundation\Domain\Interfaces\Repository;
use App\Src\Article\Domain\Model\ArticleSpecification;

interface ArticleInterface extends Repository
{

    public function search(ArticleSpecification $spec, $per_page = 10);

    public function delete($ids);
}