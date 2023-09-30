<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaJawaban extends Model
{
    use HasFactory;
    protected $table = 'tb_siswa_jawaban';
    protected $primaryKey = 'id';
    protected $fillable = ['id_siswa', 'id_materi', 'id_soal', 'jawaban_siswa'];

    public function siswaid()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function materiid()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }

    public function soalid()
    {
        return $this->belongsTo(Kuis::class, 'id_soal');
    }
}
