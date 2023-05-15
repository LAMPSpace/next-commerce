<?php

namespace App\Services;

use App\Interfaces\Repository\CategoryRepositoryInterface;
use App\Interfaces\Service\CategoryServiceInterface;

class CategoryService extends SortFilterSearchService implements CategoryServiceInterface
{    
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }
}