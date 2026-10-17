<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->query('lang', $request->session()->get('locale', 'sk'));
        $locale = in_array($locale, ['sk', 'en'], true) ? $locale : 'sk';

        app()->setLocale($locale);
        $request->session()->put('locale', $locale);

        return $next($request);
    }
}
