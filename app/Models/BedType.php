<?php

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'bed_types';

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
                'source' => 'bed_type',
            ],
        ];
    }

    /**
     * @param mixed $query
     *
     * @return object $query
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * BedType that belongs the HotelBed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<HotelBed>
     */
    public function hotelBed()
    {
        return $this->hasOne(HotelBed::class);
    }
}
