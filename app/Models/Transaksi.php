<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'siswa_id',
        'id_pembagian',
        'jumlah_tagihan',
        'total_bayar',
        'sisa',
        'status',
        'tanggal_bayar',
        'bukti_pembayaran'
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    // Relasi ke pembagian spp
    public function pembagian()
    {
        return $this->belongsTo(PembagianSpp::class, 'id_pembagian');
    }
}
