<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMateri extends Model
{
    use HasFactory;
    protected $table = 'tb_materi_user';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','materi_id','praktikum_id','kuis_id','skor'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class);
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
}
