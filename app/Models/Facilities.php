<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'facilities';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'facilities_name'
            ]
        ];
    }
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function hotel(){
        return $this->hasOne(Hotel::class);
    }
}
