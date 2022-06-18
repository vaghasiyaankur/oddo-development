<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelContact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number', 'number_optinal', 'hotel_id'];

}
