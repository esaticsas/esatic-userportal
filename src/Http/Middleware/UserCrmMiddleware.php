<?php

namespace Esatic\ActiveUser\Http\Middleware;

use Illuminate\Http\Request;

class UserCrmMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        return $next($request);
    }
}
