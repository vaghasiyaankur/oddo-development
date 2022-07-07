<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuids;

class AmenitiesCategory extends Model
{
    use HasFactory, Sluggable, Uuids;
    
    protected $table = 'amenities_categories';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'category'
            ]
        ];
    }

    public function amenities(){
        return $this->hasMany(Amenities::class)->where('status', '1');
    }

    public function amenitiesFeatured(){
        return $this->amenities()->where('featured',1);
    }
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

}
