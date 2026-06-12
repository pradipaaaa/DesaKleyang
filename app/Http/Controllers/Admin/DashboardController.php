<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Umkm;
use App\Models\VillageOfficial;
use App\Models\VisitorMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news'      => News::count(),
            'officials' => VillageOfficial::count(),
            'umkms'     => Umkm::count(),
            'galleries' => Gallery::count(),
            'messages'  => VisitorMessage::count(),
            'unread'    => VisitorMessage::unread()->count(),
        ];

        $latestNews     = News::with('category')->latest()->take(5)->get();
        $latestMessages = VisitorMessage::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('stats', 'latestNews', 'latestMessages'));
    }
}
