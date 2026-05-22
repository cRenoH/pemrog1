<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    protected $table = 'product_variants';

    /**
     * Properti $fillable dari versi Anda.
     * Ini penting untuk keamanan.
     */
    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'sale_price',
        'stock',
        'size',
        'color_name',
        'color_hex',
        'image_path',
    ];

    /**
     * Relasi product() dari versi teman Anda,
     * yang sudah kita perbaiki sebelumnya.
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * Properti $casts dari versi teman Anda.
     * Ini bagus untuk memastikan tipe data benar.
     */
    protected $casts = [
        'price' => 'integer',
        'sale_price' => 'integer',
        'stock' => 'integer',
    ];

    /** * Timestamps dari teman Anda. Biarkan false jika Anda tidak menggunakan 
     * kolom created_at dan updated_at di tabel ini.
     */
    public $timestamps = false;
}