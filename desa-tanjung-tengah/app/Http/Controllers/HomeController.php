<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infrastruktur;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
