<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\RoomList;

class RoomType extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'room_types';

    protected $guarded = ['id'];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'room_type'
            ]
        ];
    }
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function room(){
        return $this->hasOne(Room::class);
    }

    public function room_lists(){
        return $this->hasMany('App\Models\RoomList', 'room_type_id')->where('status',1);
    }

    public function room_list(){
        return $this->hasMany(RoomList::class);
    }
}
