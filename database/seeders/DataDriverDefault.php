<?php

namespace Database\Seeders;

use App\Models\DataDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDriverDefault extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataDriver::create([
            'uuid' => '0001',
            'nama' => 'Belum Ditentukan',
            'plat_mobil' => "Belum Ditentukan"
        ]);
    }
}
