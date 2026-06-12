<?php

namespace App\Http\Controllers;

use App\Models\OrganizationStructure;
use App\Models\VillageOfficial;

class GovernmentController extends Controller
{
    public function index()
    {
        $headman       = VillageOfficial::where('is_head', true)->first();
        $officials     = VillageOfficial::active()->ordered()->get();
        $orgStructures = OrganizationStructure::where('is_active', true)->latest()->get();

        return view('frontend.government.index', compact('headman', 'officials', 'orgStructures'));
    }
}
