<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    protected $fillable = ['nominal'];
    public $timestamps = true;

    public function pembagianSpp()
    {
        return $this->hasMany(PembagianSpp::class, 'id_spp');
    }
}
