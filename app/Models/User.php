<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LamaLama\Wishlist\HasWishlists;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasWishlists;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'google_id',
        'facebook_id',
        'twitter_id',
        'last_name',
        'is_email_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<string, never>
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get:fn($value) => ["user", "admin"][$value],
        );
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

    /**
     * HotelBooking that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<HotelBooking>
     */
    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class, 'id');
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
}
