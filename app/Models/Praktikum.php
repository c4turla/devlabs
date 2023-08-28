<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    use HasFactory;
    protected $table = 'tb_praktikum';
    protected $primaryKey = 'id';

    protected $fillable = ['materi_id', 'judul_praktikum', 'gambar', 'simulasi','description'];

    public function materiid()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
}
