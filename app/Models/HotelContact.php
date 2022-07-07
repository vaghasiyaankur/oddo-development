<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class HotelContact extends Model
{
    use HasFactory, Uuids;

    protected $fillable = ['name', 'number', 'number_optinal', 'hotel_id'];

}
