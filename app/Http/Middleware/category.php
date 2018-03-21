<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Categories\Categories;

class category
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cate_ = [];    
        return $next($request)->with('cate_',$cate_);
    }
}
