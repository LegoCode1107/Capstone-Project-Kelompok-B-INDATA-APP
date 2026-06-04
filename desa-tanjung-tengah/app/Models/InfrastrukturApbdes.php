<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastrukturApbdes extends Model
{
    use HasFactory;

    protected $table = 'infrastrukturs';

    protected $fillable = [
        'tahun',
        'sektor_fasilitas',
        'fasilitas',
        'indikator_infrastruktur',
        'satuan',
        'nilai_kuantitatif',
        'nilai_kualitatif',
    ];
}
