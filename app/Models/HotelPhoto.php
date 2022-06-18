<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class HotelPhoto extends Model
{
    use HasFactory;
    
    protected $table = 'hotel_photos';

    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
