<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'tb_artikel';
    protected $primaryKey = 'id';

    protected $fillable = ['judul', 'kategori_id', 'deskripsi', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_id');
    }
}
