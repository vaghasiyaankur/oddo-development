<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    use HasFactory, Uuids;
    protected $guarded = [];

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
     * Hotel that belongs the FoodType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Hotel>
     */
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }
}
