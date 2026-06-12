<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUmkmRequest;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query  = Umkm::latest();
        if ($search) $query->where('name', 'like', "%{$search}%");
        $umkms = $query->paginate(15)->withQueryString();
        return view('admin.umkms.index', compact('umkms', 'search'));
    }

    public function create()
    {
        return view('admin.umkms.create');
    }

    public function store(StoreUmkmRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('images/umkms', 'public');
        }
        $data['is_active'] = $request->boolean('is_active', true);

        Umkm::create($data);
        return redirect()->route('admin.umkms.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkms.edit', compact('umkm'));
    }

    public function update(StoreUmkmRequest $request, Umkm $umkm)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($umkm->photo) Storage::disk('public')->delete($umkm->photo);
            $data['photo'] = $request->file('photo')->store('images/umkms', 'public');
        }
        $data['is_active'] = $request->boolean('is_active', true);

        $umkm->update($data);
        return redirect()->route('admin.umkms.index')->with('success', 'UMKM berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->photo) Storage::disk('public')->delete($umkm->photo);
        $umkm->delete();
        return redirect()->route('admin.umkms.index')->with('success', 'UMKM berhasil dihapus!');
    }
}
