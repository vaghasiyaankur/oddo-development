<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;
use App\Traits\Uuids;

class RoomList extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $guarded = ['id'];
    
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

    public function room_type(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }


}
