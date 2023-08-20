<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'tb_materi';
    protected $primaryKey = 'id';

    protected $fillable = ['judul', 'kelas', 'isi', 'penulis'];

    public function kelasid()
    {
        return $this->belongsTo(Kelas::class, 'kelas');
    }
}
