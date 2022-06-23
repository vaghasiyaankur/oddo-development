<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitiesCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'amenities_categories';

    protected $fillable = [
        'id',
        'category',
        'status'
    ];

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
