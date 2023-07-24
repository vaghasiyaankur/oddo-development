<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class HotelPrice extends Model
{
    use HasFactory;

    /**
     * Define a relationship between the HotelBooking and Room models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Room, HotelBooking>
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'hotel_id', 'id');
    }
}
