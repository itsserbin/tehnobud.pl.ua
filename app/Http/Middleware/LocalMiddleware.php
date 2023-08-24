<?php

namespace App\Http\Middleware;

use App\Services\Localization\LocalizationHandle;
use Closure;
use Illuminate\Http\Request;

class LocalMiddleware
{
    
    public function __construct(
        private LocalizationHandle $localizationHandle
    ) {
    }
    
    /**
     * Handle an incoming request.
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   \Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $this->localizationHandle->setLocal($request);
        
        return $next($request);
    }
    
}
