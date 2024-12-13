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
        $news = News::orderBy('created_at','desc')->simplePaginate(6);
        return view('home', [
            'news' => $news,
        ]);
    }
}
