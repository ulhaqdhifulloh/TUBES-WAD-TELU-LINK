<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['organization', 'author'])
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $organizations = \App\Models\Organization::all();
        return view('news.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'organization_id' => 'nullable|exists:organizations,id',
        ]);

        $validated['author_id'] = auth()->id();
        $validated['published_at'] = now();

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function edit(News $news)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $organizations = \App\Models\Organization::all();
        return view('news.edit', compact('news', 'organizations'));
    }

    public function update(Request $request, News $news)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'organization_id' => 'nullable|exists:organizations,id',
        ]);

        $news->update($validated);

        return redirect()->route('news.show', $news)->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy(News $news)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
}
