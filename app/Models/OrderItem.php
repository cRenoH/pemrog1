<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items'; // Nama tabel yang sesuai di database

    protected $fillable = [
        'order_id',
        'variant_id',
        'quantity',
        'price',
    ];

    public $timestamps = false; // T
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Mendefinisikan bahwa sebuah item pesanan merujuk ke satu varian produk.
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariants::class, 'variant_id');
    }

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Mendefinisikan bahwa sebuah item pesanan merujuk ke satu varian produk.
     */
    
}
