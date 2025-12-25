# TelU-Link - Sistem Informasi Kampus Telkom University

## 📖 Overview Project

**TelU-Link** adalah sistem informasi kampus terpadu berbasis web yang dirancang khusus untuk Telkom University. Platform ini menyediakan akses mudah ke informasi kampus dalam satu tempat yang distraction-free, clean, dan user-friendly.

### Fitur Utama

1. **Event Kampus** - Informasi lengkap tentang seminar, workshop, kompetisi, dan acara kampus lainnya (PJ: Dhifulloh)
2. **Info Akademik & Beasiswa** - Database beasiswa dan kompetisi nasional/internasional (PJ: Dhifulloh)
3. **Lost & Found** - Sistem pelaporan barang hilang dan ditemukan di kampus (PJ: Sidik)
4. **Berita & Organisasi** - Portal berita kegiatan UKM, Himpunan, dan BEM (PJ: Dea)
5. **Forum Diskusi** - Platform tanya jawab mahasiswa dengan fitur "Solved" (PJ: Kresna)

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11 (Pure Monolith)
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze (Blade version)
- **PHP Version**: 8.2+
- **Node.js**: v18+ (untuk Vite)

---

## 📋 Prerequisites

Sebelum instalasi, pastikan sudah terinstall:
- PHP 8.2 atau lebih baru
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Git

---

## 🚀 Instalasi

### 1. Clone Repository
```bash
cd E:\Folder Kuliah\Semester 7\WAD\TUBES\TUBES-WAD-TELU-LINK
cd telu-link
```

###  2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
```bash
# Copy file .env.example menjadi .env
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=telu_link
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru di MySQL:
```sql
CREATE DATABASE telu_link;
```

### 5. Jalankan Migration & Seeder
```bash
php artisan migrate:fresh --seed
```

Command ini akan:
- Membuat semua tabel database
- Mengisi database dengan data dummy yang realistis (4 users tim, 12 events, 11 academic info, 15 lost/found items, 10 organizations, 10 news, 10 forum Q&A)

### 6. Build Assets
```bash
npm run dev
```

Untuk production:
```bash
npm run build
```

### 7. Jalankan Server
Buka terminal baru dan jalankan:
```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://127.0.0.1:8000`

---

## 👥 Default User Credentials

### Admin (Full Access)
- **Email**: `admin@telkomuniversity.ac.id`
- **Password**: `password`
- **Nama**: Admin TelU
- **Capabilities**: 
  - CRUD Event Kampus
  - CRUD Info Akademik & Beasiswa
  - CRUD Berita & Organisasi
  - Delete semua Lost & Found
  - Delete semua Forum posts

### Mahasiswa (Limited Access)
**Sidik Indra Prayoga**
- **Email**: `sidik@student.telkomuniversity.ac.id`
- **Password**: `password`
- **Capabilities**: View Event/Academic/News, CRUD own Lost & Found, CRUD own Forum posts

**Dea Gina Dewi Sihotang**
- **Email**: `dea@student.telkomuniversity.ac.id`
- **Password**: `password`

**Kresna Pebriawan**
- **Email**: `kresna@student.telkomuniversity.ac.id`
- **Password**: `password`

**Note**: 
- New users can be registered ONLY by admin
- All users can view: Events, Academic Info, News
- All users can fully manage: Lost & Found (own posts), Forum (own posts)
- Only admin can create/edit/delete: Events, Academic Info, News

---

## 📁 Struktur File Penting

