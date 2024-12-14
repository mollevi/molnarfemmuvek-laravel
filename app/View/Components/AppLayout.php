<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        if(Auth::check()){
            app()->setLocale(Auth::user()->language);
        }
        return view('layouts.app', [
            'isAdmin'=> Auth::user()?->is_admin,
        ]);
    }
}
