<?php

namespace App\Http\Middleware;

use Closure;

class ParseSearchQuery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Dingo\Api\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $search = $request->input('q');
        $bar = $request->getQueryString();
        return $next($request);
    }
}
