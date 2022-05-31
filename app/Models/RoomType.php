<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function room_lists(){
        return $this->hasMany('App\Models\RoomList', 'room_type_id')->where('status',1);
    }
}
