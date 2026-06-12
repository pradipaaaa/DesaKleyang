<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::withCount('galleries')->paginate(15);
        return view('admin.gallery-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery-categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        $data['slug'] = Str::slug($data['name']);
        GalleryCategory::create($data);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori galeri berhasil ditambahkan!');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery-categories.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        $data['slug'] = Str::slug($data['name']);
        $galleryCategory->update($data);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori galeri berhasil diperbarui!');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori galeri berhasil dihapus!');
    }
}
