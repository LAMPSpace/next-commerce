<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function list(array $params): Collection | LengthAwarePaginator
    {
        $query = $this->model->getAllInformation();
        return $params['per-page'] == 'all' ? $query->get() : $query->paginate($params['per-page']);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, string | int $id): bool
    {
        return $this->find($id)->update($data);
    }

    public function delete(string | int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function find(string | int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }
}
