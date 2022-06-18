<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class City extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'cities';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
