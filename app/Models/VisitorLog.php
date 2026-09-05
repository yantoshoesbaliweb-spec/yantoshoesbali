<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'path',
        'visited_date',
    ];

    protected $casts = [
        'visited_date' => 'date',
    ];

    /**
     * Record a new visitor visit from an incoming HTTP request.
     * Only records visits to public visitor pages from guests (not admin or auth).
     * Deduplicates visits from the same IP within a 10-minute window across all pages.
     */
    public static function recordVisit(Request $request): ?static
    {
        // 1. Only track GET requests
        if (!$request->isMethod('GET')) {
            return null;
        }

        // 2. Do not record authenticated users (admin / store staff)
        if ($request->user()) {
            return null;
        }

        // 3. Do not record admin, auth, storage, API, health check, debugbar, or asset routes
        if ($request->is(
            'admin*',
            'login*',
            'logout*',
            'storage*',
            'up',
            'api*',
            '_debugbar*',
            'build*',
            'css*',
            'js*',
            'images*',
            'assets*',
            'favicon.ico',
            'robots.txt'
        )) {
            return null;
        }

        // 4. If the route is named, ensure it does not belong to admin or auth
        if ($request->route()) {
            $routeName = $request->route()->getName();
            if ($routeName && (str_starts_with($routeName, 'admin.') || in_array($routeName, ['login', 'login.attempt', 'logout', 'storage.fallback']))) {
                return null;
            }
        }

        $ip = $request->ip();
        if (empty($ip)) {
            return null;
        }

        $path = '/' . ltrim($request->path(), '/');

        // 5. Deduplicate: Do not count if the same IP visited within the last 10 minutes (regardless of path)
        $tenMinutesAgo = Carbon::now()->subMinutes(10);
        $recentVisit = static::where('ip_address', $ip)
            ->where(function ($query) use ($tenMinutesAgo) {
                $query->where('updated_at', '>=', $tenMinutesAgo)
                      ->orWhere('created_at', '>=', $tenMinutesAgo);
            })
            ->latest('updated_at')
            ->first();

        if ($recentVisit) {
            // Keep the last activity timestamp updated for this IP session without creating a new visitor hit
            $recentVisit->touch();
            return null;
        }

        return static::create([
            'ip_address' => $ip,
            'user_agent' => substr((string) $request->userAgent(), 0, 500),
            'path' => $path,
            'visited_date' => Carbon::today(),
        ]);
    }

    /**
     * Get aggregated visit metrics (Today, This Week, This Month, Total) for visitor pages.
     */
    public static function getMetrics(): array
    {
        $now = Carbon::now();

        // Only count visits to public visitor pages (exclude admin, auth, storage, etc.)
        $query = static::where(function ($q) {
            $q->where('path', 'not like', '/admin%')
              ->where('path', 'not like', '/login%')
              ->where('path', 'not like', '/logout%')
              ->where('path', 'not like', '/storage%');
        });

        $today = (clone $query)->whereDate('created_at', Carbon::today())->count();
        $thisWeek = (clone $query)->whereBetween('created_at', [
            $now->copy()->startOfWeek(),
            $now->copy()->endOfWeek(),
        ])->count();
        $thisMonth = (clone $query)->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();
        $total = (clone $query)->count();

        return [
            'today' => (int) $today,
            'this_week' => (int) $thisWeek,
            'this_month' => (int) $thisMonth,
            'total' => (int) $total,
            'raw_today' => (int) $today,
            'raw_this_week' => (int) $thisWeek,
            'raw_this_month' => (int) $thisMonth,
            'raw_total' => (int) $total,
        ];
    }
}
