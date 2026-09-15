<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAccess
{
    /**
     * Allowed routes for staff role (catalog-only access).
     */
    protected array $staffAllowedPatterns = [
        'admin.dashboard',
        'admin.products',
        'admin.products.*',
        'admin.categories',
        'admin.categories.*',
        'admin.profile',
        'admin.profile.*',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // If specific roles are passed, check against them
        if (!empty($roles)) {
            if (!in_array($user->role, $roles)) {
                abort(403, 'You do not have permission to access this page.');
            }
            return $next($request);
        }

        // Default behavior: restrict staff to allowed routes only
        if ($user->role === 'staff') {
            $currentRoute = $request->route()->getName();
            $allowed = false;

            foreach ($this->staffAllowedPatterns as $pattern) {
                if ($currentRoute === $pattern || fnmatch($pattern, $currentRoute)) {
                    $allowed = true;
                    break;
                }
            }

            if (!$allowed) {
                abort(403, 'You do not have permission to access this page.');
            }
        }

        return $next($request);
    }
}
