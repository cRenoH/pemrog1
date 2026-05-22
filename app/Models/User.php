<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'first_name', 
    'last_name', 
    'email', 
    'phone_number', 
    'password', 
    'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function roles()
    {
    return $this->belongsToMany(Role::class );
}   
    public function is_admin(bool $isAdmin = false): bool
    {
        return $this->is_admin === $isAdmin;
    }
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(\App\Models\Addresses::class, 'user_id');
    }
}
