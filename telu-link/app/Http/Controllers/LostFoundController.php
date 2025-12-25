<?php

namespace App\Http\Controllers;

use App\Models\LostFound;
use Illuminate\Http\Request;

class LostFoundController extends Controller
{
    public function index(Request $request)
    {
        $query = LostFound::with('user');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $items = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('lost-found.index', compact('items'));
    }

    public function show(LostFound $lostFound)
    {
        return view('lost-found.show', compact('lostFound'));
    }

    public function create()
    {
        return view('lost-found.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'status' => 'required|in:hilang,ditemukan',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'location_found' => 'nullable|string',
            'date_found' => 'nullable|date',
            'contact_person' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['is_claimed'] = false;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('lost-found', 'public');
        }

        LostFound::create($validated);

        return redirect()->route('lost-found.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function edit(LostFound $lostFound)
    {
        // Only owner can edit (admin cannot edit)
        if ($lostFound->user_id !== auth()->id()) {
            abort(403, 'Hanya pemilik yang dapat mengedit laporan ini.');
        }

        return view('lost-found.edit', compact('lostFound'));
    }

    public function update(Request $request, LostFound $lostFound)
    {
        // Only owner can update (admin cannot update)
        if ($lostFound->user_id !== auth()->id()) {
            abort(403, 'Hanya pemilik yang dapat mengupdate laporan ini.');
        }

        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'status' => 'required|in:hilang,ditemukan',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'location_found' => 'nullable|string',
            'date_found' => 'nullable|date',
            'contact_person' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($lostFound->photo) {
                \Storage::disk('public')->delete($lostFound->photo);
            }
            $validated['photo'] = $request->file('photo')->store('lost-found', 'public');
        }

        $lostFound->update($validated);

        return redirect()->route('lost-found.show', $lostFound)->with('success', 'Laporan berhasil diupdate!');
    }

    public function destroy(LostFound $lostFound)
    {
        // Only owner or admin can delete
        if ($lostFound->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $lostFound->delete();

        return redirect()->route('lost-found.index')->with('success', 'Laporan berhasil dihapus!');
    }
}
