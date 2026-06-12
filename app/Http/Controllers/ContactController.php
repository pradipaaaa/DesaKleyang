<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\VillageProfile;
use App\Models\VisitorMessage;

class ContactController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first();
        return view('frontend.contact.index', compact('profile'));
    }

    public function store(StoreContactRequest $request)
    {
        VisitorMessage::create($request->validated());

        return redirect()->route('contact')->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda. Terima kasih!');
    }
}
