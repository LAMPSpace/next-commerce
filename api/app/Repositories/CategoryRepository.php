<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Category;
use App\Interfaces\Repository\CategoryRepositoryInterface;

class CategoryRepository extends SortFilterSearchRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
