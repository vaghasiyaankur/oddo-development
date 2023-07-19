<?php

namespace App\Models;

use App\Models\Amenities;
use App\Models\BookingNotification;
use App\Models\City;
use App\Models\Country;
use App\Models\HotelPhoto;
use App\Models\Wishlistable;
use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    use Sluggable;
    use Uuids;

    protected $table = 'hotels';

    protected $guarded = ['id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array<SomeConstants::*, mixed>
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'property_name',
            ],
        ];
    }

    /**
     * @param mixed $query
     *
     * @return object
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Define a relationship between the PropertyType and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<PropertyType, Hotel>
     */
    public function propertytype()
    {
        return $this->belongsTo(PropertyType::class, 'property_id');
    }

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return mixed
     */
    public function setFacilitiesAttribute($value)
    {
        $this->attributes['facilities'] = json_encode($value);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return mixed
     */
    public function getFacilitiesAttribute($value)
    {
        return $this->attributes['facilities'] = json_decode($value);
    }

    /**
     * HotelPhoto that belongs the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<HotelPhoto>
     */
    public function photos()
    {
        return $this->hasMany(HotelPhoto::class);
    }

    /**
     * main photo get in hotel table
     *
     * @return object
     */
    public function mainPhoto()
    {
        return $this->photos()->where('main_photo', 1);
    }

    /**
     * HotelPhoto that belongs the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<HotelPhoto>
     */
    public function photo()
    {
        return $this->hasOne(HotelPhoto::class);
    }

    /**
     * main photo get in hotel table
     *
     * @return object
     */
    public function mainPhotoData()
    {
        return $this->photo()->where('main_photo', 1);
    }

    /**
     * Define a relationship between the City and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<City, Hotel>
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Define a relationship between the Country and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Country, Hotel>
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Room that belongs the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Room>
     */
    public function room()
    {
        return $this->hasOne(Room::class);
    }

    /**
     * get amenity data
     *
     * @return object
     */
    public function amenity()
    {
        $amenity_id = explode(',', $this->amenity_id);
        return Amenities::whereIn('id', $amenity_id)->get();
    }

    /**
     * Define a relationship between the FoodType and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<FoodType, Hotel>
     */
    public function foodType()
    {
        return $this->belongsTo(FoodType::class, 'breakfast_type');
    }

    /**
     * get food type data
     *
     * @return object
     */
    public function foodTypes()
    {
        $breakfast_type = explode(',', $this->breakfast_type);
        return FoodType::whereIn('id', $breakfast_type)->get();
    }

    /**
     * get facilities data
     *
     * @return object
     */
    public function facilities()
    {
        $facilities = explode(',', $this->facilities_id);
        return Facilities::whereIn('id', $facilities)->get();
    }

    /**
     * Wishlistable that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Wishlistable>
     */
    public function wishlist()
    {
        return $this->hasMany(Wishlistable::class, 'model_id');
    }

    /**
     * get wishlist data
     *
     * @param int $modal_id
     *
     * @return object
     */
    public function wishlistData($modal_id)
    {
        $user = auth()->user()->id;
        return Wishlistable::where('user_id', $user)->where('model_id', $modal_id)
            ->select('model_id', 'user_id')->first();
    }

    /**
     * Payment that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Payment>
     */
    public function payment()
    {
        return $this->hasMany(Payment::class, 'id');
    }

    // public function hotelBooking()
    // {
    //     return $this->hasMany(HotelBooking::class, 'id');
    // }

    /**
     * HotelBooking that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<HotelBooking>
     */
    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class, 'hotel_id');
    }

    /**
     * Review that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Review>
     */
    public function review()
    {
        return $this->hasMany(Review::class, 'id');
    }

    /**
     * @param int $id
     *
     * @return int $review
     */
    public function reviewCount($id)
    {
        // dd($data);
        $review = Review::where('hotel_id', $id)->count();
        return $review;
    }

    /**
     * @param int $id
     *
     * @return object $data
     */
    public function reviewRatings($id)
    {
        $data = listHotelRating($id);
        return $data;
    }

    /**
     * @param int $id
     *
     * @return object $data
     */
    public function listHotelRating($id)
    {
        $data = listHotelRating($id);
        return $data['rating'];
    }

    /**
     * HotelBed that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<HotelBed>
     */
    public function hotelBed()
    {
        return $this->hasMany(HotelBed::class, 'id');
    }

    /**
     * Define a relationship between the Amenities and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Amenities, Hotel>
     */
    public function amenities()
    {
        return $this->belongsTo(Amenities::class, 'amenity_id');
    }

    /**
     * BookingNotification that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<BookingNotification>
     */
    public function notification()
    {
        return $this->hasMany(BookingNotification::class, 'hotel_id');
    }

    /**
     * Review that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Review>
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'hotel_id');
    }
}
