<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = "subscribers"; // Nama tabel yang sesuai di database

    // Definisikan relasi dengan model User jika diperlukan
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
