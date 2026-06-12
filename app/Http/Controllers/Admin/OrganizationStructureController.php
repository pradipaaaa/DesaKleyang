<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationStructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationStructure::latest()->paginate(10);
        return view('admin.organization.index', compact('structures'));
    }

    public function create()
    {
        return view('admin.organization.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'image'       => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'description' => ['nullable', 'string'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        $data['image']     = $request->file('image')->store('images/organization', 'public');
        $data['is_active'] = $request->boolean('is_active', true);

        OrganizationStructure::create($data);
        return redirect()->route('admin.organization.index')->with('success', 'Struktur organisasi berhasil ditambahkan!');
    }

    public function edit(OrganizationStructure $organization)
    {
        return view('admin.organization.edit', compact('organization'));
    }

    public function update(Request $request, OrganizationStructure $organization)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'description' => ['nullable', 'string'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($organization->image) Storage::disk('public')->delete($organization->image);
            $data['image'] = $request->file('image')->store('images/organization', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $organization->update($data);
        return redirect()->route('admin.organization.index')->with('success', 'Struktur organisasi berhasil diperbarui!');
    }

    public function destroy(OrganizationStructure $organization)
    {
        if ($organization->image) Storage::disk('public')->delete($organization->image);
        $organization->delete();
        return redirect()->route('admin.organization.index')->with('success', 'Struktur organisasi berhasil dihapus!');
    }
}
