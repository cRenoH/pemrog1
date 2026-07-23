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

    // Cast kolom ke tipe yang benar agar konsisten di semua environment/DB driver
    protected $casts = [
        'user_id'            => 'integer',
        'product_variant_id' => 'integer',
        'quantity'           => 'integer',
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