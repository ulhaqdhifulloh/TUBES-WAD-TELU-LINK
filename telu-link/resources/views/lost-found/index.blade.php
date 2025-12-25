<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lost & Found
            </h2>
            <a href="{{ route('lost-found.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                + Tambah Laporan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Filter --}}
            <div class="flex gap-4 mb-6">
                <a href="{{ route('lost-found.index') }}"
                    class="px-6 py-3 rounded-lg shadow-md transition {{ !request('status') ? 'bg-gray-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Semua
                </a>
                <a href="{{ route('lost-found.index', ['status' => 'hilang']) }}"
                    class="px-6 py-3 rounded-lg shadow-md transition {{ request('status') == 'hilang' ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Hilang
                </a>
                <a href="{{ route('lost-found.index', ['status' => 'ditemukan']) }}"
                    class="px-6 py-3 rounded-lg shadow-md transition {{ request('status') == 'ditemukan' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Ditemukan
                </a>
            </div>

            {{-- Gallery Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($items as $item)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full {{ $item->status == 'hilang' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                                @if($item->is_claimed)
                                    <span class="text-xs text-gray-500">Claimed</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg mb-2">{{ $item->item_name }}</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $item->description }}</p>
                            <div class="text-sm text-gray-700 space-y-1">
                                @if($item->category)
                                    <p><strong>Kategori:</strong> {{ $item->category }}</p>
                                @endif
                                @if($item->location_found)
                                    <p><strong>Lokasi:</strong> {{ $item->location_found }}</p>
                                @endif
                                <p><strong>Kontak:</strong> {{ $item->contact_person }}</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('lost-found.show', $item) }}"
                                    class="block text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white rounded-lg shadow-md p-12 text-center">
                        <p class="text-gray-500">Belum ada data.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</x-app-layout>