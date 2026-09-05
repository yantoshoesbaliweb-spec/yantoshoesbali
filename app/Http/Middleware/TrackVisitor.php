<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog;

class TrackVisitor
{
    /**
     * Handle an incoming request and track visitor count.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('GET') && $response->getStatusCode() < 400 && !$request->user()) {
            try {
                VisitorLog::recordVisit($request);
            } catch (\Throwable $e) {
                // Fail silently to never interrupt visitor response
            }
        }

        return $response;
    }
}
