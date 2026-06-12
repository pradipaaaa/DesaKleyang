<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::withCount('news')->paginate(15);
        return view('admin.news-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.news-categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:10'],
        ]);
        $data['slug'] = Str::slug($data['name']);
        NewsCategory::create($data);
        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('admin.news-categories.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:10'],
        ]);
        $data['slug'] = Str::slug($data['name']);
        $newsCategory->update($data);
        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();
        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
