<?php

namespace Zeropingheroes\Lanyard\Http\Middleware;

use Closure, Auth;

class SuperAdminMiddleware
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
        if(Auth::user()->hasRole('Super Admin'))
        {
            return $next($request);
        }
        return redirect('/');
    }
}
