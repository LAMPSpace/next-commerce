<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseModel
{
    use HasFactory, UUID;

    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_uuid',
        'name',
        'icon',
        'description',
        'level',
    ];

    protected $sortFields = [
        'name',
        'uuid',
        'description',
        'display'
    ];

    protected $filterFields = [
        'level',
        'name',
        'parent_uuid'
    ];

    protected $searchFields = [
        'name',
        'description'
    ];

    protected $stringFields = [
        'name',
        'description'
    ];

    protected $customSorts = [
        'display' => [
            [
                'sort-by' => 'level',
                'sort' => 'asc'
            ],
            [
                'sort-by' => 'name',
                'sort' => 'desc'
            ],
        ]
    ];

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_uuid');
    }

    public function allChildren()
    {
        return $this->childrenCategories()->with(['allChildren' => function ($query) {
            return $query->orderBy('uuid');
        }]);
    }
}
