<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuids;

class BathroomItem extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'bathroom_items';

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'item'
            ]
        ];
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function hotel() {
        return $this->hasOne(Room::class);
    }
}
