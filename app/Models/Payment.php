<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $guarded = ['id'];

    /**
     * Define a relationship between the PaymentGetways and Payment models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<PaymentGetways, Payment>
     */
    public function paymentGateway()
    {
        return $this->belongsTo(PaymentGetways::class, 'payment_method_id', 'id');
    }

    /**
     * Define a relationship between the Hotel and Payment models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Hotel, Payment>
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    /**
     * Define a relationship between the User and Payment models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Payment>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
