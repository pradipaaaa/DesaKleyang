<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficialRequest;
use App\Models\VillageOfficial;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        $officials = VillageOfficial::orderBy('order')->paginate(15);
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(StoreOfficialRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('images/officials', 'public');
        }

        $data['is_head']   = $request->boolean('is_head');
        $data['is_active'] = $request->boolean('is_active', true);

        VillageOfficial::create($data);
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    public function edit(VillageOfficial $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(StoreOfficialRequest $request, VillageOfficial $official)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($official->photo) Storage::disk('public')->delete($official->photo);
            $data['photo'] = $request->file('photo')->store('images/officials', 'public');
        }

        $data['is_head']   = $request->boolean('is_head');
        $data['is_active'] = $request->boolean('is_active', true);

        $official->update($data);
        return redirect()->route('admin.officials.index')->with('success', 'Data perangkat desa berhasil diperbarui!');
    }

    public function destroy(VillageOfficial $official)
    {
        if ($official->photo) Storage::disk('public')->delete($official->photo);
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat desa berhasil dihapus!');
    }
}
