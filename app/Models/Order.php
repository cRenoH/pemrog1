<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $table = 'orders';
    use HasFactory; // <-- 3. Gunakan trait di dalam class

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendefinisikan bahwa sebuah pesanan memiliki banyak item.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderReturns()
    {
        return $this->hasMany(\App\Models\OrderReturn::class, 'order_id');
    }

}
