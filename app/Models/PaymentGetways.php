<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGetways extends Model
{
    use HasFactory, Uuids;

    protected $table = 'payment_getways';

    protected $guarded = ['id'];

    /**
     * @param mixed $query
     *
     * @return object
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Payment that belongs the PaymentGetways
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Payment>
     */
    public function payment()
    {
        return $this->hasMany(Payment::class, 'id');
    }

    /**
     * HotelBooking that belongs the PaymentGetways
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<HotelBooking>
     */
    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class, 'id');
    }
}
