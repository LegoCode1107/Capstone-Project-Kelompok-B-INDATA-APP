<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerikananAset extends Model
{
    use HasFactory;

    protected $fillable = [

        'tahun',
        'kelompok_aset',
        'nama_aset_infrastruktur',
        'satuan_ukuran',
        'volume_jumlah'

    ];
}
