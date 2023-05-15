<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends BaseModel
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
}
