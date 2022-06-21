<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Hotel;

class Country extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'countries';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'country_name'
            ]
        ];
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function hotel(){
        return $this->hasOne(Hotel::class);
    }

}
