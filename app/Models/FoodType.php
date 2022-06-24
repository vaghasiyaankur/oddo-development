<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function hotel(){
        return $this->hasOne(Hotel::class);
    }

    

}
