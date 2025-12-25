# TelU-Link - Sistem Informasi Kampus Telkom University

## 📖 Overview Project

**TelU-Link** adalah sistem informasi kampus terpadu berbasis web yang dirancang khusus untuk Telkom University. Platform ini menyediakan akses mudah ke informasi kampus dalam satu tempat yang distraction-free, clean, dan user-friendly.

### Fitur Utama

1. **Event Kampus** - Informasi lengkap tentang seminar, workshop, kompetisi, dan acara kampus lainnya 
2. **Info Akademik & Beasiswa** - Database beasiswa dan kompetisi nasional/internasional 
3. **Lost & Found** - Sistem pelaporan barang hilang dan ditemukan di kampus 
4. **Berita & Organisasi** - Portal berita kegiatan UKM, Himpunan, dan BEM 
5. **Forum Diskusi** - Platform tanya jawab mahasiswa dengan fitur "Solved"

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
cd ..\TUBES-WAD-TELU-LINK
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
  - Full CRUD untuk Event Kampus
  - Full CRUD untuk Info Akademik & Beasiswa
  - Full CRUD untuk Berita & Organisasi
  - Delete semua Lost & Found items (tidak bisa edit)
  - Delete semua Forum questions & answers (tidak bisa edit)
  - Register new user accounts (via Registration menu)

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
- New users can be registered ONLY by admin through "Registration" menu
- All users can view: Events, Academic Info, News, Organizations
- All users can fully manage their own posts: Lost & Found, Forum (create, edit, delete)
- All users can answer/comment on any forum questions
- Only admin can create/edit/delete: Events, Academic Info, News
- Admin can delete (but not edit) any Lost & Found items and Forum posts

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
2. **Authentication**: Menggunakan Laravel Breeze dengan role-based authorization (admin/mahasiswa)
3. **Authorization**: 
   - Admin: Full CRUD untuk Events, Academic Info, News
   - Mahasiswa: Full CRUD untuk Lost & Found (own posts), Forum (own posts)
   - Admin dapat delete semua forum answers dan lost & found items
4. **File Upload**: 
   - Lost & Found: Foto barang (optional)
   - Profile: Foto profil (optional)
   - Storage symlink sudah dibuat otomatis
5. **API Integration**: Public Holiday API Indonesia untuk menampilkan tanggal merah di dashboard
6. **Forum Features**:
   - Semua user bisa bertanya dan menjawab
   - Owner bisa mark pertanyaan sebagai "Solved"
   - Inline edit untuk answer (Alpine.js)
   - Owner bisa edit/delete jawaban sendiri
   - Admin bisa delete semua jawaban

---

## 👨‍💻 Developer

**Developed for**: Telkom University - Web Application Development Course

**Tech Stack**: Laravel 11, Blade Templates, Tailwind CSS, Alpine.js, MySQL

**Features**:
- ✅ Complete CRUD for all 5 modules
- ✅ Role-based authorization (Admin/Mahasiswa)  
- ✅ File upload (Lost & Found photos, Profile photos)
- ✅ API Integration (Indonesia Public Holidays)
- ✅ Responsive design
- ✅ Real-time notifications
- ✅ Security best practices (APP_KEY, .gitignore)

**Year**: 2025

---

## 📄 License

This project is for educational purposes only.

---

Untuk pertanyaan atau masalah, silakan hubungi admin TelU-Link atau buka Issue di repository.

**Selamat menggunakan TelU-Link! 🎓🚀**