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
        'background_images',
        'color',
        'background_color',
        'banner',
        'content'
    ];
}
