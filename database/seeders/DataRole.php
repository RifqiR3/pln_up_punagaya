<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DataRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['role' => 'superadmin']);
        Role::create(['role' => 'admin']);
        Role::create(['role' => 'karyawan']);

        Users::create([
            'uuid' => Str::uuid(),
            'nama' => 'Super Admin',
            'email' => 'superadmin123@email.com',
            'password' => Hash::make('Adm1nPLN'),
            'role' => 'superadmin',
        ]);
    }
}
