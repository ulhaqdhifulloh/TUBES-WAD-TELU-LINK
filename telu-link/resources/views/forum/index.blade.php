<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Forum Diskusi
            </h2>
            <a href="{{ route('forum.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                + Buat Pertanyaan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Filter --}}
            <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                <form method="GET" class="flex gap-4">
                    <select name="category" class="border-gray-300 rounded-lg">
                        <option value="">Semua Kategori</option>
                        <option value="akademik" {{ request('category') == 'akademik' ? 'selected' : '' }}>Akademik
                        </option>
                        <option value="umum" {{ request('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="teknis" {{ request('category') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                    </select>
                    <select name="solved" class="border-gray-300 rounded-lg">
                        <option value="">Semua Status</option>
                        <option value="yes" {{ request('solved') == 'yes' ? 'selected' : '' }}>Solved</option>
                        <option value="no" {{ request('solved') == 'no' ? 'selected' : '' }}>Open</option>
                    </select>
                    <button type="submit"
                        class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Filter</button>
                    <a href="{{ route('forum.index') }}"
                        class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Reset</a>
                </form>
            </div>

            {{-- Questions List --}}
            <div class="space-y-4">
                @forelse($questions as $question)
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full 
                                                    {{ $question->category == 'akademik' ? 'bg-blue-100 text-blue-800' : '' }}
                                                    {{ $question->category == 'umum' ? 'bg-gray-100 text-gray-800' : '' }}
                                                    {{ $question->category == 'teknis' ? 'bg-purple-100 text-purple-800' : '' }}">
                                        {{ ucfirst($question->category) }}
                                    </span>
                                    @if($question->is_solved)
                                        <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                                            ✓ Solved
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">
                                            Open
                                        </span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $question->title }}</h3>
                                <p class="text-gray-600 mb-3">{{ Str::limit($question->content, 150) }}</p>
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span>Oleh: {{ $question->user->name }}</span>
                                    <span>{{ $question->created_at->diffForHumans() }}</span>
                                    <span>{{ $question->answers->count() }} jawaban</span>
                                </div>
                            </div>
                            <a href="{{ route('forum.show', $question) }}"
                                class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 whitespace-nowrap">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow-md p-12 text-center">
                        <p class="text-gray-500">Belum ada pertanyaan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>