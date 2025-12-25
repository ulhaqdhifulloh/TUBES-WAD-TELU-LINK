<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $forum->title }}
            </h2>
            @if($forum->user_id === Auth::id() || Auth::user()->isAdmin())
                <div class="flex gap-2">
                    @if($forum->user_id === Auth::id())
                        <a href="{{ route('forum.edit', $forum) }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Edit
                        </a>
                    @endif
                    <form action="{{ route('forum.destroy', $forum) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
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
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            {{-- Question --}}
            <div class="bg-white rounded-lg shadow-md p-8 mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full 
                        {{ $forum->category == 'akademik' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $forum->category == 'umum' ? 'bg-gray-100 text-gray-800' : '' }}
                        {{ $forum->category == 'teknis' ? 'bg-purple-100 text-purple-800' : '' }}">
                        {{ ucfirst($forum->category) }}
                    </span>
                    @if($forum->is_solved)
                        <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                            ✓ Solved
                        </span>
                    @endif
                </div>

                <h1 class="text-2xl font-bold mb-4">{{ $forum->title }}</h1>
                <p class="text-gray-700 mb-6 whitespace-pre-line">{{ $forum->content }}</p>

                <div class="flex items-center gap-4 text-sm text-gray-500 border-t pt-4">
                    <span>Ditanyakan oleh: <strong>{{ $forum->user->name }}</strong></span>
                    <span>{{ $forum->created_at->diffForHumans() }}</span>
                </div>
            </div>

            {{-- Answers --}}
            <div class="bg-white rounded-lg shadow-md p-8">
                <h3 class="text-xl font-bold mb-6">{{ $forum->answers->count() }} Jawaban</h3>

                @forelse($forum->answers as $answer)
                    <div class="border-b pb-6 mb-6 last:border-b-0" x-data="{ editing: false }">
                        <!-- View Mode -->
                        <div x-show="!editing">
                            <p class="text-gray-700 mb-3 whitespace-pre-line">{{ $answer->content }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span>Dijawab oleh: <strong>{{ $answer->user->name }}</strong></span>
                                    <span>{{ $answer->created_at->diffForHumans() }}</span>
                                </div>
                                @if($answer->user_id === Auth::id() || Auth::user()->isAdmin())
                                    <div class="flex gap-2">
                                        @if($answer->user_id === Auth::id())
                                            <button @click="editing = true"
                                                class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                                Edit
                                            </button>
                                        @endif
                                        <form action="{{ route('forum.answers.destroy', [$forum, $answer]) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus jawaban ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Edit Mode -->
                        <div x-show="editing" style="display: none;">
                            <form action="{{ route('forum.answers.update', [$forum, $answer]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <textarea name="content" rows="4" required
                                    class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 mb-3">{{ $answer->content }}</textarea>
                                <div class="flex gap-2">
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                                        Simpan
                                    </button>
                                    <button type="button" @click="editing = false"
                                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Belum ada jawaban.</p>
                @endforelse

                {{-- Add Answer Form --}}
                <div class="mt-8 pt-6 border-t">
                    <h4 class="font-bold text-lg mb-4">Tambah Jawaban</h4>
                    <form action="{{ route('forum.answers.store', $forum) }}" method="POST">
                        @csrf
                        <textarea name="content" rows="4" required placeholder="Tulis jawaban Anda..."
                            class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500 mb-3"></textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                        @enderror
                        <button type="submit"
                            class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold">
                            Kirim Jawaban
                        </button>
                    </form>
                </div>

                <div class="mt-6">
                    <a href="{{ route('forum.index') }}"
                        class="inline-block bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                        ← Kembali ke Forum
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>