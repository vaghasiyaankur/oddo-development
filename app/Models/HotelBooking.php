<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class HotelBooking extends Model
{
    use HasFactory,Uuids;

    protected $table = 'hotel_bookings';

    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function paymentGateway()
    {
        return $this->belongsTo(paymentGetways::class, 'payment_method_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
