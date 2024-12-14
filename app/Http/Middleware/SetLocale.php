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
            if (array_key_exists($lang, config('lang.locales'))) {
                Log::info("Setting preferred language to " . $lang);
                app()->setLocale($lang);
                if(auth()->check()){
                    auth()->getUser()->update(["language"=>$lang]);
                    auth()->user()->save();
                }
            }else{
                Log::info("Can't set preferred language to " . $lang);
            }
        }
        Log::info('Session ID: ' . session()->getId());

        if(auth()->check()){
            $locale = auth()->user()->language;
            Log::info("Setting locale to " . $locale);
            app()->setLocale($locale);
        }else{
            Log::info("You dont have language preference set up.");
        }

        return $next($request);
    }
}
