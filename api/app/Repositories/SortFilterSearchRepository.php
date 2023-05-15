<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

abstract class SortFilterSearchRepository extends BaseRepository
{
    public function list(array $params): Collection | LengthAwarePaginator
    {
        $query = $this->model->getAllInformation();
        $query = $this->sort($query, $params);
        $query = $this->filter($query, $params);
        $query = $this->search($query, $params);
        return $params['per-page'] == 'all' ? $query->get() : $query->paginate($params['per-page']);
    }

    public function sort(Builder $query, array $params): Builder
    {
        return $query->when($params['sort-by']['custom'] == false, function ($query) use ($params) {
            $query->orderBy($params['sort-by']['field'], $params['sort'])
                ->orderBy($params['secondary-sort-by']);
        })->when($params['sort-by']['custom'] == true, function ($query) use ($params) {
            foreach ($params['sort-by']['field'] as $field) {
                $query->orderBy($field['sort-by'], $field['sort']);
            }
        });
    }

    public function filter(Builder $query, array $params): Builder
    {
        return $query->where(function ($query) use ($params) {
            foreach ($params['filter'] as $field => $filterData) {
                $query->where(function ($query) use ($field, $filterData) {
                    $query->when($filterData['type'] == 'equal', function ($query) use ($field, $filterData) {
                        foreach ($filterData['values'] as $value) {
                            $query->orWhere(DB::raw($field), '=', $value);
                        }
                    })->when($filterData['type'] == 'contain', function ($query) use ($field, $filterData) {
                        foreach ($filterData['values'] as $value) {
                            $query->orWhere(DB::raw($field), 'LIKE', '%' . $value . '%');
                        }
                    })->when($filterData['type'] == 'not-contain', function ($query) use ($field, $filterData) {
                        foreach ($filterData['values'] as $value) {
                            $query->where(DB::raw($field), 'NOT LIKE', '%' . $value . '%');
                        }
                    });
                });
            }
        });
    }

    public function search(Builder $query, array $params): Builder
    {
        return $query->where(function ($query) use ($params) {
            foreach ($params['search']['fields'] as $field) {
                $query->orWhere(DB::raw($field), 'LIKE', '%' . $params['search']['value'] . '%');
            }
        });
    }
}
