<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    private $locales = ['ar', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $locale)
    {
        if (array_search($locale, $this->locales) === false) {
            return redirect('/');
        }

        \App::setLocale($locale);

        return $next($request);
    }
}
