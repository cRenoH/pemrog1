<?php

namespace App\Models;
use illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles"; // Nama tabel yang sesuai di 
    protected $fillable = [
        'name',
    ] ;
    
    public $timestamps = false;

    // Definisikan relasi dengan model User jika diperlukan
   public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
