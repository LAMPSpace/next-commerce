<?php

namespace App\Services;

use App\Interfaces\Repository\ManufacturerRepositoryInterface;
use App\Interfaces\Service\ManufacturerServiceInterface;

class ManufacturerService extends SortFilterSearchService implements ManufacturerServiceInterface
{    
    public function __construct(ManufacturerRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }
}