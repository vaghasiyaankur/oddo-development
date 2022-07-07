<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Room extends Model
{
    use HasFactory, Uuids;
    protected $guarded = ['id'];

    public function roomlist(){
        return $this->belongsTo(RoomList::class, 'room_list_id');
    }

    public function roomtype(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function bed(){
        return $this->hasOne(HotelBed::class);
    }

    public function bathroom(){
        $bathroom = explode(',',$this->bathroom_item);
        return BathroomItem::whereIn('id', $bathroom)->get();
    }

}
