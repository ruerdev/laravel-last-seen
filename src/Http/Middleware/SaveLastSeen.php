<?php

namespace Ruerdev\LaravelLastSeen\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SaveLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (auth()->check()) {
            auth()->user()->setLastSeenValue();
        }

        return $response;
    }
}
