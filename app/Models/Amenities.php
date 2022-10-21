<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuids;

class Amenities extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'amenities';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'amenities'
            ]
        ];
    }

    public function amenitiescategory(){
        return $this->belongsTo(AmenitiesCategory::class, 'amenities_category_id');
    }

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
