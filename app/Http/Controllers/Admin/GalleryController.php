<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->latest()->paginate(15);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(StoreGalleryRequest $request)
    {
        $data = $request->validated();

        $data['image']     = $request->file('image')->store('images/gallery', 'public');
        $data['is_active'] = $request->boolean('is_active', true);

        Gallery::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    public function edit(Gallery $gallery)
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(StoreGalleryRequest $request, Gallery $gallery)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($gallery->image) Storage::disk('public')->delete($gallery->image);
            $data['image'] = $request->file('image')->store('images/gallery', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) Storage::disk('public')->delete($gallery->image);
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}
