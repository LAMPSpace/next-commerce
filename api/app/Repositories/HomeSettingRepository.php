<?php

namespace App\Repositories;

use App\Models\HomeSetting;
use App\Interfaces\Repository\HomeSettingRepositoryInterface;
use Carbon\Carbon;

class HomeSettingRepository extends SortFilterSearchRepository implements HomeSettingRepositoryInterface
{
    public function __construct(HomeSetting $model)
    {
        $this->model = $model;
    }

    public function current(): HomeSetting
    {
        return $this->model
            ->getAllInformation()
            ->where('name', 'Default')
            ->orWhere(function ($query) {
                $query->whereDate('start_date', '<=', Carbon::today('Asia/Ho_Chi_Minh'))
                    ->whereDate('end_date', '>=', Carbon::today('Asia/Ho_Chi_Minh'));
            })
            ->orderBy('end_date', 'asc')
            ->orderBy('start_date', 'desc')
            ->orderBy('id')
            ->firstOrFail();
    }
}
