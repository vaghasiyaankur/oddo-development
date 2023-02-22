<?php

namespace App\Models;

use App\Models\Hotel;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingNotification extends Model
{
    use HasFactory, Uuids;

    protected $table = 'booking_notifications';

    protected $guarded = ['id'];

    /**
     * Define a relationship between the Hotel and BookingNotification models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, BookingNotification>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
}
