<?php

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitiesCategory extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'amenities_categories';

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
                'source' => 'category',
            ],
        ];
    }

    /**
     * Amenities that belongs the AmenitiesCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Amenities>
     */
    public function amenities()
    {
        return $this->hasMany(Amenities::class)->where('status', '1');
    }

    /**
     * amenities featured details return
     *
     * @return object
     */
    public function amenitiesFeatured()
    {
        return $this->amenities()->where('featured', 1);
    }

    /**
     * @param mixed $query
     *
     * @return object
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
