<?php

namespace App\Models;

use App\Models\RoomList;
use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'room_types';

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
                'source' => 'room_type',
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
     * RoomList that belongs the RoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Room>
     */
    public function room()
    {
        return $this->hasOne(Room::class);
    }

    /**
     * RoomList that belongs the RoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<RoomList>
     */
    public function roomLists()
    {
        return $this->hasMany('App\Models\RoomList', 'room_type_id')->where('status', 1);
    }

    /**
     * RoomList that belongs the RoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<RoomList>
     */
    public function roomList()
    {
        return $this->hasMany(RoomList::class);
    }
}
