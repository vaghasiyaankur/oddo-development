<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortCodeMailTemplate extends Model
{
    use HasFactory;

    protected $table = 'short_code_mail_templates';

    protected $guarded = ['id'];
}
