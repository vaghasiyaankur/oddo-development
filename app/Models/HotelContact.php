<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class HotelContact extends Model
{
    protected $table = 'hotel_contacts';

    use HasFactory, Uuids;
    
    protected $guarded = ['id'];
}
