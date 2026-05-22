<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "wishlist"; // Nama tabel yang sesuai di database
    protected $fillable = ['user_id', 'product_id'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(\App\Models\Products::class, 'product_id');
    }
}
