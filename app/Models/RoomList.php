<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class RoomList extends Model
{
    use HasFactory,Sluggable;
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'room_name'
            ]
        ];
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }
    
    public function room(){
        return $this->hasOne(Room::class);
    }

}
