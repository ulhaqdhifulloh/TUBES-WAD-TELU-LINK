<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $news->title }}
            </h2>
            @if(Auth::user()->isAdmin())
                <div class="flex gap-2">
                    <a href="{{ route('news.edit', $news) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit
                    </a>
                    <form action="{{ route('news.destroy', $news) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex items-center gap-3 mb-6">
                    @if($news->organization)
                        <span class="px-4 py-2 text-sm font-semibold bg-purple-100 text-purple-800 rounded-full">
                            {{ $news->organization->name }}
                        </span>
                    @endif
                    <span class="text-sm text-gray-500">
                        {{ $news->published_at ? $news->published_at->format('d M Y') : 'Belum dipublikasi' }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

                @if($news->excerpt)
                    <p class="text-xl text-gray-600 mb-6 italic">{{ $news->excerpt }}</p>
                @endif

                <div class="prose max-w-none mb-6">
                    <p class="text-gray-700 whitespace-pre-line">{{ $news->content }}</p>
                </div>

                <div class="border-t pt-4 mt-6">
                    <p class="text-sm text-gray-600">
                        <strong>Penulis:</strong> {{ $news->author->name }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <strong>Dipublikasikan:</strong>
                        {{ $news->published_at ? $news->published_at->diffForHumans() : 'Belum dipublikasi' }}
                    </p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('news.index') }}"
                        class="inline-block bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                        ← Kembali ke Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>