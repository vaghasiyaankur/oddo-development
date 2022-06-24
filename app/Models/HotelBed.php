<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBed extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bedType(){
        return $this->belongsTo(BedType::class, 'bed_id');
    }
}
