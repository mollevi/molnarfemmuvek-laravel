<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PollCrudController;
use App\Http\Controllers\PollController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.
// Override the Backpack logout route
Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    Route::get('logout', [AuthenticatedSessionController::class, "destroy"])->name('backpack.auth.logout');
    Route::crud('user', 'UserCrudController');
    Route::crud('poll', 'PollCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('message', 'MessageCrudController');
    Route::post('poll/{id}/add-answer-option', [PollCrudController::class, 'addAnswerOption'])->name('poll.add-answer-option');
    Route::get('poll/{poll}/answer-options', [PollController::class, 'getAnswerOptions'])->name('admin.poll.answer-options');

}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
