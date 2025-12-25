<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Event Kampus
            </h2>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('events.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    + Tambah Event
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Filter --}}
            <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                <form method="GET" action="{{ route('events.index') }}" class="flex gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Filter Kategori</label>
                        <select name="category" class="w-full border-gray-300 rounded-lg">
                            <option value="">Semua Kategori</option>
                            <option value="seminar" {{ request('category') == 'seminar' ? 'selected' : '' }}>Seminar
                            </option>
                            <option value="workshop" {{ request('category') == 'workshop' ? 'selected' : '' }}>Workshop
                            </option>
                            <option value="kompetisi" {{ request('category') == 'kompetisi' ? 'selected' : '' }}>Kompetisi
                            </option>
                            <option value="lainnya" {{ request('category') == 'lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                        Filter
                    </button>
                    <a href="{{ route('events.index') }}"
                        class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 flex items-center justify-center">
                        Reset
                    </a>
                </form>
            </div>

            {{-- Events Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events as $event)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full 
                                                                                        {{ $event->category == 'seminar' ? 'bg-blue-100 text-blue-800' : '' }}
                                                                                        {{ $event->category == 'workshop' ? 'bg-green-100 text-green-800' : '' }}
                                                                                        {{ $event->category == 'kompetisi' ? 'bg-red-100 text-red-800' : '' }}
                                                                                        {{ $event->category == 'lainnya' ? 'bg-gray-100 text-gray-800' : '' }}">
                                    {{ ucfirst($event->category) }}
                                </span>
                                @if($event->event_date > now())
                                    <span class="text-xs text-green-600 font-semibold">Upcoming</span>
                                @else
                                    <span class="text-xs text-gray-500">Past Event</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg mb-2 text-gray-900">{{ $event->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($event->description, 100) }}
                            </p>
                            <div class="space-y-2 text-sm text-gray-700">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $event->event_date->format('d M Y, H:i') }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $event->location }}
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('events.show', $event) }}"
                                    class="block text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Belum ada event.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-app-layout>