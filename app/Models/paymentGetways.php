<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class paymentGetways extends Model
{
    use HasFactory, Uuids;

    protected $table = 'payment_getways';

    protected $guarded = ['id'];

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'id');
    }

    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class, 'id');
    }
    
}
