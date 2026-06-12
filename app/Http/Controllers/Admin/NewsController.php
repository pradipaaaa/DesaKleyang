<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query  = News::with('category')->latest();
        if ($search) $query->where('title', 'like', "%{$search}%");
        $news = $query->paginate(15)->withQueryString();
        return view('admin.news.index', compact('news', 'search'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();

        $data['slug']         = Str::slug($data['title']) . '-' . Str::random(5);
        $data['is_published'] = $request->boolean('is_published', true);
        $data['published_at'] = $data['published_at'] ?? now();
        $data['author']       = $data['author'] ?? 'Admin Desa';

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('images/news', 'public');
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(StoreNewsRequest $request, News $news)
    {
        $data = $request->validated();

        $data['is_published'] = $request->boolean('is_published', true);

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail) Storage::disk('public')->delete($news->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('images/news', 'public');
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        if ($news->thumbnail) Storage::disk('public')->delete($news->thumbnail);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }
}
