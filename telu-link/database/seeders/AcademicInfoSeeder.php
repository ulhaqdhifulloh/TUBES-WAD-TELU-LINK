<?php

namespace Database\Seeders;

use App\Models\AcademicInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AcademicInfoSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $academicInfo = [
            // Beasiswa
            [
                'type' => 'beasiswa',
                'title' => 'Beasiswa Unggulan Kemendikbudristek 2024',
                'description' => 'Beasiswa penuh untuk mahasiswa berprestasi akademik dan non-akademik dari Kementerian Pendidikan.',
                'provider' => 'Kemendikbudristek',
                'deadline' => Carbon::now()->addDays(30),
                'requirements' => 'IPK min 3.5, Surat rekomendasi, Sertifikat prestasi, Essay motivasi',
                'link' => 'https://beasiswaunggulan.kemdikbud.go.id',
            ],
            [
                'type' => 'beasiswa',
                'title' => 'Beasiswa LPDP Dalam Negeri',
                'description' => 'Beasiswa pendidikan S2 dan S3 dalam negeri dari LPDP untuk berbagai bidang keilmuan.',
                'provider' => 'LPDP Kemenkeu',
                'deadline' => Carbon::now()->addDays(45),
                'requirements' => 'IPK min 3.0, LoA universitas tujuan, Proposal riset, Tes wawancara',
                'link' => 'https://lpdp.kemenkeu.go.id',
            ],
            [
                'type' => 'beasiswa',
                'title' => 'Beasiswa Telkom University Foundation',
                'description' => 'Beasiswa internal TelU untuk mahasiswa berprestasi dengan kebutuhan finansial.',
                'provider' => 'Yayasan Telkom University',
                'deadline' => Carbon::now()->addDays(20),
                'requirements' => 'IPK min 3.25, Surat keterangan tidak mampu, Surat rekomendasi dosen',
                'link' => 'https://telkomuniversity.ac.id/beasiswa',
            ],
            [
                'type' => 'beasiswa',
                'title' => 'Beasiswa BCA Finance',
                'description' => 'Beasiswa untuk mahasiswa aktif dari keluarga kurang mampu yang berprestasi.',
                'provider' => 'BCA Finance',
                'deadline' => Carbon::now()->addDays(25),
                'requirements' => 'IPK min 3.0, Penghasilan orangtua < 5 juta, Aktif organisasi',
                'link' => 'https://bcafinance.co.id/beasiswa',
            ],
            [
                'type' => 'beasiswa',
                'title' => 'Beasiswa Telkom Indonesia',
                'description' => 'Program beasiswa dari Telkom Indonesia untuk putra-putri karyawan dan mahasiswa umum berprestasi.',
                'provider' => 'PT Telkom Indonesia',
                'deadline' => Carbon::now()->addDays(15),
                'requirements' => 'IPK min 3.3, Aktif organisasi, Essay dan wawancara',
                'link' => 'https://telkom.co.id/beasiswa',
            ],

            // Kompetisi
            [
                'type' => 'kompetisi',
                'title' => 'GEMASTIK XVII 2024',
                'description' => 'Kompetisi TIK nasional dengan 14 cabang lomba untuk mahasiswa se-Indonesia.',
                'provider' => 'Puspresnas Kemendikbudristek',
                'deadline' => Carbon::now()->addDays(35),
                'requirements' => 'Mahasiswa aktif S1/D4, Tim maksimal 3 orang, Proposal dan video presentasi',
                'link' => 'https://gemastik.hmif.or.id',
            ],
            [
                'type' => 'kompetisi',
                'title' => 'ASEAN Data Science Explorers',
                'description' => 'Kompetisi analisis data tingkat ASEAN dengan hadiah total $30,000 USD.',
                'provider' => 'SAP & ASEAN Foundation',
                'deadline' => Carbon::now()->addDays(40),
                'requirements' => 'Tim 2-4 mahasiswa, Proposal data science, Presentasi dalam bahasa Inggris',
                'link' => 'https://datascienceexplorers.sap.com',
            ],
            [
                'type' => 'kompetisi',
                'title' => 'Kompetisi Karya Tulis Ilmiah Nasional',
                'description' => 'LKTIN dengan tema Teknologi untuk Pembangunan Berkelanjutan.',
                'provider' => 'Dikti',
                'deadline' => Carbon::now()->addDays(50),
                'requirements' => 'Mahasiswa S1/D4, Tim 3 orang + 1 dosen pembimbing, Karya tulis original',
                'link' => 'https://pimnas.dikti.go.id',
            ],
            [
                'type' => 'kompetisi',
                'title' => 'Indonesia Cyber Security Competition',
                'description' => 'Kompetisi CTF (Capture The Flag) keamanan siber tingkat nasional.',
                'provider' => 'BSSN & Kominfo',
                'deadline' => Carbon::now()->addDays(28),
                'requirements' => 'Tim 3 orang, Mahasiswa aktif, Pengalaman CTF diutamakan',
                'link' => 'https://cybersec.id/competition',
            ],
            [
                'type' => 'kompetisi',
                'title' => 'Business Plan Competition TelU 2024',
                'description' => 'Kompetisi rencana bisnis mahasiswa TelU dengan total hadiah 30 juta rupiah.',
                'provider' => 'TelU Incubator',
                'deadline' => Carbon::now()->addDays(22),
                'requirements' => 'Mahasiswa TelU, Tim 3-5 orang, Business plan dan pitch deck',
                'link' => 'https://telkomuniversity.ac.id/bpc',
            ],
            [
                'type' => 'kompetisi',
                'title' => 'Poster Scientific Competition',
                'description' => 'Kompetisi poster ilmiah dengan tema Inovasi Teknologi di Era Digital.',
                'provider' => 'HMIF TelU',
                'deadline' => Carbon::now()->addDays(18),
                'requirements' => 'Mahasiswa TelU, Individu atau tim 2 orang, Poster A1',
                'link' => 'https://hmif-telu.id/poster-competition',
            ],
        ];

        foreach ($academicInfo as $info) {
            AcademicInfo::create(array_merge($info, ['created_by' => $admin->id]));
        }
    }
}
