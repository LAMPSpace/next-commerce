<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeSetting extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'background_image',
        'color',
        'background_color',
        'banner',
        'content'
    ];

    protected $sortFields = [
        'name',
        'start_date',
        'end_date'
    ];

    protected $filterFields = [];

    protected $searchFields = [
        'name',
        'description'
    ];

    protected $stringFields = [
        'name',
        'description',
        'background_image',
        'color',
        'background_color',
        'banner',
        'content'
    ];
}
