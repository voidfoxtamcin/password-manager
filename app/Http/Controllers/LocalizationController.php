<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session as FacadesSession;

class LocalizationController extends Controller
{
    //
    public function set_lang($locale)
    {
        App::setLocale($locale);
        // FacadesSession::put('locale', $locale);
        request()->cookie('locale', $locale);
        return redirect()->back()->withCookie(Cookie::forever('locale', $locale));
    }
}
