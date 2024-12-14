<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/stories',[NewsController::class, 'index'])->name('stories');
Route::get('/stories/{news}',[NewsController::class, 'readMore'])->name('stories.read_more');
Route::get('/about',[AboutController::class, 'index'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/polls', [PollController::class, 'index'])->name('polls');
    Route::get('/polls/{poll}', [PollController::class, 'show'])->name('polls.vote');
    Route::get('/orders', [OrderController::class, 'list'])->name('order.list');
    Route::get('/orders/{order}', [OrderController::class, 'view'])->name('order.view');
});

require __DIR__.'/auth.php';
