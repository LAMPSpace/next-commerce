<?php

namespace App\Services;

use App\Interfaces\Repository\BrandRepositoryInterface;
use App\Interfaces\Service\BrandServiceInterface;

class BrandService extends SortFilterSearchService implements BrandServiceInterface
{
    public function __construct(BrandRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }
}
