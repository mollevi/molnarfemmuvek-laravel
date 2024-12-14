<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $news = News::orderByRaw('GREATEST(coalesce(updated_at, created_at), created_at) DESC')->limit(3)->get();
        return view('home', [
            'news' => $news,
        ]);
    }
}
