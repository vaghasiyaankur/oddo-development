<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['property_name', 'star_rating', 'street_addess', 'address_line', 'country', 'city', 'pos_code'];
}
