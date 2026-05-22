<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $table = 'addresses'; // Nama tabel yang sesuai di database
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'address_name',
        'full_address',
        'city',
        'province',
        'postal_code',
        'is_default',
        // 'created_at',
        // 'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
