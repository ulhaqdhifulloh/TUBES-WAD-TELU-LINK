<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Lost & Found
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('lost-found.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Nama Barang *</label>
                        <input type="text" name="item_name" value="{{ old('item_name') }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500"
                            placeholder="Contoh: Dompet Hitam">
                        @error('item_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Foto Barang (Opsional)</label>
                        <input type="file" name="photo" accept="image/*"
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                        <p class="text-sm text-gray-500 mt-1">Upload foto barang untuk mempermudah identifikasi</p>
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Status *</label>
                        <select name="status" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                            <option value="hilang" {{ old('status') == 'hilang' ? 'selected' : '' }}>Hilang</option>
                            <option value="ditemukan" {{ old('status') == 'ditemukan' ? 'selected' : '' }}>Ditemukan
                            </option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                        <textarea name="description" rows="4" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500"
                            placeholder="Jelaskan detail barang...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <input type="text" name="category" value="{{ old('category') }}"
                                class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500"
                                placeholder="Contoh: Elektronik, Aksesoris">
                            @error('category')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Lokasi Ditemukan/Hilang</label>
                            <input type="text" name="location_found" value="{{ old('location_found') }}"
                                class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500"
                                placeholder="Contoh: Perpustakaan">
                            @error('location_found')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                        <input type="date" name="date_found" value="{{ old('date_found') }}"
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500">
                        @error('date_found')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Kontak Person *</label>
                        <input type="text" name="contact_person" value="{{ old('contact_person') }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500"
                            placeholder="Email/Telepon">
                        @error('contact_person')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold">
                            Simpan Laporan
                        </button>
                        <a href="{{ route('lost-found.index') }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>