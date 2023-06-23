<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'icon',
        'description',
        'level',
    ];

    protected $sortFields = [
        'name',
        'id',
        'description',
        'display'
    ];

    protected $filterFields = [
        'level',
        'name',
        'parent_id'
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
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function allChildren()
    {
        return $this->childrenCategories()->with(['allChildren' => function ($query) {
            return $query->orderBy('id');
        }]);
    }
}
