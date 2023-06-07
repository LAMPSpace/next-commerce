<?php

namespace App\Services;

use App\Interfaces\Repository\CategoryRepositoryInterface;
use App\Interfaces\Service\CategoryServiceInterface;
use App\Models\Category;

class CategoryService extends SortFilterSearchService implements CategoryServiceInterface
{
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }

    protected function getLevel(array $data)
    {
        $parent_id = isset($data['parent_id']) ? $data['parent_id'] : null;
        return $parent_id != null ? Category::find($parent_id)->level + 1 : 1;
    }

    public function getData($request)
    {
        $data = $request->all();
        $data['level'] = $this->getLevel($data);
        return $data;
    }

    public function create($request): Category
    {
        $data = $this->getData($request);
        return $this->repository->create($data);
    }

    public function update($request, string | int $id): bool
    {
        $data = $this->getData($request);
        return $this->repository->update($data, $id);
    }
}
