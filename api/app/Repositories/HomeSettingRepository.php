<?php

namespace App\Repositories;

use App\Models\HomeSetting;
use App\Interfaces\Repository\HomeSettingRepositoryInterface;

class HomeSettingRepository extends SortFilterSearchRepository implements HomeSettingRepositoryInterface
{
    public function __construct(HomeSetting $model)
    {
        $this->model = $model;
    }
}
