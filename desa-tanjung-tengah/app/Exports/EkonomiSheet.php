<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EkonomiSheet implements FromCollection, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return DB::table('ekonomi_pekerjaans')
            ->select('tahun', 'kategori_sektor', 'jenis_pekerjaan', 'laki_laki', 'perempuan', 'total')
            ->orderBy('tahun', 'desc')
            ->get();
    }

    public function title(): string
    {
        return 'Ekonomi & Pekerjaan';
    }

    public function headings(): array
    {
        return ['Tahun', 'Kategori Sektor', 'Jenis Pekerjaan Status', 'Laki-laki', 'Perempuan', 'Total'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => '2E7D32']], // Hijau
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
        ]);
        $sheet->getStyle("A1:F{$sheet->getHighestRow()}")->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['argb' => 'D9D9D9']]]
        ]);
    }
}
