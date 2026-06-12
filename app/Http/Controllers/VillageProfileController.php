<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use App\Models\VillageStatistic;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profile    = VillageProfile::first();
        $statistics = VillageStatistic::first();

        return view('frontend.profile.index', compact('profile', 'statistics'));
    }
}
