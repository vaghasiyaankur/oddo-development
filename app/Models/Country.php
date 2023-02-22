<?php

namespace App\Models;

use App\Models\City;
use App\Models\Hotel;
use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'countries';

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
                'source' => 'country_name',
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
     * City that belongs the Country
     *
     * @return HasMany<City>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    /**
     *  Hotel that belongs the Country
     *
     * @return HasOne<Hotel>
     */
    public function hotel(): HasOne
    {
        return $this->hasOne(Hotel::class);
    }
}
