<?php

namespace App\Interfaces\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ManufacturerRepositoryInterface
{
    public function getModel(): Model;
    public function list(array $params): Collection | LengthAwarePaginator;
    public function create(array $data): Model;
    public function update(array $data, string $uuid): bool;
    public function delete(string $uuid): bool;
    public function find(string $uuid): ?Model;
}