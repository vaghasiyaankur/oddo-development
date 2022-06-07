<?php

namespace Modules\UserSite\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelPhoto extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\UserSite\Database\factories\HotelPhotoFactory::new();
    }
}
