<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TechnicalWorkMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (config('app.technical_work'))
        {
            return response(view('technical_work'));
        }
        
        return $next($request);
    }
}
