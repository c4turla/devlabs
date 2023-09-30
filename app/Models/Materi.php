<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'tb_materi';
    protected $primaryKey = 'id';

    protected $fillable = ['judul', 'kelas', 'isi', 'penulis', 'gambar'];

    public function kelasid()
    {
        return $this->belongsTo(Kelas::class, 'kelas');
    }

    public function kuis()
    {
        return $this->hasMany(Kuis::class, 'materi_id');
    }

    public function praktikum()
    {
        return $this->hasMany(Praktikum::class, 'materi_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'tb_materi_user')->withPivot('skor');
    }

    public function praktikumid()
    {
        return $this->belongsTo(Praktikum::class, 'id');
    }

    public function kuisid()
    {
        return $this->belongsTo(Kuis::class, 'id');
    }
}
