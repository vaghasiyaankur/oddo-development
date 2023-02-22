<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Hotel;
use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'cities';

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
                'source' => 'name',
            ],
        ];
    }

    /**
     * Define a relationship between the City and Country models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Country, City>
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * City that belongs the Hotel
     *
     * @return HasOne<Hotel>
     */
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
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
}
