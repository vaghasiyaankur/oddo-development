<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'amenities';

    protected $fillable = [
        'id',
        'amenities_category_id',
        'amenities',
        'status'
    ];

    public function amenitiescategory(){
        return $this->belongsTo(AmenitiesCategory::class, 'amenities_category_id');
    }
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
