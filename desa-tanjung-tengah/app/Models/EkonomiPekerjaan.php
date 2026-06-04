<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkonomiPekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'kategori_sektor',
        'jenis_pekerjaan',
        'laki_laki',
        'perempuan',
        'total',
    ];
}
