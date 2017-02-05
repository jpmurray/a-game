<?php

namespace App\Http\Middleware;

use Closure;

class checkIfFactionCreated
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
        if (!$request->user()->faction) {
            return redirect()->route('new-faction.create');
        }

        return $next($request);
    }
}
