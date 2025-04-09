<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            ['name' => 'Cuci Kering', 'description' => 'Pakaian bersih dan wangi dalam waktu singkat.', 'price' => 10000],
            ['name' => 'Express Service', 'description' => 'Butuh cepat? Kami siap melayani dalam hitungan jam.', 'price' => 20000],
            ['name' => 'Eco-Friendly', 'description' => 'Menggunakan bahan ramah lingkungan dan aman.', 'price' => 15000],
            ['name' => 'Cuci Sepatu', 'description' => 'Pembersihan sepatu dengan teknik khusus untuk hasil maksimal.', 'price' => 25000],
        ]);
    }
}
