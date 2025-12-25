<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $academicInfo->title }}
            </h2>
            @if(Auth::user()->isAdmin())
                <div class="flex gap-2">
                    <a href="{{ route('academic-info.edit', $academicInfo) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit
                    </a>
                    <form action="{{ route('academic-info.destroy', $academicInfo) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus info ini?')">
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
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex items-center gap-3 mb-6">
                    <span
                        class="px-4 py-2 text-sm font-semibold rounded-full {{ $academicInfo->type == 'beasiswa' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                        {{ ucfirst($academicInfo->type) }}
                    </span>
                    @if($academicInfo->deadline >= now())
                        <span class="px-4 py-2 text-sm font-semibold bg-green-100 text-green-800 rounded-full">Masih
                            Dibuka</span>
                    @else
                        <span class="px-4 py-2 text-sm font-semibold bg-red-100 text-red-800 rounded-full">Sudah
                            Ditutup</span>
                    @endif
                </div>

                <h1 class="text-3xl font-bold mb-4">{{ $academicInfo->title }}</h1>

                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Provider</p>
                            <p class="font-semibold">{{ $academicInfo->provider }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Deadline</p>
                            <p class="font-semibold">{{ $academicInfo->deadline->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-bold mb-3">Deskripsi</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $academicInfo->description }}</p>
                </div>

                @if($academicInfo->requirements)
                    <div class="mb-6">
                        <h3 class="text-xl font-bold mb-3">Requirements</h3>
                        <p class="text-gray-700 whitespace-pre-line">{{ $academicInfo->requirements }}</p>
                    </div>
                @endif

                @if($academicInfo->link)
                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <a href="{{ $academicInfo->link }}" target="_blank"
                            class="text-blue-600 hover:text-blue-800 font-semibold">
                            → Link Pendaftaran
                        </a>
                    </div>
                @endif

                <a href="{{ route('academic-info.index') }}"
                    class="inline-block bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>