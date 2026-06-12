<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePotentialRequest;
use App\Models\Potential;
use Illuminate\Support\Facades\Storage;

class PotentialController extends Controller
{
    public function index()
    {
        $potentials = Potential::latest()->paginate(15);
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        $categories = Potential::categories();
        return view('admin.potentials.create', compact('categories'));
    }

    public function store(StorePotentialRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('images/potentials', 'public');
        }
        $data['is_active'] = $request->boolean('is_active', true);

        Potential::create($data);
        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa berhasil ditambahkan!');
    }

    public function edit(Potential $potential)
    {
        $categories = Potential::categories();
        return view('admin.potentials.edit', compact('potential', 'categories'));
    }

    public function update(StorePotentialRequest $request, Potential $potential)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($potential->photo) Storage::disk('public')->delete($potential->photo);
            $data['photo'] = $request->file('photo')->store('images/potentials', 'public');
        }
        $data['is_active'] = $request->boolean('is_active', true);

        $potential->update($data);
        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa berhasil diperbarui!');
    }

    public function destroy(Potential $potential)
    {
        if ($potential->photo) Storage::disk('public')->delete($potential->photo);
        $potential->delete();
        return redirect()->route('admin.potentials.index')->with('success', 'Potensi desa berhasil dihapus!');
    }
}
