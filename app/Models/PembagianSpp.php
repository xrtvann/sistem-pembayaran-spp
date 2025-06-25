<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembagianSpp extends Model
{
    use HasFactory;

    protected $table = 'pembagian_spp';
    protected $primaryKey = 'id_pembagian';

    protected $fillable = [
        'id_akademik',
        'id_kelas',
        'id_spp',
        'siswa_id',
    ];

    // Relasi ke Akademik
    public function akademik()
    {
        return $this->belongsTo(Akademik::class, 'id_akademik');
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // Relasi ke SPP
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    // Relasi ke Siswa (nullable)
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

   public function transaksi()
{
    return $this->hasMany(Transaksi::class, 'pembagian_id', 'id_pembagian');
}

}
