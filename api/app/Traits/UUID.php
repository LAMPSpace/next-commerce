<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UUID
{
    /** * Boot function from Laravel. */ protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    /** * Get the value indicating whether the IDs are incrementing. */ public function getIncrementing(): bool
    {
        return false;
    }
    /** * Get the auto-incrementing key type. */ public function getKeyType(): string
    {
        return 'string';
    }
}
