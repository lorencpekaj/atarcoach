<?php

namespace App\Http\Middleware;

use Closure;

use Alert;

class Admin
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
        if ($request->user()->is_admin == false) {
 			Alert::error("You are prohibited from accessing this directory", "Access Denied")->persistent('Close');
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
