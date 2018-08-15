<?php

namespace App\Http\Middleware;

use Closure;

class FrontendLogin
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
        if (!session()->get('userid')) {
            header('location:' . url('/'));
            exit;
        }
        return $next($request);
    }
}
