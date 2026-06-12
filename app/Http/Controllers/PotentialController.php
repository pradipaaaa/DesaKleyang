<?php

namespace App\Http\Controllers;

use App\Models\Potential;
use App\Models\Umkm;
use Illuminate\Http\Request;

class PotentialController extends Controller
{
    public function index(Request $request)
    {
        $category   = $request->get('category');
        $categories = Potential::categories();

        $query = Potential::active();
        if ($category && array_key_exists($category, $categories)) {
            $query->where('category', $category);
        }
        $potentials = $query->latest()->get();

        return view('frontend.potential.index', compact('potentials', 'categories', 'category'));
    }

    public function umkm(Request $request)
    {
        $search = $request->get('search');
        $query  = Umkm::active();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('product', 'like', "%{$search}%")
                  ->orWhere('owner', 'like', "%{$search}%");
            });
        }

        $umkms = $query->paginate(9)->withQueryString();

        return view('frontend.potential.umkm', compact('umkms', 'search'));
    }
}
