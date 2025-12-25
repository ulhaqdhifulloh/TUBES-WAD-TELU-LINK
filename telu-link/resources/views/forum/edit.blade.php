<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pertanyaan: {{ $forum->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('forum.update', $forum) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Kategori *</label>
                        <select name="category" required
                            class="w-full border-gray-300 rounded-lg focus:border-yellow-500 focus:ring-yellow-500">
                            <option value="akademik" {{ old('category', $forum->category) == 'akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="umum" {{ old('category', $forum->category) == 'umum' ? 'selected' : '' }}>Umum
                            </option>
                            <option value="teknis" {{ old('category', $forum->category) == 'teknis' ? 'selected' : '' }}>
                                Teknis</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul Pertanyaan *</label>
                        <input type="text" name="title" value="{{ old('title', $forum->title) }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-yellow-500 focus:ring-yellow-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Detail Pertanyaan *</label>
                        <textarea name="content" rows="8" required
                            class="w-full border-gray-300 rounded-lg focus:border-yellow-500 focus:ring-yellow-500">{{ old('content', $forum->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Solved/Open Toggle -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_solved" value="1" {{ $forum->is_solved ? 'checked' : '' }}
                                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                            <span class="ml-2 text-sm text-gray-700">
                                <strong>Tandai sebagai Solved</strong> - Centang jika pertanyaan ini sudah terjawab
                            </span>
                        </label>
                        <p class="text-xs text-gray-500 mt-1">Status ini akan ditampilkan sebagai badge pada pertanyaan
                            Anda</p>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold">
                            Update Pertanyaan
                        </button>
                        <a href="{{ route('forum.show', $forum) }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>