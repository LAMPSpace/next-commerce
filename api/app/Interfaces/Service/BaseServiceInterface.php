<?php

namespace App\Interfaces\Service;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseServiceInterface
{
    public function list(array $params): Collection | LengthAwarePaginator;
    public function find(string | int $id): ?Model;
    public function create(array $data): Model;
    public function update(array $data, string | int $id): bool;
    public function delete(string | int $id): bool;
    public function getPerPage(array $params): array;
    public function getUrlParams(array $params): array;
}
