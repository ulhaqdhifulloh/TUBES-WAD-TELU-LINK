<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $lostFound->item_name }}
            </h2>
            <div class="flex gap-2">
                @if($lostFound->user_id === Auth::id())
                    {{-- Only owner can edit --}}
                    <a href="{{ route('lost-found.edit', $lostFound) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit
                    </a>
                @endif

                @if($lostFound->user_id === Auth::id() || Auth::user()->isAdmin())
                    {{-- Owner or admin can delete --}}
                    <form action="{{ route('lost-found.destroy', $lostFound) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                {{-- Photo Display --}}
                @if($lostFound->photo)
                    <div class="w-full h-96 overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $lostFound->photo) }}" alt="{{ $lostFound->item_name }}"
                            class="w-full h-full object-contain">
                    </div>
                @endif

                <div class="p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="px-4 py-2 text-sm font-semibold rounded-full {{ $lostFound->status == 'hilang' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($lostFound->status) }}
                        </span>
                        @if($lostFound->is_claimed)
                            <span class="px-4 py-2 text-sm font-semibold bg-gray-100 text-gray-800 rounded-full">
                                Sudah Diclaim
                            </span>
                        @endif
                    </div>

                    <h1 class="text-3xl font-bold mb-6">{{ $lostFound->item_name }}</h1>

                    <div class="bg-gray-50 p-6 rounded-lg mb-6 grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Kategori</p>
                            <p class="font-semibold">{{ $lostFound->category ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Lokasi Ditemukan</p>
                            <p class="font-semibold">{{ $lostFound->location_found ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Tanggal</p>
                            <p class="font-semibold">
                                {{ $lostFound->date_found ? $lostFound->date_found->format('d M Y') : '-' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Kontak</p>
                            <p class="font-semibold">{{ $lostFound->contact_person }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-bold mb-3">Deskripsi</h3>
                        <p class="text-gray-700 whitespace-pre-line">{{ $lostFound->description }}</p>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <p class="text-sm">
                            <strong>Dilaporkan oleh:</strong> {{ $lostFound->user->name }}
                        </p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('lost-found.index') }}"
                            class="inline-block bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                            ← Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>