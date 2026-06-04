<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiPangan extends Model
{
    use HasFactory;

    protected $fillable = [

        'tahun',
        'sektor',
        'komoditas',
        'luas_ha',
        'hasil_produksi',
        'nilai_produksi',
        'biaya_pupuk',
        'biaya_bibit',
        'biaya_obat',
        'biaya_lainnya',

    ];
}
