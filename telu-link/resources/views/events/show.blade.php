<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $event->title }}
            </h2>
            @if(Auth::user()->isAdmin())
                <div class="flex gap-2">
                    <a href="{{ route('events.edit', $event) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit
                    </a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="px-4 py-2 text-sm font-semibold rounded-full 
                            {{ $event->category == 'seminar' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $event->category == 'workshop' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $event->category == 'kompetisi' ? 'bg-red-100 text-red-800' : '' }}
                            {{ $event->category == 'lainnya' ? 'bg-gray-100 text-gray-800' : '' }}">
                            {{ ucfirst($event->category) }}
                        </span>
                        @if($event->event_date > now())
                            <span class="px-4 py-2 text-sm font-semibold bg-green-100 text-green-800 rounded-full">Upcoming
                                Event</span>
                        @endif
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                        <div>
                            <div class="flex items-center text-gray-700 mb-2">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <strong>Tanggal:</strong>&nbsp;{{ $event->event_date->format('d M Y, H:i') }} WIB
                            </div>
                            <div class="flex items-center text-gray-700 mb-2">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <strong>Lokasi:</strong>&nbsp;{{ $event->location }}
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center text-gray-700 mb-2">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <strong>Penyelenggara:</strong>&nbsp;{{ $event->organizer }}
                            </div>
                            @if($event->max_participants)
                                <div class="flex items-center text-gray-700 mb-2">
                                    <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <strong>Maks Peserta:</strong>&nbsp;{{ $event->max_participants }} orang
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($event->registration_deadline)
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                            <p class="text-sm">
                                <strong>Deadline Pendaftaran:</strong>
                                {{ $event->registration_deadline->format('d M Y, H:i') }} WIB
                                @if($event->registration_deadline < now())
                                    <span class="text-red-600 font-semibold">(Sudah Ditutup)</span>
                                @endif
                            </p>
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-xl font-bold mb-3">Deskripsi</h3>
                        <p class="text-gray-700 whitespace-pre-line">{{ $event->description }}</p>
                    </div>

                    @if($event->contact_info)
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-700">
                                <strong>Kontak:</strong> {{ $event->contact_info }}
                            </p>
                        </div>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('events.index') }}"
                            class="inline-block bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                            ← Kembali ke Daftar Event
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>