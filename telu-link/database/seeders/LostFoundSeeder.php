<?php

namespace Database\Seeders;

use App\Models\LostFound;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LostFoundSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'mahasiswa')->limit(15)->get();

        $items = [
            // Hilang
            [
                'item_name' => 'MacBook Pro 13 inch Silver',
                'description' => 'MacBook Pro tahun 2020, ada stiker TelU dan stiker coding. Terakhir dibawa ke perpustakaan.',
                'status' => 'hilang',
                'category' => 'Elektronik',
                'location_found' => 'Perpustakaan GKU',
                'found_date' => Carbon::now()->subDays(2),
                'contact_person' => '081234567890',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Dompet Kulit Coklat',
                'description' => 'Dompet kulit coklat tua merk Fossil, berisi KTP, KTM, dan beberapa kartu ATM.',
                'status' => 'hilang',
                'category' => 'Pribadi',
                'location_found' => 'FIF Lt. 2',
                'found_date' => Carbon::now()->subDays(5),
                'contact_person' => '082345678901',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Kunci Motor Honda Beat Putih',
                'description' => 'Gantungan kunci warna biru dengan gantungan boneka kecil.',
                'status' => 'hilang',
                'category' => 'Kendaraan',
                'location_found' => 'Parkiran Gedung Bangkit',
                'found_date' => Carbon::now()->subDays(1),
                'contact_person' => '083456789012',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Jaket Almamater TelU Merah',
                'description' => 'Jaket almamater TelU warna merah ukuran L, ada nama "Andi" di bagian dalam.',
                'status' => 'hilang',
                'category' => 'Pakaian',
                'location_found' => 'Lab Computing GKU Lt. 4',
                'found_date' => Carbon::now()->subDays(3),
                'contact_person' => '084567890123',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Buku "Clean Code" by Robert Martin',
                'description' => 'Buku programming Clean Code, ada coretan dan highlight di beberapa halaman.',
                'status' => 'hilang',
                'category' => 'Buku',
                'location_found' => 'Kantin FIF',
                'found_date' => Carbon::now()->subDays(7),
                'contact_person' => '085678901234',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Smartwatch Xiaomi Mi Band 6',
                'description' => 'Mi Band 6 warna hitam dengan strap merah. Hilang di area olahraga.',
                'status' => 'hilang',
                'category' => 'Elektronik',
                'location_found' => 'Lapangan Basket TelU',
                'found_date' => Carbon::now()->subDays(4),
                'contact_person' => '086789012345',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Tumbler Stainless Steel Hitam',
                'description' => 'Tumbler warna hitam merk Klean Kanteen, ada stiker band favoritku.',
                'status' => 'hilang',
                'category' => 'Pribadi',
                'location_found' => 'Auditorium TULT',
                'found_date' => Carbon::now()->subDays(6),
                'contact_person' => '087890123456',
                'is_claimed' => false,
            ],

            // Ditemukan
            [
                'item_name' => 'Charger Laptop HP Original',
                'description' => 'Charger laptop HP warna hitam, ketinggalan di ruang kelas.',
                'status' => 'ditemukan',
                'category' => 'Elektronik',
                'location_found' => 'Ruang 301 GKU Tower',
                'found_date' => Carbon::now()->subDays(1),
                'contact_person' => '088901234567',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Earphone Apple Airpods Gen 2',
                'description' => 'Airpods dengan casing putih, ditemukan di kursi perpustakaan.',
                'status' => 'ditemukan',
                'category' => 'Elektronik',
                'location_found' => 'Perpustakaan Lt. 3',
                'found_date' => Carbon::now()->subDays(2),
                'contact_person' => '089012345678',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Kartu TelU Access Card',
                'description' => 'Access card TelU atas nama "Budi Santoso" NIM 1301210003.',
                'status' => 'ditemukan',
                'category' => 'Kartu',
                'location_found' => 'Toilet GKU Lt. 2',
                'found_date' => Carbon::now()->subDays(3),
                'contact_person' => '081122334455',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Tas Ransel Warna Abu-abu Merk Eiger',
                'description' => 'Tas ransel Eiger abu-abu berisi buku dan alat tulis. Tidak ada identitas.',
                'status' => 'ditemukan',
                'category' => 'Tas',
                'location_found' => 'Musholla Gedung FEB',
                'found_date' => Carbon::now()->subDays(4),
                'contact_person' => '082233445566',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Kacamata Hitam Ray-Ban',
                'description' => 'Kacamata hitam merk Ray-Ban Aviator, ditemukan di meja kantin.',
                'status' => 'ditemukan',
                'category' => 'Pribadi',
                'location_found' => 'Kantin Burjo',
                'found_date' => Carbon::now()->subDays(5),
                'contact_person' => '083344556677',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Payung Lipat Warna Biru Tua',
                'description' => 'Payung lipat otomatis warna biru tua, masih bagus.',
                'status' => 'ditemukan',
                'category' => 'Pribadi',
                'location_found' => 'Halte Bus TelU',
                'found_date' => Carbon::now()->subDays(8),
                'contact_person' => '084455667788',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Flash Disk Sandisk 32GB',
                'description' => 'Flashdisk Sandisk 32GB warna hitam merah, berisi file tugas kampus.',
                'status' => 'ditemukan',
                'category' => 'Elektronik',
                'location_found' => 'Lab Multimedia Gedung Telkom',
                'found_date' => Carbon::now()->subDays(6),
                'contact_person' => '085566778899',
                'is_claimed' => false,
            ],
            [
                'item_name' => 'Hoodie Hitam Uniqlo Ukuran M',
                'description' => 'Hoodie polos hitam merk Uniqlo, ketinggalan di ruang seminar.',
                'status' => 'ditemukan',
                'category' => 'Pakaian',
                'location_found' => 'Ruang Seminar GKU',
                'found_date' => Carbon::now()->subDays(9),
                'contact_person' => '086677889900',
                'is_claimed' => false,
            ],
        ];

        foreach ($items as $index => $item) {
            $user = $users[$index % $users->count()];
            LostFound::create(array_merge($item, ['user_id' => $user->id]));
        }
    }
}
