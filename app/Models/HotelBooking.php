<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory, Uuids;

    protected $table = 'hotel_bookings';

    protected $guarded = ['id'];

    /**
     * Define a relationship between the HotelBed and BedType models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, HotelBooking>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    // public function hotel()
    // {
    //     return $this->belongsTo(Hotel::class, 'id');
    // }

    /**
     * Define a relationship between the PaymentGetways and HotelBooking models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<PaymentGetways, HotelBooking>
     */
    public function paymentGateway()
    {
        return $this->belongsTo(PaymentGetways::class, 'payment_method_id', 'id');
    }

    /**
     * Define a relationship between the HotelBooking and User models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, HotelBooking>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @param mixed $id
     *
     * @return object $user
     */
    public function hotelBookingUser($id)
    {
        $user = User::whereId($id)->first();
        return $user;
    }

    /**
     * Define a relationship between the HotelBooking and Room models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Room, HotelBooking>
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
