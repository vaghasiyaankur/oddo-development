<?php

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BathroomItem extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'bathroom_items';

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
                'source' => 'item',
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
     * RoomBathroomItem that belongs the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Room>
     */
    public function hotel()
    {
        return $this->hasOne(Room::class);
    }
}
