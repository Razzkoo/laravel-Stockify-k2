<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin123@gmail.com'],
            [
                'name'     => 'Admin Utama',
                'password' => Hash::make('123'),
                'role'     => 'admin',
                'profile_photo'     => null,
            ]
        );
        User::firstOrCreate(
            ['email' => 'manajer123@gmail.com'],
            [
                'name'     => 'Kepala Manajer Gudang',
                'password' => Hash::make('123'),
                'role'     => 'manajer_gudang',
                'profile_photo'     => null,
            ]
        );
        User::firstOrCreate(
            ['email' => 'staff123@gmail.com'],
            [
                'name'     => 'Kepala Staff Gudang',
                'password' => Hash::make('123'),
                'role'     => 'staff_gudang',
                'profile_photo'     => null,
            ]
        );
    }
}
