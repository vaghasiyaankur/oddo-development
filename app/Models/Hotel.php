<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelPhoto;
use App\Models\City;
use App\Models\Country;
use App\Models\Amenities;
use App\Models\Wishlistable;
use App\Traits\Uuids;

class Hotel extends Model
{
    use HasFactory, Sluggable, Uuids;

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

    public function photo()
    {
        return $this->hasOne(HotelPhoto::class);
    }

    public function mainPhotoData()
    {
        return $this->photo()->where('main_photo', 1);
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
    }

    public function foodType(){
        return $this->belongsTo(FoodType::class, 'breakfast_type');
    }

    public function food_type()
    {
        $breakfast_type = explode(',',$this->breakfast_type);
        return FoodType::whereIn('id', $breakfast_type)->get();
    }

    public function facilities(){
        $facilities = explode(',',$this->facilities_id);
        return Facilities::whereIn('id', $facilities)->get();
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlistable::class, 'model_id');
    }

    public function wishlistData($modal_id){
        $user = auth()->user()->id;
        return Wishlistable::where('user_id', $user)->where('model_id', $modal_id)->select('model_id', 'user_id')->first();
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'id');
    }

    // public function hotelBooking()
    // {
    //     return $this->hasMany(HotelBooking::class, 'id');
    // }

    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class, 'hotel_id');
    }
    
    public function review()
    {
        return $this->hasMany(Review::class, 'id');
    }

    public function reviewCount($id)
    {
        // dd($data);
        return Review::where('hotel_id',$id)->count();
    }
    
    public function reviewRatings($id)
    {
        $data = listHotelRating($id);
        return $data;
    }

    public function hotelBed()
    {
        return $this->hasMany(HotelBed::class, 'id');
    }
}
