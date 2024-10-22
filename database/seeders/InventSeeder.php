<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class InventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membaca file JSON
        $json = file_get_contents(__DIR__ . '/inventory.json');
        $data = json_decode($json, true);

        // Mengambil data dari bagian 'data' di dalam tabel 'inventory'
        $inventoryData = collect($data)
            ->where('type', 'table')
            ->where('name', 'inventory')
            ->pluck('data')
            ->first();

        // Mengubah format tanggal untuk setiap item
        foreach ($inventoryData as &$item) {
            // Mengubah format tanggal acquisition_date jika diperlukan
            $date = DateTime::createFromFormat('Y-m-d', $item['acquisition_date']);
            if ($date) {
                $item['acquisition_date'] = $date->format('Y-m-d'); // Format yang sama, jadi bisa diabaikan
            }
            // Jika perlu menambahkan created_at dan updated_at ke format yang sesuai
            $item['created_at'] = $item['created_at'] ?? now();
            $item['updated_at'] = $item['updated_at'] ?? now();
            unset($item['id']); // Hapus ID jika menggunakan auto increment
        }

        // Insert data into database
        DB::table('inventory')->insert($inventoryData);
    }
}
