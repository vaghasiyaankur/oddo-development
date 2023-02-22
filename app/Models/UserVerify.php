<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;

    public $table = "user_verifies";

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Define a relationship between the User and UserVerify models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, UserVerify>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
