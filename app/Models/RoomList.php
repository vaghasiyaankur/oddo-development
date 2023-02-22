<?php

namespace App\Models;

use App\Models\RoomType;
use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomList extends Model
{
    use HasFactory, Sluggable, Uuids;

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
                'source' => 'room_name',
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
     * Room that belongs the RoomList
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Room>
     */
    public function room()
    {
        return $this->hasOne(Room::class);
    }

    /**
     * Define a relationship between the RoomType and RoomList models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<RoomType, RoomList>
     */
    public function roomTypes()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
