<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PerikananAsetSheet implements FromCollection, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return DB::table('perikanan_asets')
            ->select('tahun', 'kelompok_aset', 'nama_aset_infrastruktur', 'satuan_ukuran', 'volume_jumlah')
            ->orderBy('tahun', 'desc')
            ->get();
    }

    public function title(): string
    {
        return 'Perikanan & Aset';
    }

    public function headings(): array
    {
        return ['Tahun', 'Kelompok Aset', 'Nama Aset', 'Satuan Ukuran', 'Volume Jumlah'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => '0097A7']], // Teal / Toska
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
        ]);
        $sheet->getStyle("A1:E{$sheet->getHighestRow()}")->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['argb' => 'D9D9D9']]]
        ]);
    }
}
