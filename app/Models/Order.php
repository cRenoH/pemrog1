<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_number',
        'subtotal',
        'shipping_cost',
        'discount_amount',
        'total_amount',
        'shipping_address',
        'payment_method',
        'status',
        'payment_due_at',
        'payment_token',
        'courier',
        'resi',
    ];

    // Cast tipe data agar konsisten di semua environment (lokal & server hosting)
    protected $casts = [
        'user_id'         => 'integer',
        'subtotal'        => 'integer',
        'shipping_cost'   => 'integer',
        'discount_amount' => 'integer',
        'total_amount'    => 'integer',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderReturns()
    {
        return $this->hasMany(\App\Models\OrderReturn::class, 'order_id');
    }
}
