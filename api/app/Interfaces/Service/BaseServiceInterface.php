<?php

namespace App\Interfaces\Service;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface BaseServiceInterface
{
    public function list(Request $request): Collection | LengthAwarePaginator;
    public function find(string | int $id): ?Model;
    public function create(Request $request): Model;
    public function update(Request $request, string | int $id): bool;
    public function delete(string | int $id): bool;
    public function getPerPage(array $params): array;
    public function getUrlParams(Request $request): array;
}
