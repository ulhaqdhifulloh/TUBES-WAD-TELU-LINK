<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelU-Link - Sistem Informasi Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo-telu-link.png') }}" alt="TelU-Link Logo" class="h-10 w-auto">
                    <span class="ml-3 text-xl font-bold text-red-600">TelU-Link</span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 font-medium">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-red-600 to-red-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">Selamat Datang di TelU-Link</h1>
            <p class="text-xl mb-8 opacity-90">Pusat Informasi Kampus Telkom University</p>
            <p class="text-lg mb-10 max-w-3xl mx-auto">Platform terpadu untuk mengakses informasi event, beasiswa, lost
                & found, berita kampus, dan forum diskusi dalam satu tempat yang distraction-free.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-8 py-3 bg-white text-red-600 rounded-lg font-semibold hover:bg-gray-100 transition">Login
                    Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">5 Fitur Utama TelU-Link</h2>
                <p class="text-gray-600">Semua informasi kampus dalam satu platform</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Event Kampus -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Event Kampus</h3>
                    <p class="text-gray-600">Informasi lengkap tentang seminar, workshop, dan kompetisi kampus.</p>
                </div>

                <!-- Info Akademik -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Info Akademik & Beasiswa</h3>
                    <p class="text-gray-600">Database beasiswa dan kompetisi nasional & internasional.</p>
                </div>

                <!-- Lost & Found -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Lost & Found</h3>
                    <p class="text-gray-600">Sistem pelaporan barang hilang dan ditemukan di kampus.</p>
                </div>

                <!-- Berita & Organisasi -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Berita & Organisasi</h3>
                    <p class="text-gray-600">Portal berita kegiatan UKM, Himpunan, dan BEM.</p>
                </div>

                <!-- Forum Diskusi -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Forum Diskusi</h3>
                    <p class="text-gray-600">Platform tanya jawab mahasiswa dengan fitur "Solved".</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Siap Memulai?</h2>
            <p class="text-gray-600 mb-8">Login untuk mengakses semua fitur TelU-Link</p>
            <a href="{{ route('login') }}"
                class="px-8 py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition inline-block">Login
                Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2025 TelU-Link - Telkom University. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>