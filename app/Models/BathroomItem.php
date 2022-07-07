<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class BathroomItem extends Model
{
    use HasFactory, Uuids;
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function hotel() {
        return $this->hasOne(Room::class);
    }
}
