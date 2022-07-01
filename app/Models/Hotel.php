<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelPhoto;
use App\Models\City;
use App\Models\Country;
use App\Models\amenities;

class Hotel extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'hotels';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'property_name'
            ]
        ];
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }
    
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
        return $this->photos()->where('main_photo', 1);
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function room(){
        return $this->hasOne(Room::class);
    }

    public function amenity(){
        $amenity_id = explode(',',$this->amenity_id);
        return Amenities::whereIn('id', $amenity_id)->get();
        // return $this->belongsTo(amenities::class, 'amenity_id');
    }

    public function foodType(){
        return $this->belongsTo(FoodType::class, 'breakfast_type');
    }

    public function facilities(){
        $facilities = explode(',',$this->facilities_id);
        return Facilities::whereIn('id', $facilities)->get();
    }

}
