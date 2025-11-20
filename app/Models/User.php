<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'level',
        'grup',
        'skpd',
        'terakhir_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getGrupUraianAttribute()
    {
        if ($this->grup == 1) {
            return 'BKAD';
        } else if ($this->grup == 2) {
            return 'BKPSDM';
        } else if ($this->grup == 3) {
            return 'DISDIK';
        } else if ($this->grup == 4) {
            return 'SKLH';
        } else if ($this->grup == 5) {
            return 'DINKES';
        } else if ($this->grup == 6) {
            return 'PKM';
        }
    }
    public function getRoleAttribute()
    {
        if ($this->level == 1) {
            return 'User';
        } else if ($this->level == 2) {
            return 'Supervisor';
        } else if ($this->level == 3) {
            return 'Administrator';
        }
    }
    public function skpd_uraian()
    {
        return $this->belongsTo(RefSkpd::class, 'skpd', 'kdskpd');
    }
}
