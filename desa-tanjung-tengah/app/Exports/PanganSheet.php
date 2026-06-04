<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PanganSheet implements FromCollection, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return DB::table('produksi_pangans')
            ->select('tahun', 'sektor', 'komoditas', 'luas_ha', 'hasil_produksi', 'nilai_produksi', 'biaya_pupuk', 'biaya_bibit', 'biaya_obat', 'biaya_lainnya')
            ->orderBy('tahun', 'desc')
            ->get();
    }

    public function title(): string
    {
        return 'Produksi Pangan';
    }

    public function headings(): array
    {
        return ['Tahun', 'Sektor', 'Komoditas', 'Luas (Ha)', 'Hasil Produksi', 'Nilai Produksi', 'Biaya Pupuk', 'Biaya Bibit', 'Biaya Obat', 'Biaya Lainnya'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => 'E65100']], // Oranye/Amber
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
        ]);
        $sheet->getStyle("A1:J{$sheet->getHighestRow()}")->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['argb' => 'D9D9D9']]]
        ]);
    }
}
