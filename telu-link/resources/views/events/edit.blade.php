<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Event: {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('events.update', $event) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul Event *</label>
                        <input type="text" name="title" value="{{ old('title', $event->title) }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Kategori *</label>
                        <select name="category" required
                            class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                            <option value="seminar" {{ old('category', $event->category) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="workshop" {{ old('category', $event->category) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="kompetisi" {{ old('category', $event->category) == 'kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                            <option value="lainnya" {{ old('category', $event->category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                        <textarea name="description" rows="5" required
                            class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">{{ old('description', $event->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Event *</label>
                            <input type="datetime-local" name="event_date"
                                value="{{ old('event_date', $event->event_date->format('Y-m-d\TH:i')) }}" required
                                class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                            @error('event_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Deadline Registrasi</label>
                            <input type="datetime-local" name="registration_deadline"
                                value="{{ old('registration_deadline', $event->registration_deadline ? $event->registration_deadline->format('Y-m-d\TH:i') : '') }}"
                                class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                            @error('registration_deadline')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Lokasi *</label>
                        <input type="text" name="location" value="{{ old('location', $event->location) }}" required
                            class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Penyelenggara *</label>
                            <input type="text" name="organizer" value="{{ old('organizer', $event->organizer) }}"
                                required
                                class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                            @error('organizer')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Kontak Info</label>
                            <input type="text" name="contact_info"
                                value="{{ old('contact_info', $event->contact_info) }}"
                                class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                            @error('contact_info')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Maksimal Peserta</label>
                        <input type="number" name="max_participants"
                            value="{{ old('max_participants', $event->max_participants) }}"
                            class="w-full border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500">
                        @error('max_participants')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 font-semibold">
                            Update Event
                        </button>
                        <a href="{{ route('events.show', $event) }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>