<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Berita & Organisasi
            </h2>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('news.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    + Tambah Berita
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse($news as $article)
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                        <div class="flex gap-6">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    @if($article->organization)
                                        <span
                                            class="px-3 py-1 text-xs font-semibold bg-purple-100 text-purple-800 rounded-full">
                                            {{ $article->organization->name }}
                                        </span>
                                    @endif
                                    <span class="text-sm text-gray-500">
                                        {{ $article->published_at ? $article->published_at->diffForHumans() : 'Belum dipublikasi' }}
                                    </span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $article->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $article->excerpt ?? Str::limit($article->content, 200) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-500">Oleh: {{ $article->author->name }}</p>
                                    <a href="{{ route('news.show', $article) }}"
                                        class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow-md p-12 text-center">
                        <p class="text-gray-500">Belum ada berita.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</x-app-layout>