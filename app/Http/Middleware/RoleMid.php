<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
  
     if ($request->is('/')) {
        return $next($request);
     }

    // Check role permission
    if ($request->role == "admin") {
        return $next($request);
    }

    return redirect('/')->with("permission", "you have no permission");

    dd("you have no permission");
}

}
