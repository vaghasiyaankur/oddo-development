<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, Uuids;

    protected $table = 'reviews';

    protected $guarded = ['id'];

    /**
     * Define a relationship between the Hotel and Review models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, Review>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    /**
     * Define a relationship between the User and Review models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Review>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define a relationship between the Room and Review models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Room, Review>
     */
    public function roomData()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
