<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Berita Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('news.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            class="w-full border-gray-300 rounded-lg">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Excerpt (Ringkasan)</label>
                        <textarea name="excerpt" rows="2"
                            class="w-full border-gray-300 rounded-lg">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Konten *</label>
                        <textarea name="content" rows="10" required
                            class="w-full border-gray-300 rounded-lg">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Organisasi</label>
                        <select name="organization_id" class="w-full border-gray-300 rounded-lg">
                            <option value="">Pilih Organisasi (Opsional)</option>
                            @foreach($organizations as $org)
                                <option value="{{ $org->id }}" {{ old('organization_id') == $org->id ? 'selected' : '' }}>
                                    {{ $org->name }}</option>
                            @endforeach
                        </select>
                        @error('organization_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 font-semibold">
                            Publikasikan Berita
                        </button>
                        <a href="{{ route('news.index') }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>