<?php

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photocategory extends Model
{
    use HasFactory, Sluggable, Uuids;

    protected $table = 'photocategories';

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

    public function photo()
    {
        return $this->hasMany(HotelPhoto::class, 'category_id', 'id');
    }
}
