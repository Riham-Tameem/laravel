<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LangSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = strtolower($request->cookie('lang'));
        if($lang=='ar' || $lang=='en'){
            app()->setLocale($lang);
        }
        return $next($request);
    }
}
