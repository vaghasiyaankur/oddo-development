<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelPhoto;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = ['property_name', 'star_rating', 'street_addess', 'address_line', 'country', 'city', 'pos_code', 'parking_available', 'reservation', 'parking_site', 'parking_type', 'price_parking', 'price_parking', 'breakfast', 'breakfast_price', 'breakfast_type', 'language', 'facilities', 'extra_bed', 'number_extra_bed', 'guest_extra_bed','amenity_id', 'pay_type', 'cancel_booking', 'check_in', 'check_out', 'property_id', 'bathroom_private', 'bathroom_item'];

    public function propertytype()
    {
        return $this->belongsTo(PropertyType::class, 'property_id');
    }

    public function setFacilitiesAttribute($value)
    {
        $this->attributes['facilities'] = json_encode($value);
    }

    public function getFacilitiesAttribute($value)
    {
        return $this->facilities['facilities'] = json_decode($value);
    }

    public function photos()
    {
        return $this->hasMany(HotelPhoto::class);
    }   

    public function mainPhoto()
    {
        // return $this->facilities['facilities'] = json_decode($value);
        return $this->photos()->where('main_photo', 1);
    }

}
