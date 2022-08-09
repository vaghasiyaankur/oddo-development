<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    protected $fillable = ['host_name','port_name','encryption','username','password','from_email','from_name'];

}
