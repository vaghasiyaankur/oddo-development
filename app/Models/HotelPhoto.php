<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Traits\Uuids;

class HotelPhoto extends Model
{
    
    use HasFactory, Uuids;
    
    protected $table = 'hotel_photos';

    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
