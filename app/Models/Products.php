<?php

namespace App\Models;

// Menggabungkan semua 'use' statement yang diperlukan
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'products';

    /**
     * Kolom yang boleh diisi (dari versi Anda).
     */
    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'description',
        'status',
        'meta_title',
        'meta_description',
        'shipping_info',
    ];

    /**
     * Semua fungsi relasi digabungkan.
     */
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImages::class, 'product_id')->where('is_primary', 1);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'product_id');
    }

    /**
     * Accessor untuk rating (dari versi teman Anda).
     */
    public function getRatingAttribute()
    {
        return $this->reviews()->where('status', 'Approved')->avg('rating');
    }

    /**
     * Casts untuk tipe data (dari versi teman Anda).
     */
    protected $casts = [
        'date' => 'date',
        'price' => 'integer',
    ];
}