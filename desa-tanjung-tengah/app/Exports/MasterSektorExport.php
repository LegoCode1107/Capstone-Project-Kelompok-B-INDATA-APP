<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;

class MasterSektorExport implements WithEvents
{
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                // Mengambil object PHPSpreadsheet utama
                $spreadsheet = $event->getDelegate();

                // --- SHEET 1: KEPENDUDUKAN & SOSIAL ---
                $sheet1 = $spreadsheet->getActiveSheet();
                $sheet1->setTitle('Kependudukan & Sosial');
                $this->isiDataSheet($sheet1, 'kependudukan_dan_sosial',
                    ['Tahun', 'Kategori', 'Indikator', 'Laki-Laki', 'Perempuan', 'Total'],
                    ['tahun', 'kategori', 'indikator', 'laki_laki', 'perempuan', 'total']
                );

                // --- SHEET 2: EKONOMI & PEKERJAAN ---
                $sheet2 = $spreadsheet->createSheet();
                $sheet2->setTitle('Ekonomi & Pekerjaan');
                $this->isiDataSheet($sheet2, 'ekonomi_dan_pekerjaan',
                    ['Tahun', 'Kategori Sektor', 'Jenis Pekerjaan', 'Laki-Laki', 'Perempuan', 'Total'],
                    ['tahun', 'kategori_sektor', 'jenis_pekerjaan', 'laki_laki', 'perempuan', 'total']
                );

                // --- SHEET 3: PRODUKSI PANGAN ---
                $sheet3 = $spreadsheet->createSheet();
                $sheet3->setTitle('Produksi Pangan');
                $this->isiDataSheet($sheet3, 'produksi_pangan',
                    ['Tahun', 'Sektor', 'Komoditas', 'Luas (Ha)', 'Hasil Produksi', 'Nilai Produksi', 'Biaya Pupuk', 'Biaya Bibit', 'Biaya Obat', 'Biaya Lainnya'],
                    ['tahun', 'sektor', 'komoditas', 'luas_ha', 'hasil_produksi', 'nilai_produksi', 'biaya_pupuk', 'biaya_bibit', 'biaya_obat', 'biaya_lainnya']
                );

                // --- SHEET 4: INFRASTRUKTUR & APBDES ---
                $sheet4 = $spreadsheet->createSheet();
                $sheet4->setTitle('Infrastruktur & APBDES');
                $this->isiDataSheet($sheet4, 'infrastruktur_apbdes',
                    ['Tahun', 'Sektor Fasilitas', 'Indikator Infrastruktur', 'Satuan', 'Nilai Kuantitatif', 'Nilai Kualitatif'],
                    ['tahun', 'sektor_fasilitas', 'indikator_infrastruktur', 'satuan', 'nilai_kuantititaf', 'nilai_kualitatif']
                );

                // --- SHEET 5: PERIKANAN & ASET ---
                $sheet5 = $spreadsheet->createSheet();
                $sheet5->setTitle('Perikanan & Aset');
                $this->isiDataSheet($sheet5, 'perikanan_dan_aset',
                    ['Tahun', 'Kelompok Aset', 'Nama Aset', 'Satuan Ukuran', 'Volume Jumlah'],
                    ['tahun', 'kelompok_aset', 'nama_aset', 'satuan', 'volume']
                );
            },
        ];
    }

    /**
     * Fungsi Helper Otomatis untuk Mengisi Data dari DB ke Cell Excel
     */
    private function isiDataSheet($sheet, $namaTabel, array $headers, array $koloms)
    {
        // 1. Tulis Header Kolom
        foreach ($headers as $colIdx => $headerText) {
            $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIdx + 1) . '1';
            $sheet->setCellValue($cellCoordinate, $headerText);
        }

        // Terapkan Gaya Header (Navy Blue, Teks Putih, Tebal)
        $highestColLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($headers));
        $sheet->getStyle("A1:{$highestColLetter}1")->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => '1F497D']
            ],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
        ]);

        // 2. Ambil Data dari Database MySQL
        $rows = DB::table($namaTabel)->orderBy('tahun', 'desc')->get();

        // 3. Tulis Baris Data ke Excel
        $rowIdx = 2;
        foreach ($rows as $row) {
            foreach ($koloms as $colIdx => $namaKolom) {
                $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIdx + 1) . $rowIdx;

                // Antisipasi properti objek yang bernilai null/kosong
                $nilaiCell = isset($row->$namaKolom) ? $row->$namaKolom : '';
                $sheet->setCellValue($cellCoordinate, $nilaiCell);
            }
            $rowIdx++;
        }

        // 4. Set Garis Border Tipis & Auto-width untuk kolom agar tidak terpotong
        $highestRow = $rowIdx - 1;
        if ($highestRow >= 1) {
            $sheet->getStyle("A1:{$highestColLetter}{$highestRow}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'D9D9D9'],
                    ],
                ],
            ]);
        }

        // Auto size kolom
        foreach (range(1, count($headers)) as $col) {
            $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
            $sheet->getColumnDimension($colLetter)->setAutoSize(true);
        }
    }
}
