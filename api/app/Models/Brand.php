<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends BaseModel
{
    use HasFactory, UUID;

    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'discount_uuid',
        'name',
        'description',
        'logo',
        'phone_number',
        'email',
        'address',
        'status'
    ];

    protected $sortFields = [
        'name',
        'uuid',
        'description',
        'display'
    ];

    protected $filterFields = [
        'status',
        'name',
        'discount_uuid'
    ];

    protected $searchFields = [
        'name',
        'description'
    ];

    protected $stringFields = [
        'name',
        'description',
        'logo',
        'phone_number',
        'email',
        'address'
    ];

    protected $customSorts = [
        'display' => [
            [
                'sort-by' => 'status',
                'sort' => 'asc'
            ],
            [
                'sort-by' => 'name',
                'sort' => 'asc'
            ],
        ]
    ];
}
