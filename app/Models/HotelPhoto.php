<?php

namespace App\Models;

use App\Models\Hotel;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPhoto extends Model
{

    use HasFactory, Uuids;

    protected $table = 'hotel_photos';

    protected $guarded = ['id'];

    /**
     * Define a relationship between the HotelPhoto and Hotel models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, HotelPhoto>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    /**
     * Define a relationship between the Photocategory and HotelPhoto models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Photocategory, HotelPhoto>
     */
    public function category()
    {
        return $this->belongsTo(Photocategory::class, 'category_id');
    }
}
