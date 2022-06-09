<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BathroomItem extends Model
{
    use HasFactory;
    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
