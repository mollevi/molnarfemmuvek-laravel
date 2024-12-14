<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController
{
    public function index()
    {
        $news = News::orderByRaw('GREATEST(coalesce(updated_at, created_at), created_at) DESC')->limit(3)->get();
        return view('home', [
            'news' => $news,
        ]);
    }

    public function sendMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Mail::to('mollevi@mollevi.eu')->send(new ContactMail($validated));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
