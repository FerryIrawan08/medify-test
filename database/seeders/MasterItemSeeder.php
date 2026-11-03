<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\MasterItem;
use Illuminate\Database\Seeder;

class MasterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'kode' => 'MED-001',
                'nama' => 'Paracetamol 500mg Tablet Box 100s',
                'harga_beli' => 25000,
                'laba' => 20,
                'supplier' => 'PT Kimia Farma Tbk',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-001', 'KTG-004'],
            ],
            [
                'kode' => 'MED-002',
                'nama' => 'Amoxicillin Trihydrate 500mg Kapsul Box',
                'harga_beli' => 45000,
                'laba' => 25,
                'supplier' => 'PT Kalbe Farma Tbk',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-002', 'KTG-003'],
            ],
            [
                'kode' => 'MED-003',
                'nama' => 'Betadine Antiseptic Solution 60ml',
                'harga_beli' => 32000,
                'laba' => 15,
                'supplier' => 'PT Mundipharma Healthcare',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-001', 'KTG-005', 'KTG-018'],
            ],
            [
                'kode' => 'MED-004',
                'nama' => 'Omeprazole 20mg Kapsul Strip',
                'harga_beli' => 18000,
                'laba' => 20,
                'supplier' => 'PT Dexa Medica',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-002', 'KTG-014'],
            ],
            [
                'kode' => 'MED-005',
                'nama' => 'Spuit 3cc Disposable Box 100 pcs',
                'harga_beli' => 95000,
                'laba' => 15,
                'supplier' => 'PT Terumo Indonesia',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-008', 'KTG-010'],
            ],
            [
                'kode' => 'MED-006',
                'nama' => 'Kassa Steril Hydrophile 16x16cm Box',
                'harga_beli' => 15000,
                'laba' => 20,
                'supplier' => 'PT Jayamas Medica Industri (OneMed)',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-008', 'KTG-011', 'KTG-018'],
            ],
            [
                'kode' => 'MED-007',
                'nama' => 'Cairan Infus Ringer Lactate (RL) 500ml',
                'harga_beli' => 12500,
                'laba' => 15,
                'supplier' => 'PT Otsuka Indonesia',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-002', 'KTG-009'],
            ],
            [
                'kode' => 'MED-008',
                'nama' => 'Masker Bedah Medis 3-Ply Earloop Box 50s',
                'harga_beli' => 30000,
                'laba' => 25,
                'supplier' => 'PT Jayamas Medica Industri (OneMed)',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-008', 'KTG-012'],
            ],
            [
                'kode' => 'MED-009',
                'nama' => 'Tensimeter Digital Lengan Atas Omron HEM-7120',
                'harga_beli' => 480000,
                'laba' => 15,
                'supplier' => 'PT Omron Healthcare Indonesia',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-007', 'KTG-015'],
            ],
            [
                'kode' => 'MED-010',
                'nama' => 'Thermometer Digital Fleksibel Inframerah',
                'harga_beli' => 45000,
                'laba' => 20,
                'supplier' => 'PT Jayamas Medica Industri (OneMed)',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-007'],
            ],
            [
                'kode' => 'MED-011',
                'nama' => 'Alkohol Medis 70% Botol 1 Liter',
                'harga_beli' => 28000,
                'laba' => 20,
                'supplier' => 'PT Kimia Farma Tbk',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-005', 'KTG-008', 'KTG-017'],
            ],
            [
                'kode' => 'MED-012',
                'nama' => 'Hand Sanitizer Gel Antiseptik 500ml Pump',
                'harga_beli' => 35000,
                'laba' => 20,
                'supplier' => 'PT Sanbe Farma',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-005', 'KTG-008'],
            ],
            [
                'kode' => 'MED-013',
                'nama' => 'Vitamin C 500mg Strip 10 Tablet',
                'harga_beli' => 12000,
                'laba' => 25,
                'supplier' => 'PT Tempo Scan Pacific Tbk',
                'jenis' => 'Suplemen',
                'kategori_kodes' => ['KTG-001', 'KTG-006'],
            ],
            [
                'kode' => 'MED-014',
                'nama' => 'Neurobion Forte Vitamin B Kompleks Box',
                'harga_beli' => 42000,
                'laba' => 15,
                'supplier' => 'PT Merck Indonesia Tbk',
                'jenis' => 'Suplemen',
                'kategori_kodes' => ['KTG-001', 'KTG-006'],
            ],
            [
                'kode' => 'MED-015',
                'nama' => 'Cefixime Trihydrate 100mg Kapsul Box',
                'harga_beli' => 75000,
                'laba' => 20,
                'supplier' => 'PT Dexa Medica',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-002', 'KTG-003'],
            ],
            [
                'kode' => 'MED-016',
                'nama' => 'Ibuprofen 400mg Kaplet Box 100s',
                'harga_beli' => 38000,
                'laba' => 20,
                'supplier' => 'PT Kimia Farma Tbk',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-001', 'KTG-004', 'KTG-023'],
            ],
            [
                'kode' => 'MED-017',
                'nama' => 'Dexamethasone 0.5mg Tablet Box 100s',
                'harga_beli' => 22000,
                'laba' => 20,
                'supplier' => 'PT Sanbe Farma',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-002', 'KTG-023'],
            ],
            [
                'kode' => 'MED-018',
                'nama' => 'Hansaplast Plester Luka Reguler Roll 5m',
                'harga_beli' => 16500,
                'laba' => 20,
                'supplier' => 'PT Beiersdorf Indonesia',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-008', 'KTG-011', 'KTG-018'],
            ],
            [
                'kode' => 'MED-019',
                'nama' => 'Sarung Tangan Medis Nitrile Box 100 pcs',
                'harga_beli' => 85000,
                'laba' => 15,
                'supplier' => 'PT Jayamas Medica Industri (OneMed)',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-008', 'KTG-012'],
            ],
            [
                'kode' => 'MED-020',
                'nama' => 'Oksigen Tabung Portable Pure Oxygen 500cc',
                'harga_beli' => 52000,
                'laba' => 20,
                'supplier' => 'PT Aneka Gas Industri Tbk',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-007', 'KTG-013', 'KTG-021'],
            ],
            [
                'kode' => 'MED-021',
                'nama' => 'Stetoskop Medis Dual Head Stainless Steel',
                'harga_beli' => 185000,
                'laba' => 20,
                'supplier' => 'PT Terumo Indonesia',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-007', 'KTG-015'],
            ],
            [
                'kode' => 'MED-022',
                'nama' => 'Infusion Set Dewasa Standar Medis 20 Drops',
                'harga_beli' => 8500,
                'laba' => 25,
                'supplier' => 'PT Jayamas Medica Industri (OneMed)',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-008', 'KTG-009'],
            ],
            [
                'kode' => 'MED-023',
                'nama' => 'Salep Kulit Gentamicin Sulfate 0.1% Tube 5g',
                'harga_beli' => 14000,
                'laba' => 20,
                'supplier' => 'PT Kalbe Farma Tbk',
                'jenis' => 'Obat',
                'kategori_kodes' => ['KTG-002', 'KTG-003', 'KTG-016'],
            ],
            [
                'kode' => 'MED-024',
                'nama' => 'Strip Tes Gula Darah EasyTouch Box 25 Strip',
                'harga_beli' => 95000,
                'laba' => 15,
                'supplier' => 'PT Bioptik Indonesia',
                'jenis' => 'Alat Kesehatan',
                'kategori_kodes' => ['KTG-007', 'KTG-024'],
            ],
            [
                'kode' => 'MED-025',
                'nama' => 'Jarum Jahit Bedah Silk Braided with Needle Box',
                'harga_beli' => 110000,
                'laba' => 15,
                'supplier' => 'PT Terumo Indonesia',
                'jenis' => 'Bahan Medis Habis Pakai',
                'kategori_kodes' => ['KTG-008', 'KTG-022'],
            ],
        ];

        foreach ($items as $itemData) {
            $kategoriKodes = $itemData['kategori_kodes'] ?? [];
            unset($itemData['kategori_kodes']);

            $item = MasterItem::updateOrCreate(
                ['kode' => $itemData['kode']],
                $itemData
            );

            if (!empty($kategoriKodes)) {
                $kategoriIds = Kategori::whereIn('kode', $kategoriKodes)->pluck('id');
                $item->kategoris()->sync($kategoriIds);
            }
        }
    }
}

