<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseService
{
    protected $repository;
    protected $model;

    public function __construct($repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }

    public function list(array $params): Collection | LengthAwarePaginator
    {
        $params = $this->getUrlParams($params);
        return $this->repository->list($params);
    }

    public function find(string | int $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(array $data, string | int $id): bool
    {
        return $this->repository->update($data, $id);
    }

    public function delete(string | int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function getPerPage(array $params): array
    {
        $perPage = $params['per-page'] ?? $this->model->getPerPage();
        $perPage = ((int) $perPage > 1 || $perPage == 'all') ? $perPage :  $this->model->getPerPage();
        $params['per-page'] = $perPage;
        return $params;
    }

    public function getUrlParams(array $params): array
    {
        $params = $this->getPerPage($params);
        return $params;
    }
}
