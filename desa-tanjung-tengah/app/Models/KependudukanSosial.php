<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KependudukanSosial extends Model
{
    use HasFactory;
        protected $fillable = [
        'tahun',
        'kategori',
        'indikator',
        'laki_laki',
        'perempuan',
        'total'
    ];
}
