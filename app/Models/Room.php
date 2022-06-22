<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Roomlist(){
        return $this->belongsTo(RoomList::class, 'room_list_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

}
