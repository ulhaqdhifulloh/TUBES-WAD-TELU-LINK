<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $events = [
            [
                'title' => 'TelU Hackathon 2024',
                'description' => 'Kompetisi hackathon tingkat nasional dengan tema Smart City dan IoT. Berhadiah total 50 juta rupiah!',
                'category' => 'kompetisi',
                'location' => 'GKU Tower Lt. 7',
                'event_date' => Carbon::now()->addDays(15)->setTime(9, 0),
                'registration_deadline' => Carbon::now()->addDays(10),
                'organizer' => 'HMIF & BEM TelU',
                'contact_info' => 'hackathon@telkomuniversity.ac.id',
                'max_participants' => 100,
            ],
            [
                'title' => 'Workshop Machine Learning untuk Pemula',
                'description' => 'Belajar dasar-dasar Machine Learning dengan Python dan TensorFlow. Cocok untuk pemula!',
                'category' => 'workshop',
                'location' => 'Lab Komputasi Gedung Bangkit',
                'event_date' => Carbon::now()->addDays(7)->setTime(13, 0),
                'registration_deadline' => Carbon::now()->addDays(5),
                'organizer' => 'HMIF & Google Developer Student Club',
                'contact_info' => 'gdsc@telkomuniversity.ac.id',
                'max_participants' => 50,
            ],
            [
                'title' => 'Seminar Cyber Security & Ethical Hacking',
                'description' => 'Menghadirkan praktisi keamanan siber dari BSSN dan perusahaan teknologi terkemuka.',
                'category' => 'seminar',
                'location' => 'Auditorium FIF Lt. 3',
                'event_date' => Carbon::now()->addDays(5)->setTime(10, 0),
                'registration_deadline' => Carbon::now()->addDays(3),
                'organizer' => 'HMIF',
                'contact_info' => 'hmif@telkomuniversity.ac.id',
                'max_participants' => 200,
            ],
            [
                'title' => 'TelU Startup Pitch Competition',
                'description' => 'Kompetisi pitching ide startup untuk mahasiswa TelU. Pemenang mendapat seed funding dan mentoring.',
                'category' => 'kompetisi',
                'location' => 'Innovation Center TelU',
                'event_date' => Carbon::now()->addDays(20)->setTime(9, 0),
                'registration_deadline' => Carbon::now()->addDays(14),
                'organizer' => 'TelU Incubator & BEM',
                'contact_info' => 'startup@telkomuniversity.ac.id',
                'max_participants' => 30,
            ],
            [
                'title' => 'Workshop UI/UX Design dengan Figma',
                'description' => 'Pelajari prinsip-prinsip desain UI/UX dan praktik langsung menggunakan Figma.',
                'category' => 'workshop',
                'location' => 'Design Lab Gedung TULT',
                'event_date' => Carbon::now()->addDays(12)->setTime(14, 0),
                'registration_deadline' => Carbon::now()->addDays(8),
                'organizer' => 'DKV Student Association',
                'contact_info' => 'dkvsa@telkomuniversity.ac.id',
                'max_participants' => 40,
            ],
            [
                'title' => 'Seminar Karir: Menjadi Data Scientist di Era AI',
                'description' => 'Tips dan trik mempersiapkan karir sebagai Data Scientist dari alumni TelU yang bekerja di unicorn.',
                'category' => 'seminar',
                'location' => 'Aula Utama GKU',
                'event_date' => Carbon::now()->addDays(8)->setTime(13, 0),
                'registration_deadline' => Carbon::now()->addDays(6),
                'organizer' => 'CDC TelU',
                'contact_info' => 'cdc@telkomuniversity.ac.id',
                'max_participants' => 150,
            ],
            [
                'title' => 'TelU Coding Bootcamp: Web Development',
                'description' => 'Bootcamp intensif 3 hari belajar membuat website dengan Laravel dan React. Gratis untuk mahasiswa TelU!',
                'category' => 'workshop',
                'location' => 'Lab Programming GKU Lt. 4',
                'event_date' => Carbon::now()->addDays(25)->setTime(9, 0),
                'registration_deadline' => Carbon::now()->addDays(18),
                'organizer' => 'HMIF',
                'contact_info' => 'bootcamp@telkomuniversity.ac.id',
                'max_participants' => 60,
            ],
            [
                'title' => 'Festival Olahraga TelU Link 2024',
                'description' => 'Kompetisi olahraga antar fakultas: futsal, basket, badminton, dan lari. Daftar sekarang!',
                'category' => 'lainnya',
                'location' => 'Lapangan Olahraga TelU',
                'event_date' => Carbon::now()->addDays(30)->setTime(7, 0),
                'registration_deadline' => Carbon::now()->addDays(20),
                'organizer' => 'UKM Olahraga TelU',
                'contact_info' => 'olahraga@telkomuniversity.ac.id',
                'max_participants' => 500,
            ],
            [
                'title' => 'Workshop Internet of Things (IoT) Basic',
                'description' => 'Belajar dasar IoT dengan Arduino dan ESP32. Materi hands-on dengan kit yang disediakan.',
                'category' => 'workshop',
                'location' => 'Lab IoT Gedung Telkom',
                'event_date' => Carbon::now()->addDays(10)->setTime(10, 0),
                'registration_deadline' => Carbon::now()->addDays(7),
                'organizer' => 'HMTE',
                'contact_info' => 'hmte@telkomuniversity.ac.id',
                'max_participants' => 35,
            ],
            [
                'title' => 'Seminar Digital Marketing untuk UMKM',
                'description' => 'Strategi digital marketing praktis untuk mahasiswa yang ingin mengembangkan bisnis online.',
                'category' => 'seminar',
                'location' => 'Ruang Seminar FEB Lt. 2',
                'event_date' => Carbon::now()->addDays(6)->setTime(14, 0),
                'registration_deadline' => Carbon::now()->addDays(4),
                'organizer' => 'HMAB',
                'contact_info' => 'hmab@telkomuniversity.ac.id',
                'max_participants' => 100,
            ],
            // Past events (for demo purposes)
            [
                'title' => 'TelU Career Fair 2024',
                'description' => 'Job fair dengan 50+ perusahaan teknologi dan telekomunikasi terkemuka.',
                'category' => 'lainnya',
                'location' => 'Hall Utama TelU',
                'event_date' => Carbon::now()->subDays(10)->setTime(9, 0),
                'registration_deadline' => Carbon::now()->subDays(15),
                'organizer' => 'CDC TelU',
                'contact_info' => 'cdc@telkomuniversity.ac.id',
                'max_participants' => 1000,
            ],
            [
                'title' => 'Workshop Git & GitHub untuk Tim Development',
                'description' => 'Belajar version control dengan Git dan kolaborasi menggunakan GitHub.',
                'category' => 'workshop',
                'location' => 'Online via Zoom',
                'event_date' => Carbon::now()->subDays(5)->setTime(19, 0),
                'registration_deadline' => Carbon::now()->subDays(7),
                'organizer' => 'GDSC TelU',
                'contact_info' => 'gdsc@telkomuniversity.ac.id',
                'max_participants' => 80,
            ],
        ];

        foreach ($events as $event) {
            Event::create(array_merge($event, ['created_by' => $admin->id]));
        }
    }
}
