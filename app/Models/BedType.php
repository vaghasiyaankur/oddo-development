<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class BedType extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'bed_types';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'bed_type'
            ]
        ];
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function hotelBed(){
        return $this->hasOne(HotelBed::class);
    }
}
