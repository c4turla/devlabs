<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'sort_order', 'description'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kurikulum');
    }
}
