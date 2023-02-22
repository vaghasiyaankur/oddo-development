<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlistable extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $guarded = ['id'];

    /**
     * Define a relationship between the Wishlistable and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, Wishlistable>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'model_id', 'id');
    }
}
