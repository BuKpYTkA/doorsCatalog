<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        return $next($request);
//        $key = env('API_KEY');
//        if ($request->header('x-api-key') === env('API_KEY')) {
//            return $next($request);
//        }
//        abort(404);
    }
}
