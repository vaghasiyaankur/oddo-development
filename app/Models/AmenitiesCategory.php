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
        return $this->hasMany(Amenities::class, 'amenities_category_id', 'id')->where('status', '1');
    }
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

}
