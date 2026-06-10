<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infrastruktur;
use App\Models\EkonomiPekerjaan;
use App\Models\KependudukanSosial;
use App\Models\ProduksiPangan;
use App\Models\PerikananAset;
use App\Models\InfrastrukturApbdes;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Infrastruktur
        $totalInfrastruktur = Infrastruktur::count();

        // Kependudukan
        $totalKependudukan = KependudukanSosial::count();

        // Ekonomi
        $totalEkonomi = EkonomiPekerjaan::count();

        // Produksi Pangan
        $totalPangan = ProduksiPangan::count();

        // Perikanan
        $totalPerikanan = PerikananAset::count();

        // APBDes
        $totalApbdes = InfrastrukturApbdes::count();

        // User
        $totalUser = User::count();

        // Total seluruh data
        $totalData =
            $totalInfrastruktur +
            $totalKependudukan +
            $totalEkonomi +
            $totalPangan +
            $totalPerikanan +
            $totalApbdes;

        $grandTotalData =
        $totalInfrastruktur +
        $totalKependudukan +
        $totalEkonomi +
        $totalPangan +
        $totalPerikanan;

        return view('dashboard', compact(
            'totalData',
            'totalInfrastruktur',
            'totalKependudukan',
            'totalEkonomi',
            'totalPangan',
            'totalPerikanan',
            'totalApbdes',
            'grandTotalData',
            'totalUser'
        ));
    }
}
