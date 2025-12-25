<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Info: {{ $academicInfo->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('academic-info.update', $academicInfo) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Tipe *</label>
                        <select name="type" required class="w-full border-gray-300 rounded-lg">
                            <option value="beasiswa" {{ old('type', $academicInfo->type) == 'beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                            <option value="kompetisi" {{ old('type', $academicInfo->type) == 'kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul *</label>
                        <input type="text" name="title" value="{{ old('title', $academicInfo->title) }}" required
                            class="w-full border-gray-300 rounded-lg">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                        <textarea name="description" rows="5" required
                            class="w-full border-gray-300 rounded-lg">{{ old('description', $academicInfo->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Penyedia *</label>
                            <input type="text" name="provider" value="{{ old('provider', $academicInfo->provider) }}"
                                required class="w-full border-gray-300 rounded-lg">
                            @error('provider')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Deadline *</label>
                            <input type="date" name="deadline"
                                value="{{ old('deadline', $academicInfo->deadline->format('Y-m-d')) }}" required
                                class="w-full border-gray-300 rounded-lg">
                            @error('deadline')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Persyaratan</label>
                        <textarea name="requirements" rows="4"
                            class="w-full border-gray-300 rounded-lg">{{ old('requirements', $academicInfo->requirements) }}</textarea>
                        @error('requirements')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Link</label>
                        <input type="url" name="link" value="{{ old('link', $academicInfo->link) }}"
                            class="w-full border-gray-300 rounded-lg">
                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                            Update Info
                        </button>
                        <a href="{{ route('academic-info.show', $academicInfo) }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>