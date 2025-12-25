<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard TelU-Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-lg shadow-lg p-8 mb-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Selamat Datang di TelU-Link</h1>
                <p class="text-lg opacity-90">Pusat Informasi Kampus Telkom University</p>
                <p class="mt-4 text-sm">Logged in as: <span class="font-semibold">{{ Auth::user()->name }}</span> |
                    Role: <span class="font-semibold uppercase">{{ Auth::user()->role }}</span></p>
            </div>

            {{-- Module Cards - 5 Fitur Utama --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                {{-- Event Kampus Card --}}
                <a href="{{ route('events.index') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 hover:bg-red-50">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Event Kampus</h3>
                            <p class="text-sm text-gray-600">Seminar, Workshop, Kompetisi</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">Lihat dan daftar event kampus terbaru.</p>
                </a>

                {{-- Info Akademik Card --}}
                <a href="{{ route('academic-info.index') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 hover:bg-blue-50">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Info Akademik</h3>
                            <p class="text-sm text-gray-600">Beasiswa & Kompetisi</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">Informasi beasiswa dan kompetisi nasional.</p>
                </a>

                {{-- Lost & Found Card --}}
                <a href="{{ route('lost-found.index') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 hover:bg-green-50">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Lost & Found</h3>
                            <p class="text-sm text-gray-600">Barang Hilang & Ditemukan</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">Laporkan atau cari barang hilang.</p>
                </a>

                {{-- Berita & Organisasi Card --}}
                <a href="{{ route('news.index') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 hover:bg-purple-50">
                    <div class="flex items-center mb-4">
                        <div class="bg-purple-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Berita & Organisasi</h3>
                            <p class="text-sm text-gray-600">UKM, Himpunan, BEM</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">Berita kegiatan organisasi kampus.</p>
                </a>

                {{-- Forum Diskusi Card --}}
                <a href="{{ route('forum.index') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 hover:bg-yellow-50">
                    <div class="flex items-center mb-4">
                        <div class="bg-yellow-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Forum Diskusi</h3>
                            <p class="text-sm text-gray-600">Tanya Jawab Mahasiswa</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">Bertanya dan berbagi solusi.</p>
                </a>
            </div>

            {{-- Quick Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Upcoming Events --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="font-bold text-lg mb-4 text-gray-800">Event Mendatang</h3>
                    @if($upcomingEvents->count() > 0)
                        <div class="space-y-3">
                            @foreach($upcomingEvents as $event)
                                <div class="border-l-4 border-red-500 pl-4 py-2">
                                    <a href="{{ route('events.show', $event) }}"
                                        class="font-semibold text-gray-800 hover:text-red-600">{{ $event->title }}</a>
                                    <p class="text-sm text-gray-600">{{ $event->event_date->format('d M Y, H:i') }} |
                                        {{ $event->location }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada event mendatang.</p>
                    @endif
                </div>

                {{-- Latest News --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="font-bold text-lg mb-4 text-gray-800">Berita Terbaru</h3>
                    @if($latestNews->count() > 0)
                        <div class="space-y-3">
                            @foreach($latestNews as $news)
                                <div class="border-l-4 border-purple-500 pl-4 py-2">
                                    <a href="{{ route('news.show', $news) }}"
                                        class="font-semibold text-gray-800 hover:text-purple-600">{{ $news->title }}</a>
                                    <p class="text-sm text-gray-600">{{ $news->organization->name ?? 'TelU' }} |
                                        {{ $news->published_at->diffForHumans() }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada berita terbaru.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>