<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ObligasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daftar_obligasi')->insert([
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0059',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2043-05-15',
                'kupon' => '7.00%',
                'yield' => '6.25%',
                'harga_beli' => '101.85',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0064',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2028-05-15',
                'kupon' => '6.125%',
                'yield' => '6.30%',
                'harga_beli' => '99.40',
                'stok' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0065',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2033-05-15',
                'kupon' => '6.625%',
                'yield' => '6.67%',
                'harga_beli' => '99.70',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0081',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2025-06-15',
                'kupon' => '6.50%',
                'yield' => '6.04%',
                'harga_beli' => '100.35',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0097',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2043-06-15',
                'kupon' => '7.125%',
                'yield' => '6.83%',
                'harga_beli' => '103.05',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0098',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2038-06-15',
                'kupon' => '7.125%',
                'yield' => '6.71%',
                'harga_beli' => '103.70',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Fixed Rate',
                'kode_obligasi' => 'FR0100',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2034-02-15',
                'kupon' => '7.125%',
                'yield' => '6.625%',
                'harga_beli' => '99.65',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Obligasi Negara Ritel',
                'kode_obligasi' => 'ORI024T3',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2026-10-15',
                'kupon' => '6.10%',
                'yield' => '6.00%',
                'harga_beli' => '100.20',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Obligasi Negara Valas',
                'kode_obligasi' => 'INDOIS25NEW',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2043-06-15',
                'kupon' => '2.30%',
                'yield' => '3.88%',
                'harga_beli' => '98.70',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Obligasi Negara Valas',
                'kode_obligasi' => 'INDOIS28NEW',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2028-11-15',
                'kupon' => '5.40%',
                'yield' => '4.38%',
                'harga_beli' => '103.85',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Project Based Sukuk',
                'kode_obligasi' => 'PBS038',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2049-12-15',
                'kupon' => '6.875%',
                'yield' => '6.97%',
                'harga_beli' => '98.85',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obligasi' => 'Sukuk Negara Ritel',
                'kode_obligasi' => 'SR015',
                'tanggal_penerbitan' => '2023-01-01',
                'tanggal_jatuh_tempo' => '2024-9-10',
                'kupon' => '5.10%',
                'yield' => '2.86%',
                'harga_beli' => '100.15',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan lebih banyak data di sini jika diperlukan
        ]);
    }
}
