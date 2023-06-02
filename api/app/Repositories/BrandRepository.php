<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Brand;
use App\Interfaces\Repository\BrandRepositoryInterface;

class BrandRepository extends SortFilterSearchRepository implements BrandRepositoryInterface
{    
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }
}