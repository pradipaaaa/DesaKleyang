<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->get('search');
        $category = $request->get('category');

        $query = News::with('category')->published()->latest('published_at');

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($category) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $category));
        }

        $news       = $query->paginate(9)->withQueryString();
        $categories = NewsCategory::withCount(['news' => fn ($q) => $q->published()])->get();

        return view('frontend.news.index', compact('news', 'categories', 'search', 'category'));
    }

    public function show(string $slug)
    {
        $news = News::with('category')->published()->where('slug', $slug)->firstOrFail();
        $news->increment('views');

        $relatedNews = News::with('category')
            ->published()
            ->where('news_category_id', $news->news_category_id)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('frontend.news.show', compact('news', 'relatedNews'));
    }
}
