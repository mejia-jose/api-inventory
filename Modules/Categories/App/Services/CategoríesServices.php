<?php

namespace Modules\Categories\App\Services;

use Exception;

use Modules\Categories\App\Repositories\CategorieRepositoryInterface;

class CategoriesServices
{
  protected $categorieRepository;

  public function __construct(CategorieRepositoryInterface $categorieRepository)
  {
    $this->categorieRepository = $categorieRepository;
  }
}