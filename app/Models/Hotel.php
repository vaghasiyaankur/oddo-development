<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['property_name', 'star_rating', 'street_addess', 'address_line', 'country', 'city', 'pos_code', 'parking_available', 'reservation', 'parking_site', 'parking_type', 'price_parking', 'price_parking', 'breakfast', 'breakfast_price', 'breakfast_type', 'language', 'facilities', 'extra_bed', 'number_extra_bed', 'guest_extra_bed','amenity_id'];

    public function setFacilitiesAttribute($value)
    {
        $this->attributes['facilities'] = json_encode($value);
    }

    public function getFacilitiesAttribute($value)
    {
        return $this->facilities['facilities'] = json_decode($value);
    }
}
