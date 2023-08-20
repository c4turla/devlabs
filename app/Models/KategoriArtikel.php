<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori_artikel';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'enabled'];
}
