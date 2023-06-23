<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $defaultSortBy = 'id';

    protected $secondarySortBy = 'id';

    protected $sortFields = ['id'];

    protected $filterFields = [];

    protected $searchFields = [];

    protected $stringFields = [];

    protected $customFields = [];

    protected $customSorts = [];

    protected $perPage = 15;

    public function getSortFields()
    {
        return $this->sortFields;
    }

    public function getFilterFields()
    {
        return $this->filterFields;
    }

    public function getSearchFields()
    {
        return $this->searchFields;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function getStringFields()
    {
        return $this->stringFields;
    }

    public function getDefaultSortBy()
    {
        return $this->defaultSortBy;
    }

    public function getSecondarySortBy()
    {
        return $this->secondarySortBy;
    }

    public function getCustomFields()
    {
        return $this->customFields;
    }

    public function getCustomSorts()
    {
        return $this->customSorts;
    }

    public function scopeGetAllInformation(Builder $query)
    {
        return $query->select('*');
    }
}
