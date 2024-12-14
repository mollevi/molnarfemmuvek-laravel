<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info("SetLocale");
        if ($request->has('lang')) {
            $lang = $request->lang;
            Log::info("Now looking for a match for " . $lang);
            if (array_key_exists($lang, config('lang.locales'))) {
                Log::info("Setting preferred language to " . $lang);
                session()->put('language', $lang);
            }else{
                Log::info("Can't set preferred language to " . $lang);
            }
        }
        Log::info('Session ID: ' . session()->getId());

        if (session()->has('language')) {
            $locale = session()->get('language');
            Log::info("Setting locale to " . $locale);
            app()->setLocale($locale);
        }else{
            Log::info("You dont have language preference set up.");
        }

        return $next($request);
    }
}
