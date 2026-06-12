<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'village_name'  => ['required', 'string', 'max:255'],
            'tagline'       => ['nullable', 'string', 'max:255'],
            'address'       => ['nullable', 'string'],
            'phone'         => ['nullable', 'string', 'max:20'],
            'email'         => ['nullable', 'email'],
            'history'       => ['nullable', 'string'],
            'vision'        => ['nullable', 'string'],
            'mission'       => ['nullable', 'string'],
            'area'          => ['nullable', 'numeric'],
            'altitude'      => ['nullable', 'integer'],
            'latitude'      => ['nullable', 'string'],
            'longitude'     => ['nullable', 'string'],
            'hero_image'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'village_logo'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $profile = VillageProfile::firstOrNew(['id' => 1]);
        $data    = $request->except(['hero_image', 'village_logo', '_token', '_method']);

        if ($request->hasFile('hero_image')) {
            if ($profile->hero_image) Storage::disk('public')->delete($profile->hero_image);
            $data['hero_image'] = $request->file('hero_image')->store('images/profile', 'public');
        }

        if ($request->hasFile('village_logo')) {
            if ($profile->village_logo) Storage::disk('public')->delete($profile->village_logo);
            $data['village_logo'] = $request->file('village_logo')->store('images/profile', 'public');
        }

        $profile->fill($data)->save();

        return redirect()->route('admin.profile.index')->with('success', 'Profil desa berhasil diperbarui!');
    }
}
