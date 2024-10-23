<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DataSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'uuid' => Str::uuid(),
            'nama' => 'Super Admin',
            'email' => 'superadmin123@email.com',
            'password' => Hash::make('Adm1nPLN'),
            'role' => 'superadmin',
            'is_verified' => '1'
        ]);
    }
}