```
telu-link/
├── app/
│   ├── Http/Controllers/          # Controllers untuk setiap modul
│   │   ├── DashboardController.php
│   │   ├── EventController.php
│   │   ├── AcademicInfoController.php
│   │   ├── LostFoundController.php
│   │   ├── NewsController.php
│   │   ├── OrganizationController.php
│   │   └── ForumController.php
│   └── Models/                     # Eloquent Models
│       ├── User.php
│       ├── Event.php
│       ├── AcademicInfo.php
│       ├── LostFound.php
│       ├── Organization.php
│       ├── News.php
│       ├── ForumQuestion.php
│       └── ForumAnswer.php
├── database/
│   ├── migrations/                 # Database schema
│   └── seeders/                    # Data dummy
│       ├── UserSeeder.php
│       ├── EventSeeder.php
│       ├── AcademicInfoSeeder.php
│       ├── LostFoundSeeder.php
│       ├── OrganizationSeeder.php
│       ├── NewsSeeder.php
│       └── ForumSeeder.php
├── resources/views/                # Blade Templates
│   ├── dashboard.blade.php         # Dashboard utama
│   ├── events/                     # Views untuk Event Kampus
│   ├── academic-info/              # Views untuk Info Akademik
│   ├── lost-found/                 # Views untuk Lost & Found
│   ├── news/                       # Views untuk Berita
│   ├── organizations/              # Views untuk Organisasi
│   └── forum/                      # Views untuk Forum
└── routes/
    └── web.php                     # Route definitions
```

---

## 🎯 Panduan Penggunaan Fitur

### 1. Event Kampus
**Mengakses**: Dashboard → Click card "Event Kampus" atau `/events`

**Fitur:**
- List semua event kampus (seminar, workshop, kompetisi)
- Filter berdasarkan kategori
- Detail event dengan informasi lengkap (tanggal, lokasi, pendaftar, kontak)
- **Admin**: Dapat create, edit, delete event

**Cara Membuat Event (Admin):**
1. Login sebagai admin
2. Buka halaman Events
3. Click "Create New Event"
4. Isi form (title, description, category, location, date, dll)
5. Submit

### 2. Info Akademik (Beasiswa & Kompetisi)
**Mengakses**: Dashboard → "Info Akademik" atau `/academic-info`

**Fitur:**
- Tab interface: Beasiswa | Kompetisi
- Deadline dengan color coding (merah = mendesak, kuning = < 1 bulan, hijau = > 1 bulan)
- Link eksternal ke submission form
- Requirements lengkap

### 3. Lost & Found
**Mengakses**: Dashboard → "Lost & Found" atau `/lost-found`

**Fitur:**
- Gallery grid view barang hilang & ditemukan
- Status badge: **Hilang** (merah) | **Ditemukan** (hijau)
- Category tags
- Contact person untuk konfirmasi
- **Mahasiswa**: Dapat submit laporan barang

### 4. Berita & Organisasi
**Mengakses**: Dashboard → "Berita & Organisasi" atau `/news` `/organizations`

**Fitur:**
- **News**: Feed berita kegiatan organisasi, sorted by latest
- **Organizations**: Profil lengkap UKM, Himpunan, BEM (logo, description, contact, Instagram)
- Link ke news terkait organisasi

### 5. Forum Diskusi
**Mengakses**: Dashboard → "Forum Diskusi" atau `/forum`

**Fitur:**
- Post pertanyaan dengan kategori (Akademik / Umum / Teknis)
- Reply/jawab pertanyaan orang lain
- Mark question as "Solved" (hanya pemilik pertanyaan)
- Badge "Solved" untuk pertanyaan yang sudah terjawab
- Voting untuk best answer

---

## 🎨 Alur Aplikasi

### Flow Mahasiswa:
1. **Register** akun baru dengan mengisi: Nama, Email, NIM, Jurusan, No. Telepon, dan Password
2. Login → Redirect ke Dashboard
3. Dashboard menampilkan:
   - 5 module cards (Events, Academic Info, Lost & Found, News, Forum) 
   - Quick access: Upcoming events, Latest news
4. Navigate ke modul yang diinginkan
5. View data, submit report (Lost & Found), post question (Forum)

### Flow Admin:
1. Login dengan kredensial admin
2. Dashboard yang sama dengan tambahan akses CRUD
3. Bisa membuat, edit, delete di semua modul:
   - Events
   - Academic Info
   - News (as author)
4. Moderasi konten dari mahasiswa (Lost & Found, Forum)

---

