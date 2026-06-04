<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infrastruktur;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $infrastruktur = Infrastruktur::latest()->get();

        $totalData = Infrastruktur::count();

        $totalSektor = Infrastruktur::select(
            'sektor_fasilitas'
        )->distinct()->count();

        return view(
            'dashboard',
            compact(
                'infrastruktur',
                'totalData',
                'totalSektor'
            )
        );
    }
}
