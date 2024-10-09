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
        $json = file_get_contents(__DIR__ . '/inventory_data.json');
        $json = json_decode($json, true);

        // Mengubah format tanggal untuk setiap item
        foreach ($json as &$item) {
            // Mengubah format tanggal acquisition_date
            $date = DateTime::createFromFormat('m/d/Y', $item['acquisition_date']);
            if ($date) {
                $item['acquisition_date'] = $date->format('Y-m-d');
            }
        }

        // Insert data into database
        DB::table('inventory')->insert($json);
    }
}
