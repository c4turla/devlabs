<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;
    protected $table = 'tb_kuis';
    protected $primaryKey = 'id';

    protected $fillable = ['materi_id', 'soal', 'gambar_soal', 'jawaban_benar', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e','skor'];

    public function materiid()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
}
