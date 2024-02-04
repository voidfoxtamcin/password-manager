<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Session::has('locale')) {
        //     App::setlocale(Session::get('locale'));
        // } else {
        //     Session::put('locale', 'id');
        //     App::setlocale(Session::get('locale'));
        // }

        if ($request->hasCookie('locale')) {
            App::setLocale($request->cookie('locale'));
            return $next($request);
        } else {
            $cookie = Cookie::make('locale', 'id', 60 * 24 * 365);
            App::setLocale($request->cookie('locale'));
            return response($next($request))->withCookie($cookie);
        }
    }
}
