<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBed extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'no_of_bed', 'bed_id', 'room_id'];
}
