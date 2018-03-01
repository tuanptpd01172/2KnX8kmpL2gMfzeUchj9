<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Session::has('locale')) {
            $locale = Session::get('locale');
			App::setLocale($locale);
        }else{
			App::setLocale('vi');

        }

        return $next($request);
    }
}
