<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentGetways extends Model
{
    use HasFactory;

    protected $table = 'payment_getways';

    protected $guarded = ['id'];
}
