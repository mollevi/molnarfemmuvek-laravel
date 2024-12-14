<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class SetLocale {

    private const DEFAULT_LANGUAGE_KEY = "app.locale";
    private const SUPPORTED_LANGUAGES_KEY = "lang.locales";
    private const COOKIE_NAME = "app_locale";
    private const SESSION_VARIABLE_NAME = "app_locale";
    private const COOKIE_EXPIRATION = 366 * 24 * 60;
    private const URL_PARAM_NAME = "lang";
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next): Response {
        $lang = $request->query(self::URL_PARAM_NAME);
        $sessionLocale = Session::get(self::SESSION_VARIABLE_NAME);
        $cookieLocale = $request->cookie(self::COOKIE_NAME);
        if ($lang && self::isSupported($lang)) {
            App::setLocale($lang);
            if(Session::has(self::SESSION_VARIABLE_NAME)){
                Session::forget(self::SESSION_VARIABLE_NAME);
            }
            Session::put(self::SESSION_VARIABLE_NAME, $lang);
            Session::save();
            $response = $next($request);
            if(auth()->check()){
                $user = auth()->getUser();
                $user->language = $lang;
                $user->save();
            }
            return $response->withCookie(cookie(self::COOKIE_NAME, $lang, self::COOKIE_EXPIRATION ));
        } elseif($sessionLocale && self::isSupported($sessionLocale)){
            App::setLocale($sessionLocale);
        } elseif ($cookieLocale && self::isSupported($cookieLocale)){
            if(Session::has(self::SESSION_VARIABLE_NAME)){
                Session::forget(self::SESSION_VARIABLE_NAME);
            }
            Session::put(self::SESSION_VARIABLE_NAME, $cookieLocale);
            Session::save();
            App::setLocale($cookieLocale);
        } elseif( auth()->check() ) {
            $userLocale = auth()->user()->language;
            if ($userLocale && self::isSupported($userLocale)) {
                App::setLocale($userLocale);
                return $next($request);
            }else{
                if(Session::has(self::SESSION_VARIABLE_NAME)){
                    Session::forget(self::SESSION_VARIABLE_NAME);
                }
                Session::put(self::SESSION_VARIABLE_NAME, Config::get(self::DEFAULT_LANGUAGE_KEY));
                Session::save();
                $user = auth()->getUser();
                $user->language = Config::get(self::DEFAULT_LANGUAGE_KEY);
                $user->save();
            }
        }

        return $next($request);
    }

    protected static function isSupported(string $lang): bool
    {
        return array_key_exists($lang, Config::get(SetLocale::SUPPORTED_LANGUAGES_KEY));
    }
}
