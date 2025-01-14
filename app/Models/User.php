<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Menambahkan role di sini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Menambahkan metode pengecekan role
    public function isAdmin()
    {
        return $this->role === 0; // Role 0 berarti admin
    }

    public function isCleaner()
    {
        return $this->role === 1; // Role 1 berarti pembersih
    }

    // (Opsional) Jika ingin membuat scope berdasarkan role
    public function scopeAdmin($query)
    {
        return $query->where('role', 0); // Role 0 berarti admin
    }

    public function scopeCleaner($query)
    {
        return $query->where('role', 1); // Role 1 berarti pembersih
    }
}
