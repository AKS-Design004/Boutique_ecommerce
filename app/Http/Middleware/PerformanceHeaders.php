<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerformanceHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Headers pour améliorer les performances
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        
        // Cache pour les images statiques
        if (str_contains($request->path(), 'storage/products') || str_contains($request->path(), 'images/')) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000');
        }

        return $response;
    }
} 