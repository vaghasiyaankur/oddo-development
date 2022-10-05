<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Pages extends Model
{
    use HasFactory,Uuids;

    protected $table = 'pages';

    protected $guarded = ['id'];
}
