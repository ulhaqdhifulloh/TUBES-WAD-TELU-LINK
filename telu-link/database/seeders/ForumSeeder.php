<?php

namespace Database\Seeders;

use App\Models\ForumQuestion;
use App\Models\ForumAnswer;
use App\Models\User;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'mahasiswa')->get();

        $questionsData = [
            [
                'title' => 'Cara Mengakses VPN TelU untuk Jurnal Internasional?',
                'content' => 'Halo teman-teman, ada yang tahu cara mengakses VPN TelU? Saya butuh download jurnal dari IEEE tapi harus pakai akses kampus. Mohon bantuannya!',
                'category' => 'akademik',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Kamu bisa download aplikasi Cisco AnyConnect, terus setting servernya ke vpn.telkomuniversity.ac.id. Login pakai SSO TelU kamu.', 'is_best' => true],
                    ['content' => 'Kalau masih error, coba cek di website library TelU ada panduannya lengkap kok.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Rekomendasi Laptop untuk Mahasiswa Informatika?',
                'content' => 'Guys mau nanya dong, laptop yang cocok untuk mahasiswa IF apa ya? Budget sekitar 10-15 juta. Butuhnya untuk coding, running VM, dan light gaming. Thanks!',
                'category' => 'teknis',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Asus TUF atau Lenovo Legion bagus tuh, RAM minimal 16GB, SSD 512GB, processor i5/Ryzen 5 keatas.', 'is_best' => false],
                    ['content' => 'Kalau mau yang lebih ringan, MacBook Air M1/M2 juga oke. Battery life bagus banget dan performanya mantap untuk programming.', 'is_best' => true],
                    ['content' => 'Jangan lupa pastikan ada port USB-C/Thunderbolt buat peripheral ya!', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Dimana Bisa Fotokopi Murah di Sekitar TelU?',
                'content' => 'Ada yang tahu tempat fotokopi paling murah di sekitar kampus? Butuh fotokopi banyak untuk bahan ujian nih.',
                'category' => 'umum',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Di warung seberang gerbang utama ada yang murah, 150/lembar. Bisa jilid juga.', 'is_best' => true],
                    ['content' => 'Kalau mau yang lebih cepat, di FIF lantai 1 ada mesin fotokopi self-service.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Cara Daftar Tugas Akhir/ Skripsi?',
                'content' => 'Mau tanya dong, syarat dan prosedur daftar TA itu gimana ya? SKS minimal berapa? Terus harus bawa dokumen apa aja?',
                'category' => 'akademik',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'SKS minimal 120 dan IPK min 2.5. Dokumen: KRS, transkrip, form persetujuan dosen pembimbing. Daftar lewat iGracias.', 'is_best' => true],
                    ['content' => 'Jangan lupa konsultasi dulu sama dosen PA untuk approval topik TA kamu.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Error "npm install" di Project React, Solusinya?',
                'content' => 'Teman-teman ada yang pernah ngalamin error saat npm install? Muncul "ERESOLVE unable to resolve dependency tree". Gimana ya solusinya?',
                'category' => 'teknis',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Coba pakai "npm install --legacy-peer-deps" atau "npm install --force". Biasanya masalah dari conflict dependencies.', 'is_best' => true],
                    ['content' => 'Atau delete folder node_modules sama package-lock.json dulu, terus npm install lagi.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Tempat Makan Murah dan Enak di Sekitar TelU?',
                'content' => 'Guys, share dong tempat makan favorit kalian di sekitar kampus yang murah tapi enak',
                'category' => 'umum',
                'is_solved' => false,
                'answers' => [
                    ['content' => 'Burjo depan kampus favorit gw, nasi goreng dan indomienya enak. Harga mahasiswa banget!', 'is_best' => false],
                    ['content' => 'Warung Nasi Ibu Haji di Jalan Telekomunikasi recommended, menu padang lengkap harga 15-20rb kenyang.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Cara Connect Database MySQL di Laravel?',
                'content' => 'Nanya dong, aku baru belajar Laravel nih tapi bingung setting database MySQL di .env file. Ada yang bisa kasih contoh?',
                'category' => 'teknis',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Di file .env set: DB_CONNECTION=mysql, DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=nama_db, DB_USERNAME=root, DB_PASSWORD=(kosong atau password mysql kamu)', 'is_best' => true],
                    ['content' => 'Jangan lupa jalanin "php artisan migrate" setelah setting database.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Info Beasiswa untuk Mahasiswa Berprestasi?',
                'content' => 'Ada info beasiswa apa aja yang tersedia untuk mahasiswa TelU? Khususnya untuk yang punya prestasi akademik.',
                'category' => 'akademik',
                'is_solved' => false,
                'answers' => [
                    ['content' => 'Ada beasiswa Unggulan dari Kemdikbud, beasiswa internal TelU, sama beasiswa dari perusahaan partner. Cek di TelU-Link!', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Git Merge Conflict, Gimana Solusinya?',
                'content' => 'Lagi ngerjain project kelompok pakai Git, tiba-tiba muncul merge conflict. Cara resolve nya gimana ya yang benar?',
                'category' => 'teknis',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Buka file yang conflict, cari tanda <<<<<<<, =======, >>>>>>>. Pilih code mana yang mau dipakai, hapus tanda-tanda itu, save, terus git add dan git commit.', 'is_best' => true],
                    ['content' => 'Kalau pakai VS Code, ada extension GitLens yang memudahkan resolve conflict secara visual.', 'is_best' => false],
                ]
            ],
            [
                'title' => 'Jadwal Buka Perpustakaan TelU?',
                'content' => 'Ada yang tahu perpustakaan TelU buka sampai jam berapa? Khususnya di hari Sabtu-Minggu.',
                'category' => 'umum',
                'is_solved' => true,
                'answers' => [
                    ['content' => 'Senin-Jumat: 08.00-20.00, Sabtu: 08.00-16.00. Minggu libur kecuali ada acara khusus.', 'is_best' => true],
                ]
            ],
        ];

        foreach ($questionsData as $qData) {
            $user = $users->random();
            $question = ForumQuestion::create([
                'user_id' => $user->id,
                'category' => $qData['category'],
                'title' => $qData['title'],
                'content' => $qData['content'],
                'is_solved' => $qData['is_solved'],
            ]);

            foreach ($qData['answers'] as $answerData) {
                $answerUser = $users->random();
                ForumAnswer::create([
                    'question_id' => $question->id,
                    'user_id' => $answerUser->id,
                    'content' => $answerData['content'],
                    'is_best_answer' => $answerData['is_best'],
                ]);
            }
        }
    }
}
