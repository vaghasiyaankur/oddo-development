<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class Wishlistable extends Model
{
    use HasFactory;
    
    protected $table = 'wishlist';

    protected $guarded = ['id'];

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'model_id', 'id');
    }

}