## 🗃️ Database Schema

### Tabel Utama:
1. **users** - User authentication + role (admin/mahasiswa) + NIM, jurusan, phone
2. **events** - Event kampus dengan kategori, location, tanggal
3. **academic_info** - Beasiswa & kompetisi dengan deadline
4. **lost_found** - Barang hilang/ditemukan dengan status dan lokasi
5. **organizations** - Profile organisasi kampus
6. **news** - Artikel berita linked ke organizations
7. **forum_questions** - Pertanyaan dengan kategori dan status solved
8. **forum_answers** - Jawaban untuk pertanyaan, dengan best answer flag

### Relationships:
- User → Event (creator)
- User → AcademicInfo (creator)
- User → LostFound
- User → News (author)
- User → ForumQuestion
- User → ForumAnswer
- Organization → News (one-to-many)
- ForumQuestion → ForumAnswer (one-to-many)

---

## 🐛 Troubleshooting

### Error "SQLSTATE[HY000] [2002]"
**Solusi**: Pastikan MySQL service sudah berjalan
```bash
# Windows: Buka Services → Start MySQL
# Atau restart:
net stop MySQL80
net start MySQL80
```

### Error "npm run dev" tidak berjalan
**Solusi**: 
```bash
npm install --force
npm run dev
```

### Error Migration: "Table already exists"
**Solusi**:
```bash
php artisan migrate:fresh --seed
```

### Lupa Password Admin
**Solusi**: Jalankan ulang seeder atau reset manual via tinker:
```bash
php artisan tinker
>>> $admin = \App\Models\User::where('email', 'admin@telu.ac.id')->first();
>>> $admin->password = \Hash::make('password');
>>> $admin->save();
```

---

## 🔧 Development Notes

### Menambah User Baru (Manual)
```bash
php artisan tinker
>>> \App\Models\User::create([
    'name' => 'Nama Lengkap',
    'email' => 'email@student.telkomuniversity.ac.id',
    'password' => \Hash::make('password'),
    'role' => 'mahasiswa',
    'nim' => '1301210099',
    'jurusan' => 'Teknik Informatika',
    'phone' => '08123456789'
]);
```

### Melihat Semua Routes
```bash
php artisan route:list
```

### Clear Cache (jika ada masalah)
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## 📝 Catatan Penting

1. **Data Seeder**: Semua data dummy menggunakan konteks Telkom University (lokasi GKU, FIF, Bangkit, dll) dan nama Indonesia
2. **Authentication**: Menggunakan Laravel Breeze default dengan tambahan field role, NIM, jurusan
3. **Authorization**: Belum implement middleware untuk memisahkan akses admin/mahasiswa di semua fitur (masih basic auth)
4. **File Upload**: Backend siap untuk upload gambar (poster_image, logo, dll) tapi form view belum implement upload
5. **Responsive Design**: Dashboard sudah responsive, tapi detail pages perlu penyesuaian lebih lanjut
6. **API**: Belum ada REST API, murni server-side rendering dengan Blade

---

## 🚀 Pengembangan Selanjutnya

Fitur yang bisa ditambahkan:
- [ ] Implementasi upload gambar untuk poster event dan logo organisasi
- [ ] Middleware role-based access control yang lebih ketat
- [ ] Notification system untuk event registration
- [ ] Advanced search & filter di semua modul
- [ ] Dashboard analytics untuk admin
- [ ] Export data ke PDF/Excel
- [ ] Integration dengan API kampus (jika ada)
- [ ] Real-time chat untuk Forum
- [ ] Email verification untuk registrasi

---

## 👨‍💻 Developer

**Developed for**: Telkom University - Web Application Development Course

**Tech Stack**: Laravel 11, Blade, Tailwind CSS, MySQL

**Year**: 2025

---

## 📄 License

This project is for educational purposes only.

---

Untuk pertanyaan atau masalah, silakan hubungi admin TelU-Link atau buka Issue di repository.

**Selamat menggunakan TelU-Link! 🎓🚀**
