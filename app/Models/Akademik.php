<?php

// app/Models/Akademik.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    protected $table = 'akademik';
    protected $primaryKey = 'id_akademik';

    // Tambahkan semua field yang akan diisi ke fillable
    protected $fillable = ['mulai', 'akhir', 'is_active'];

    public $timestamps = true;

    public function pembagianSpp()
    {
        return $this->hasMany(PembagianSpp::class, 'id_akademik');
    }
}
