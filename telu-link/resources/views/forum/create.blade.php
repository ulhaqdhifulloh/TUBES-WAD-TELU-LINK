<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Pertanyaan Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('forum.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Kategori *</label>
                        <select name="category" required
                            class="w-full border-gray-300 rounded-lg focus:border-yellow-500 focus:ring-yellow-500">
                            <option value="akademik" {{ old('category') == 'akademik' ? 'selected' : '' }}>Akademik
                            </option>
                            <option value="umum" {{ old('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="teknis" {{ old('category') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul Pertanyaan *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-yellow-500 focus:ring-yellow-500"
                            placeholder="Tulis judul yang jelas dan deskriptif">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Detail Pertanyaan *</label>
                        <textarea name="content" rows="8" required
                            class="w-full border-gray-300 rounded-lg focus:border-yellow-500 focus:ring-yellow-500"
                            placeholder="Jelaskan pertanyaan Anda secara detail...">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold">
                            Posting Pertanyaan
                        </button>
                        <a href="{{ route('forum.index') }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>