<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $organizations = [
            [
                'name' => 'HMIF (Himpunan Mahasiswa Informatika)',
                'description' => 'Himpunan mahasiswa program studi Teknik Informatika Telkom University. Fokus pada pengembangan skill programming, AI, dan teknologi terkini.',
                'category' => 'Himpunan',
                'contact' => 'hmif@telkomuniversity.ac.id',
                'instagram' => '@hmif_telu',
                'president_name' => 'Reza Fahlevi',
            ],
            [
                'name' => 'HMSI (Himpunan Mahasiswa Sistem Informasi)',
                'description' => 'Wadah mahasiswa Sistem Informasi untuk mengembangkan kemampuan analisis bisnis, project management, dan enterprise systems.',
                'category' => 'Himpunan',
                'contact' => 'hmsi@telkomuniversity.ac.id',
                'instagram' => '@hmsi_telu',
                'president_name' => 'Linda Wijaya',
            ],
            [
                'name' => 'HMTE (Himpunan Mahasiswa Teknik Elektro)',
                'description' => 'Organisasi mahasiswa Teknik Elektro yang berfokus pada pengembangan teknologi elektro, IoT, dan sistem kendali.',
                'category' => 'Himpunan',
                'contact' => 'hmte@telkomuniversity.ac.id',
                'instagram' => '@hmte_telu',
                'president_name' => 'Ricky Saputra',
            ],
            [
                'name' => 'BEM TelU (Badan Eksekutif Mahasiswa)',
                'description' => 'Organisasi eksekutif mahasiswa Telkom University yang mengadvokasi aspirasi mahasiswa dan menyelenggarakan program kampus.',
                'category' => 'BEM',
                'contact' => 'bem@telkomuniversity.ac.id',
                'instagram' => '@bem_telu',
                'president_name' => 'Andi Pratama',
            ],
            [
                'name' => 'GDSC TelU (Google Developer Student Club)',
                'description' => 'Komunitas developer yang didukung Google untuk belajar teknologi Google Cloud, Android, dan Web Development.',
                'category' => 'UKM',
                'contact' => 'gdsc@telkomuniversity.ac.id',
                'instagram' => '@gdsc_telu',
                'president_name' => 'Fajar Nugroho',
            ],
            [
                'name' => 'TelU Choir',
                'description' => 'Unit Kegiatan Mahasiswa bidang seni suara yang aktif dalam kompetisi paduan suara nasional dan internasional.',
                'category' => 'UKM',
                'contact' => 'choir@telkomuniversity.ac.id',
                'instagram' => '@teluchoir',
                'president_name' => 'Siti Nurhaliza',
            ],
            [
                'name' => 'TelU Photography Club',
                'description' => 'Komunitas fotografi TelU yang mengembangkan skill photography, videography, dan editing.',
                'category' => 'UKM',
                'contact' => 'photography@telkomuniversity.ac.id',
                'instagram' => '@teluphotoclub',
                'president_name' => 'Dewi Lestari',
            ],
            [
                'name' => 'Robotics Club TelU',
                'description' => 'Klub robotika yang fokus pada pengembangan robot untuk kompetisi KRCI, ABU Robocon, dan lainnya.',
                'category' => 'UKM',
                'contact' => 'robotics@telkomuniversity.ac.id',
                'instagram' => '@robotics_telu',
                'president_name' => 'Dimas Putra',
            ],
            [
                'name' => 'TelU Entrepreneur Club',
                'description' => 'Wadah para mahasiswa yang tertarik dengan entrepreneurship dan startup development.',
                'category' => 'UKM',
                'contact' => 'entrepreneur@telkomuniversity.ac.id',
                'instagram' => '@telupreneur',
                'president_name' => 'Hendra Gunawan',
            ],
            [
                'name' => 'Liga Mahasiswa TelU',
                'description' => 'Organisasi yang menaungi berbagai cabang olahraga di Telkom University seperti futsal, basket, dan badminton.',
                'category' => 'Lainnya',
                'contact' => 'ligamahasiswa@telkomuniversity.ac.id',
                'instagram' => '@ligamahasiswa_telu',
                'president_name' => 'Yoga Aditya',
            ],
        ];

        foreach ($organizations as $org) {
            Organization::create($org);
        }
    }
}
