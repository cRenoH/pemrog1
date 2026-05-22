<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'user_id',
        'product_variant_id',
        'quantity',
    ];

    // Definisikan relasi ke ProductVariants
    public function productVariant()
    {
        return $this->belongsTo(ProductVariants::class, 'product_variant_id');
    }

    public function ProductImage()
    {
        return $this->belongsTo(ProductImages::class, 'product_image_id');
    }
}