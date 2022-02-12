<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // this to forbidden guest users to access on the admin page
        if(auth()->guest())
        {
            abort(Response::HTTP_FORBIDDEN);
        }
        // simple restriction to forbidden normal users to create a post jsut admins can access for this page
        if(auth()->user()->role !== 'admin')
        {
            abort(Response::HTTP_FORBIDDEN);
        }
        
        return $next($request);
    }
}
