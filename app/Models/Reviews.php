<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = "reviews"; // Nama tabel yang sesuai di database

    // Definisikan relasi dengan model Product jika diperlukan
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo('App\\Models\\User', 'user_id');
    }
}
