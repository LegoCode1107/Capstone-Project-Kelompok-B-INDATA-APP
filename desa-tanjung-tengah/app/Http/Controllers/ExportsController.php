<?php

namespace App\Http\Controllers;

use App\Exports\MasterExport;
use App\Exports\MasterSektorExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function exportSemuaSektor()
    {
        $namaFile = 'Master_Data_Capstone_All_Sectors_' . date('Y-m-d') . '.xlsx';

        // Memanggil MasterSektorExport yang menggunakan Event Generator langsung
        return Excel::download(new MasterExport, $namaFile);
    }
}
