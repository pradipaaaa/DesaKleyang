<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $query = Gallery::with('category')->active()->latest();

        if ($category) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $category));
        }

        $galleries  = $query->paginate(12)->withQueryString();
        $categories = GalleryCategory::withCount(['galleries' => fn ($q) => $q->active()])->get();

        return view('frontend.gallery.index', compact('galleries', 'categories', 'category'));
    }
}
