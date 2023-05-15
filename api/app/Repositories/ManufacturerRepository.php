<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Manufacturer;
use App\Interfaces\Repository\ManufacturerRepositoryInterface;

class ManufacturerRepository extends SortFilterSearchRepository implements ManufacturerRepositoryInterface
{    
    public function __construct(Manufacturer $model)
    {
        $this->model = $model;
    }
}