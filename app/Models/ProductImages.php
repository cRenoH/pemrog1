<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = "product_images";

    /**
     * The attributes that are mass assignable.
     * Ini adalah daftar kolom yang boleh diisi menggunakan metode create().
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'image_path',
        'is_primary',
    ];
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * Menandakan bahwa model ini tidak menggunakan timestamps (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;
}
