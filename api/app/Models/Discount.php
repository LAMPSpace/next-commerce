<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'type',
        'value'
    ];
}
