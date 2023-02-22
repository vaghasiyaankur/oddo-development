<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Uuids
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->UUID = random_int(10000000, 99999999);
        });
    }
}
