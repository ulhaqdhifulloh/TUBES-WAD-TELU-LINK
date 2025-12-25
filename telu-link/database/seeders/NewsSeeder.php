<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Get admin user - only admin can create news
        $admin = User::where('email', 'admin@telkomuniversity.ac.id')->first();

        if (!$admin) {
            $this->command->error('Admin user not found! Run UserSeeder first.');
            return;
        }

        $organizations = Organization::all();
        // $users = User::where('role', 'admin')->orWhere('role', 'mahasiswa')->limit(5)->get(); // Removed as per instruction

        $newsArticles = [
            [
                'title' => 'HMIF TelU Raih Juara 1 Gemastik XVII Cabang Data Mining',
                'content' => 'Tim mahasiswa Teknik Informatika Telkom University berhasil meraih juara 1 pada kompetisi Gemastik XVII cabang Data Mining. Tim yang terdiri dari 3 mahasiswa ini mengalahkan 50 tim dari seluruh Indonesia dengan solusi prediksi churn customer menggunakan ensemble learning. Prestasi ini membuktikan kualitas pendidikan di TelU khususnya bidang data science.',
                'excerpt' => 'Tim HMIF TelU juara 1 Gemastik XVII Data Mining mengalahkan 50 tim nasional.',
                'organization_id' => $organizations->where('name', 'HMIF (Himpunan Mahasiswa Informatika)')->first()->id,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'BEM TelU Gelar Career Fair 2024 dengan 50+ Perusahaan',
                'content' => 'BEM Telkom University sukses menyelenggarakan Career Fair 2024 yang dihadiri lebih dari 50 perusahaan teknologi dan telekomunikasi terkemuka. Acara ini memberikan kesempatan mahasiswa untuk networking dan interview langsung dengan recruiter. Beberapa perusahaan yang hadir antara lain Telkom Indonesia, Gojek, Tokopedia, dan Shopee.',
                'excerpt' => 'Career Fair 2024 BEM TelU menghadirkan 50+ perusahaan top untuk mahasiswa.',
                'organization_id' => $organizations->where('name', 'BEM TelU (Badan Eksekutif Mahasiswa)')->first()->id,
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'GDSC TelU Host Workshop Cloud Computing dengan Google Engineer',
                'content' => 'Google Developer Student Club Telkom University mengadakan workshop Cloud Computing yang menghadirkan langsung engineer dari Google Cloud Platform. Workshop ini membahas Google Cloud services, serverless computing, dan best practices dalam cloud architecture. Peserta mendapat hands-on experience dengan GCP free tier.',
                'excerpt' => 'GDSC TelU adakan workshop cloud computing bersama engineer Google.',
                'organization_id' => $organizations->where('name', 'GDSC TelU (Google Developer Student Club)')->first()->id,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'TelU Choir Raih Medali Emas di Bali International Choir Festival',
                'content' => 'Paduan suara Telkom University memperoleh medali emas pada Bali International Choir Festival 2024 kategori mixed choir. Dengan membawakan lagu daerah dan karya kontemporer, TelU Choir berhasil mengalahkan 20 paduan suara dari berbagai negara. Ini adalah prestasi ke-3 mereka di tingkat internasional tahun ini.',
                'excerpt' => 'TelU Choir raih emas di kompetisi paduan suara internasional Bali.',
                'organization_id' => $organizations->where('name', 'TelU Choir')->first()->id,
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title' => 'Robotics Club TelU Lolos Final Kontes Robot Indonesia',
                'content' => 'Tim robotika Telkom University berhasil lolos ke babak final Kontes Robot Indonesia (KRI) 2024 setelah melewati tahap regional dengan skor sempurna. Robot yang mereka kembangkan dilengkapi dengan computer vision dan autonomous navigation. Final akan diselenggarakan di Jakarta bulan depan.',
                'excerpt' => 'Tim Robotics TelU lolos final KRI 2024 dengan skor sempurna.',
                'organization_id' => $organizations->where('name', 'Robotics Club TelU')->first()->id,
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'HMSI Luncurkan Platform ERP untuk UMKM Bandung',
                'content' => 'Mahasiswa Sistem Informasi melalui HMSI meluncurkan platform ERP berbasis cloud untuk membantu UMKM di Bandung mengelola bisnis mereka. Platform ini gratis dan sudah digunakan oleh 30+ UMKM. Fitur yang tersedia meliputi inventory management, financial reporting, dan sales analytics.',
                'excerpt' => 'HMSI luncurkan platform ERP gratis untuk 30+ UMKM Bandung.',
                'organization_id' => $organizations->where('name', 'HMSI (Himpunan Mahasiswa Sistem Informasi)')->first()->id,
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => 'TelU Photography Club Pamerkan Karya di Galeri Nasional',
                'content' => 'Unit kegiatan mahasiswa fotografi TelU mendapat kehormatan untuk menggelar pameran foto di Galeri Nasional Jakarta dengan tema "Digital Youth Culture". Pameran ini menampilkan 50 karya foto dari anggota klub yang mengeksplorasi kehidupan generasi digital masa kini.',
                'excerpt' => 'TelU Photography Club pameran di Galeri Nasional Jakarta.',
                'organization_id' => $organizations->where('name', 'TelU Photography Club')->first()->id,
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Entrepreneur Club TelU Bantu 5 Startup Mahasiswa Raih Funding',
                'content' => 'TelU Entrepreneur Club sukses membantu 5 startup mahasiswa mendapatkan seed funding dari angel investor dan venture capital. Total funding yang berhasil diraih mencapai 2 miliar rupiah. Startup-startup ini bergerak di bidang edtech, healthtech, dan agritech.',
                'excerpt' => '5 startup mahasiswa TelU raih funding 2M dengan bantuan Entrepreneur Club.',
                'organization_id' => $organizations->where('name', 'TelU Entrepreneur Club')->first()->id,
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'title' => 'HMTE Gelar Seminar 5G Technology and Beyond',
                'content' => 'Himpunan Mahasiswa Teknik Elektro mengadakan seminar nasional tentang teknologi 5G yang menghadirkan pakar dari Ericsson Indonesia dan Huawei. Seminar membahas implementasi 5G di Indonesia, use cases, dan peluang karir di industri telekomunikasi.',
                'excerpt' => 'Seminar 5G HMTE hadirkan pakar dari Ericsson dan Huawei.',
                'organization_id' => $organizations->where('name', 'HMTE (Himpunan Mahasiswa Teknik Elektro)')->first()->id,
                'published_at' => Carbon::now()->subDays(6),
            ],
            [
                'title' => 'Liga Mahasiswa TelU Juara Umum Kompetisi Olahraga Antar-PTN',
                'content' => 'Tim olahraga Telkom University meraih juara umum pada kompetisi olahraga antar-PTN se-Jawa Barat. TelU unggul di cabang futsal, basket, dan badminton. Prestasi ini merupakan hasil latihan rutin dan pembinaan intensif dari liga mahasiswa.',
                'excerpt' => 'TelU juara umum kompetisi olahraga antar-PTN Jawa Barat.',
                'organization_id' => $organizations->where('name', 'Liga Mahasiswa TelU')->first()->id,
                'published_at' => Carbon::now()->subDays(4),
            ],
        ];

        // Create all news with admin as author
        foreach ($newsArticles as $article) {
            News::create(array_merge($article, ['author_id' => $admin->id]));
        }
    }
}
