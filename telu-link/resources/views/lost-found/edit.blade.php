<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Laporan: {{ $lostFound->item_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('lost-found.update', $lostFound) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Nama Barang *</label>
                        <input type="text" name="item_name" value="{{ old('item_name', $lostFound->item_name) }}"
                            required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                        @error('item_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Foto Barang (Opsional)</label>
                        @if($lostFound->photo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $lostFound->photo) }}" alt="Current photo"
                                    class="h-32 w-32 object-cover rounded-lg">
                                <p class="text-sm text-gray-500">Foto saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="photo" accept="image/*"
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                        <p class="text-sm text-gray-500 mt-1">Upload foto baru (kosongkan jika tidak ingin mengubah)</p>
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Status *</label>
                        <select name="status" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                            <option value="hilang" {{ old('status', $lostFound->status) == 'hilang' ? 'selected' : '' }}>
                                Hilang</option>
                            <option value="ditemukan" {{ old('status', $lostFound->status) == 'ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                        <textarea name="description" rows="4" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">{{ old('description', $lostFound->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <input type="text" name="category" value="{{ old('category', $lostFound->category) }}"
                                class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                            @error('category')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
                            <input type="text" name="location_found"
                                value="{{ old('location_found', $lostFound->location_found) }}"
                                class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                            @error('location_found')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                        <input type="date" name="date_found"
                            value="{{ old('date_found', $lostFound->date_found ? $lostFound->date_found->format('Y-m-d') : '') }}"
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                        @error('date_found')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Kontak Person *</label>
                        <input type="text" name="contact_person"
                            value="{{ old('contact_person', $lostFound->contact_person) }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                        @error('contact_person')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold">
                            Update Laporan
                        </button>
                        <a href="{{ route('lost-found.show', $lostFound) }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>