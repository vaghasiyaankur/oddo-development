<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class HotelBed extends Model
{
    use HasFactory, Uuids;

    protected $guarded = ['id'];

    public function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bedType(){
        return $this->belongsTo(BedType::class, 'bed_id');
    }
}
