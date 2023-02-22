<?php

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'facilities';

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
                'source' => 'facilities_name',
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
        return $query->where('status', 1);
    }

    /**
     * Hotel that belongs the Facilities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Hotel>
     */
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }
}
