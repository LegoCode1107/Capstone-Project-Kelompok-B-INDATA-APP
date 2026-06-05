<?php

namespace App\Http\Controllers;

use App\Models\KependudukanSosial;
use App\Models\EkonomiPekerjaan;
use App\Models\Infrastruktur;
use App\Models\PerikananAset;
use App\Models\ProduksiPangan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Statistik
        $totalKependudukan = KependudukanSosial::count();
        $totalEkonomi      = EkonomiPekerjaan::count();
        $totalInfrastruktur= Infrastruktur::count();
        $totalPerikanan    = PerikananAset::count();
        $totalProduksi     = ProduksiPangan::count();

        // Data terbaru
        $kependudukan = KependudukanSosial::latest()->take(5)->get();
        $ekonomi      = EkonomiPekerjaan::latest()->take(5)->get();
        $infrastruktur= Infrastruktur::latest()->take(5)->get();
        $perikanan    = PerikananAset::latest()->take(5)->get();
        $produksi     = ProduksiPangan::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalKependudukan',
            'totalEkonomi',
            'totalInfrastruktur',
            'totalPerikanan',
            'totalProduksi',
            'kependudukan',
            'ekonomi',
            'infrastruktur',
            'perikanan',
            'produksi'
        ));
    }
}
