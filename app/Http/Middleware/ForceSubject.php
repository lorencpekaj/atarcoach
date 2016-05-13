<?php

namespace App\Http\Middleware;

use Closure;

class ForceSubject
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
        if (is_null($request->user()->subjects)) {
            return redirect('/subject/select');
        }

        return $next($request);
    }
}
