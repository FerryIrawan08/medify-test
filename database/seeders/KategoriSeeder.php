<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            ['kode' => 'KTG-001', 'nama' => 'Obat Bebas (OTC)'],
            ['kode' => 'KTG-002', 'nama' => 'Obat Keras & Resep'],
            ['kode' => 'KTG-003', 'nama' => 'Antibiotik'],
            ['kode' => 'KTG-004', 'nama' => 'Analgesik & Antipiretik'],
            ['kode' => 'KTG-005', 'nama' => 'Antiseptik & Desinfektan'],
            ['kode' => 'KTG-006', 'nama' => 'Vitamin & Suplemen'],
            ['kode' => 'KTG-007', 'nama' => 'Alat Kesehatan Diagnostik'],
            ['kode' => 'KTG-008', 'nama' => 'Bahan Medis Habis Pakai (BMHP)'],
            ['kode' => 'KTG-009', 'nama' => 'Cairan Infus & Elektrolit'],
            ['kode' => 'KTG-010', 'nama' => 'Jarum & Alat Suntik (Spuit)'],
            ['kode' => 'KTG-011', 'nama' => 'Perban, Kassa & Plester'],
            ['kode' => 'KTG-012', 'nama' => 'Alat Pelindung Diri (APD)'],
            ['kode' => 'KTG-013', 'nama' => 'Obat Saluran Pernafasan'],
            ['kode' => 'KTG-014', 'nama' => 'Obat Saluran Pencernaan'],
            ['kode' => 'KTG-015', 'nama' => 'Obat Kardiovaskular'],
            ['kode' => 'KTG-016', 'nama' => 'Salep & Obat Kulit Luar'],
            ['kode' => 'KTG-017', 'nama' => 'Sterilisasi Medis'],
            ['kode' => 'KTG-018', 'nama' => 'Perawatan Luka (Wound Care)'],
            ['kode' => 'KTG-019', 'nama' => 'Nutrisi & Susu Medis'],
            ['kode' => 'KTG-020', 'nama' => 'Obat Mata & THT'],
            ['kode' => 'KTG-021', 'nama' => 'Alat Terapi Pernafasan'],
            ['kode' => 'KTG-022', 'nama' => 'Peralatan Bedah & Jahit'],
            ['kode' => 'KTG-023', 'nama' => 'Obat Antiinflamasi'],
            ['kode' => 'KTG-024', 'nama' => 'Reagen & Strip Tes Laboratorium'],
            ['kode' => 'KTG-025', 'nama' => 'Perlengkapan Rawat Inap'],
        ];

        foreach ($kategoris as $item) {
            Kategori::updateOrCreate(
                ['kode' => $item['kode']],
                ['nama' => $item['nama']]
            );
        }
    }
}

