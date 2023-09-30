<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $table = 'tb_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['name', 'email', 'password', 'level', 'nomor_hp', 'photo', 'kelas', 'alamat'];

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
    ];

    public function materi()
    {
        return $this->belongsToMany(Materi::class, 'tb_materi_user', 'user_id', 'materi_id')
            ->withPivot('skor');
    }

    public function siswaSkor()
    {
        return $this->hasMany(SiswaSkor::class, 'id_siswa');
    }
}
