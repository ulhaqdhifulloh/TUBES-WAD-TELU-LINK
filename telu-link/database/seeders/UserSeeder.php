<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User - Dhifulloh Dhiya Ulhaq (Event Kampus, Info Akademik & Beasiswa)
        User::create([
            'name' => 'Admin TelU',
            'email' => 'admin@telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nim' => '1302220000',
            'jurusan' => 'Teknik Informatika',
            'phone' => '081234567890',
        ]);

        // Create Mahasiswa Users
        User::create([
            'name' => 'Dhifulloh Dhiya Ulhaq',
            'email' => 'dhifulloh@student.telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'nim' => '1302220847',
            'jurusan' => 'Teknik Informatika',
            'phone' => '081234567890',
        ]);

        $mahasiswa = [
            [
                'name' => 'Sidik Indra Prayoga',
                'email' => 'sidik@student.telkomuniversity.ac.id',
                'nim' => '1302220923',
                'jurusan' => 'Sistem Informasi',
            ],
            [
                'name' => 'Dea Gina Dewi Sihotang',
                'email' => 'dea@student.telkomuniversity.ac.id',
                'nim' => '1302194672',
                'jurusan' => 'Teknik Informatika',
            ],
            [
                'name' => 'Kresna Pebriawan',
                'email' => 'kresna@student.telkomuniversity.ac.id',
                'nim' => '1302220956',
                'jurusan' => 'Teknik Komputer',
            ],
        ];

        foreach ($mahasiswa as $mhs) {
            User::create([
                'name' => $mhs['name'],
                'email' => $mhs['email'],
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'nim' => $mhs['nim'],
                'jurusan' => $mhs['jurusan'],
                'phone' => '08' . rand(1000000000, 9999999999),
            ]);
        }
    }
}
