<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Potential;
use App\Models\VillageOfficial;
use App\Models\VillageProfile;
use App\Models\VillageStatistic;

class HomeController extends Controller
{
    public function index()
    {
        $profile    = VillageProfile::first();
        $statistics = VillageStatistic::first();
        $headman    = VillageOfficial::where('is_head', true)->first();
        $potentials = Potential::active()->take(6)->get();
        $latestNews = News::with('category')->published()->latest('published_at')->take(3)->get();
        $galleries  = Gallery::active()->latest()->take(8)->get();

        return view('frontend.home.index', compact(
            'profile', 'statistics', 'headman', 'potentials', 'latestNews', 'galleries'
        ));
    }
}
