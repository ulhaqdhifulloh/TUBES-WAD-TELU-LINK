<?php

namespace App\Http\Controllers;

use App\Models\AcademicInfo;
use Illuminate\Http\Request;

class AcademicInfoController extends Controller
{
    public function index(Request $request)
    {
        $query = AcademicInfo::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $academicInfo = $query->orderBy('deadline', 'asc')->paginate(12);

        return view('academic-info.index', compact('academicInfo'));
    }

    public function show(AcademicInfo $academicInfo)
    {
        return view('academic-info.show', compact('academicInfo'));
    }

    public function create()
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('academic-info.create');
    }

    public function store(Request $request)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'type' => 'required|in:beasiswa,kompetisi',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'provider' => 'required|string',
            'deadline' => 'required|date',
            'requirements' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        $validated['created_by'] = auth()->id();

        AcademicInfo::create($validated);

        return redirect()->route('academic-info.index')->with('success', 'Info akademik berhasil ditambahkan!');
    }

    public function edit(AcademicInfo $academicInfo)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('academic-info.edit', compact('academicInfo'));
    }

    public function update(Request $request, AcademicInfo $academicInfo)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'type' => 'required|in:beasiswa,kompetisi',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'provider' => 'required|string',
            'deadline' => 'required|date',
            'requirements' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        $academicInfo->update($validated);

        return redirect()->route('academic-info.show', $academicInfo)->with('success', 'Info akademik berhasil diupdate!');
    }

    public function destroy(AcademicInfo $academicInfo)
    {
        // Admin only
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $academicInfo->delete();

        return redirect()->route('academic-info.index')->with('success', 'Info akademik berhasil dihapus!');
    }
}
