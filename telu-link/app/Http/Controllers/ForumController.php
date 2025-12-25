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

        // Handle is_solved checkbox
        $validated['is_solved'] = $request->has('is_solved') ? true : false;

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

    // Answer Methods
    public function storeAnswer(Request $request, ForumQuestion $forum)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $forum->answers()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('forum.show', $forum)->with('success', 'Jawaban berhasil ditambahkan!');
    }

    public function updateAnswer(Request $request, ForumQuestion $forum, $answerId)
    {
        $answer = $forum->answers()->findOrFail($answerId);

        // Only owner can update
        if ($answer->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $answer->update($validated);

        return redirect()->route('forum.show', $forum)->with('success', 'Jawaban berhasil diupdate!');
    }

    public function destroyAnswer(ForumQuestion $forum, $answerId)
    {
        $answer = $forum->answers()->findOrFail($answerId);

        // Owner or admin can delete
        if ($answer->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $answer->delete();

        return redirect()->route('forum.show', $forum)->with('success', 'Jawaban berhasil dihapus!');
    }
}
