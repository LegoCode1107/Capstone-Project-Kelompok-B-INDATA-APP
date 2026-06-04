<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InfrastrukturSheet implements FromCollection, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return DB::table('infrastrukturs')
            ->select('tahun', 'sektor_fasilitas', 'indikator_infrastruktur', 'satuan', 'nilai_kuantitatif', 'nilai_kualitatif')
            ->orderBy('tahun', 'desc')
            ->get();
    }

    public function title(): string
    {
        return 'Infrastruktur & APBDES';
    }

    public function headings(): array
    {
        return ['Tahun', 'Sektor Fasilitas', 'Indikator Infrastruktur', 'Satuan', 'Nilai Kuantitatif', 'Nilai Kualitatif'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => '7B1FA2']], // Ungu
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
        ]);
        $sheet->getStyle("A1:F{$sheet->getHighestRow()}")->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['argb' => 'D9D9D9']]]
        ]);
    }
}
