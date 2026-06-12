<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorMessage;
use Illuminate\Http\Request;

class VisitorMessageController extends Controller
{
    public function index()
    {
        $messages = VisitorMessage::latest()->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(VisitorMessage $message)
    {
        $message->update(['is_read' => true]);
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(VisitorMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
