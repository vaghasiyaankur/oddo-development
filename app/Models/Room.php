<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, Uuids;
    protected $guarded = ['id'];

    /**
     * Define a relationship between the RoomList and Room models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<RoomList, Room>
     */
    public function roomlist()
    {
        return $this->belongsTo(RoomList::class, 'room_list_id');
    }

    /**
     * Define a relationship between the RoomType and Room models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<RoomType, Room>
     */
    public function roomtype()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    /**
     * Define a relationship between the Hotel and Room models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, Room>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    /**
     * HotelBed that belongs the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<HotelBed>
     */
    public function bed()
    {
        return $this->hasOne(HotelBed::class);
    }

    /**
     * bathroom Data get
     * @return object $BathroomItems
     */
    public function bathroom()
    {
        $bathroom = explode(',', $this->bathroom_item);
        $BathroomItems = BathroomItem::whereIn('id', $bathroom)->get();
        return $BathroomItems;
    }

    /**
     * HotelBooking that belongs the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<HotelBooking>
     */
    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class, 'id');
    }

    /**
     * Review that belongs the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Review>
     */
    public function review()
    {
        return $this->hasMany(Review::class, 'id');
    }
}
