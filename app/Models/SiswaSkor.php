<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaSkor extends Model
{
    use HasFactory;
    protected $table = 'tb_siswa_skor';
    protected $primaryKey = 'id';
    protected $fillable = ['id_siswa', 'id_materi', 'skor', 'recorded_on'];

    public function siswaid()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function materiid()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }
}
