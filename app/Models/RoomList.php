<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomList extends Model
{
    use HasFactory;

    public function scopeActive($query) {
        return $query->where('status', 1);
    }
    
    public function room(){
        return $this->hasMany(Room::class, 'room_type_id', 'id');
    }
}
