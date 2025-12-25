<?php

namespace App\Http\Controllers;

use App\Models\ForumQuestion;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $query = ForumQuestion::with(['user', 'answers']);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('solved')) {
            $query->where('is_solved', $request->solved === 'yes');
        }

        $questions = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('forum.index', compact('questions'));
    }

    public function show(ForumQuestion $forum)
    {
        $forum->load(['user', 'answers.user']);
        return view('forum.show', compact('forum'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:akademik,umum,teknis',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['is_solved'] = false;

        ForumQuestion::create($validated);

        return redirect()->route('forum.index')->with('success', 'Pertanyaan berhasil diposting!');
    }

    public function edit(ForumQuestion $forum)
    {
        // Only owner can edit
        if ($forum->user_id !== auth()->id()) {
            abort(403);
        }

        return view('forum.edit', compact('forum'));
    }

    public function update(Request $request, ForumQuestion $forum)
    {
        // Only owner can update
        if ($forum->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'category' => 'required|in:akademik,umum,teknis',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $forum->update($validated);

        return redirect()->route('forum.show', $forum)->with('success', 'Pertanyaan berhasil diupdate!');
    }

    public function destroy(ForumQuestion $forum)
    {
        // Owner or admin can delete
        if ($forum->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
