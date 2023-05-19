<?php

namespace App\Services;

use Illuminate\Http\Request;
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

    public function list(Request $request): Collection | LengthAwarePaginator
    {
        $params = $this->getUrlParams($request);
        return $this->repository->list($params);
    }

    public function find(string $uuid): ?Model
    {
        return $this->repository->find($uuid);
    }

    public function create(Request $request): Model
    {
        $data = $request->all();
        return $this->repository->create($data);
    }

    public function update(Request $request, string $uuid): bool
    {
        $data = $request->all();
        return $this->repository->update($data, $uuid);
    }

    public function delete(string $uuid): bool
    {
        return $this->repository->delete($uuid);
    }

    public function getPerPage(array $params): array
    {
        $perPage = $params['per-page'] ?? $this->model->getPerPage();
        $perPage = ((int) $perPage > 1 || $perPage == 'all') ? $perPage :  $this->model->getPerPage();
        $params['per-page'] = $perPage;
        return $params;
    }

    public function getUrlParams(Request $request): array
    {
        $params = $request->all();
        $params = $this->getPerPage($params);
        return $params;
    }
}
