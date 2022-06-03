<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'smoking_policy', 'custom_name_room', 'number_of_room', 'number_of_bed', 'guest_stay_room', 'room_size', 'room_cal_type', 'price_room', 'room_list_id', 'bed_type_id', 'room_type_id', 'hotel_id'];

    public function Roomlist(){
        return $this->belongsTo(RoomList::class, 'room_type_id');
    }

}
