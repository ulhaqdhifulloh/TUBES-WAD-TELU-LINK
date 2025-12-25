<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Info Akademik & Beasiswa
            </h2>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('academic-info.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Info
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Tabs --}}
            <div class="flex gap-4 mb-6">
                <a href="{{ route('academic-info.index') }}"
                    class="px-6 py-3 rounded-lg shadow-md transition {{ !request('type') ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Semua
                </a>
                <a href="{{ route('academic-info.index', ['type' => 'beasiswa']) }}"
                    class="px-6 py-3 rounded-lg shadow-md transition {{ request('type') == 'beasiswa' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Beasiswa
                </a>
                <a href="{{ route('academic-info.index', ['type' => 'kompetisi']) }}"
                    class="px-6 py-3 rounded-lg shadow-md transition {{ request('type') == 'kompetisi' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Kompetisi
                </a>
            </div>

            {{-- List --}}
            <div class="space-y-4">
                @forelse($academicInfo as $info)
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full {{ $info->type == 'beasiswa' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($info->type) }}
                                    </span>
                                    @php
                                        $daysLeft = (int) now()->diffInDays($info->deadline, false);
                                    @endphp
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full
                                                    {{ $daysLeft < 7 ? 'bg-red-100 text-red-800' : ($daysLeft < 30 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                        @if($daysLeft < 0)
                                            Sudah Ditutup
                                        @else
                                            {{ $daysLeft }} hari lagi
                                        @endif
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $info->title }}</h3>
                                <p class="text-gray-600 mb-3">{{ Str::limit($info->description, 150) }}</p>
                                <div class="text-sm text-gray-700">
                                    <p><strong>Provider:</strong> {{ $info->provider }}</p>
                                    <p><strong>Deadline:</strong> {{ $info->deadline->format('d M Y') }}</p>
                                </div>
                            </div>
                            <a href="{{ route('academic-info.show', $info) }}"
                                class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 whitespace-nowrap">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow-md p-12 text-center">
                        <p class="text-gray-500">Belum ada data.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $academicInfo->links() }}
            </div>
        </div>
    </div>
</x-app-layout>