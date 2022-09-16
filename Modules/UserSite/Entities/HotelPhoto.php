<?php

namespace Modules\UserSite\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;

class HotelPhoto extends Model
{
    use HasFactory, Uuids;
    
    protected $table = 'hotel_photos';

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\UserSite\Database\factories\HotelPhotoFactory::new();
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
