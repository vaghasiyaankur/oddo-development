<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBed extends Model
{
    use HasFactory, Uuids;

    protected $guarded = ['id'];

    /**
     * Define a relationship between the HotelBed and Room models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Room, HotelBed>
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    /**
     * Define a relationship between the HotelBed and BedType models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<BedType, HotelBed>
     */
    public function bedType()
    {
        return $this->belongsTo(BedType::class, 'bed_id');
    }
}
