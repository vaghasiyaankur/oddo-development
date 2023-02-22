<?php

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'amenities';

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
                'source' => 'amenities',
            ],
        ];
    }

    /**
     * Define a relationship between the Amenities and AmenitiesCategory models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<AmenitiesCategory, Amenities>
     */
    public function amenitiescategory()
    {
        return $this->belongsTo(AmenitiesCategory::class, 'amenities_category_id');
    }

    /**
     * Hotel that belongs the Amenities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Hotel>
     */
    public function hotel()
    {
        return $this->hasMany(Hotel::class);
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
