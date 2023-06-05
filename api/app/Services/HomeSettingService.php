<?php

namespace App\Services;

use App\Interfaces\Repository\HomeSettingRepositoryInterface;
use App\Interfaces\Service\HomeSettingServiceInterface;

class HomeSettingService extends SortFilterSearchService implements HomeSettingServiceInterface
{    
    public function __construct(HomeSettingRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }
}