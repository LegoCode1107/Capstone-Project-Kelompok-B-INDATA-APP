<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MasterExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new KependudukanSheet(),
            new EkonomiSheet(),
            new PanganSheet(),
            new InfrastrukturSheet(),
            new PerikananAsetSheet(),
        ];
    }
}
