<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardMetricsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_visitor_log_can_record_visit_and_deduplicate_rapid_hits(): void
    {
        $ip = '192.168.' . rand(10, 99) . '.' . rand(10, 99);
        $path = '/products';

        $request = Request::create($path, 'GET', [], [], [], [
            'REMOTE_ADDR' => $ip,
            'HTTP_USER_AGENT' => 'Mozilla/5.0 TestBrowser'
        ]);

        $logged1 = VisitorLog::recordVisit($request);
        $this->assertNotNull($logged1);

        // Immediate subsequent request from same IP & path should be de-duplicated
        $logged2 = VisitorLog::recordVisit($request);
        $this->assertNull($logged2);

        // Verify count
        $count = VisitorLog::where('ip_address', $ip)->where('path', $path)->count();
        $this->assertEquals(1, $count);
    }

    public function test_visitor_log_get_metrics_returns_expected_structure(): void
    {
        $metrics = VisitorLog::getMetrics();

        $this->assertArrayHasKey('today', $metrics);
        $this->assertArrayHasKey('this_week', $metrics);
        $this->assertArrayHasKey('this_month', $metrics);
        $this->assertArrayHasKey('total', $metrics);

        $this->assertIsInt($metrics['today']);
        $this->assertIsInt($metrics['this_week']);
        $this->assertIsInt($metrics['this_month']);
        $this->assertIsInt($metrics['total']);
    }

    public function test_admin_dashboard_renders_live_time_visitor_metrics_and_total_products(): void
    {
        // Find or create admin user
        $user = User::first() ?? User::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertStatus(200);

        // 1. Check Hari, Tanggal, & Waktu
        $response->assertSee('liveDayDateText', false);
        $response->assertSee('liveClockDisplay', false);
        $response->assertSee('WITA');

        // 2. Check Total Visits Today, This Week, This Month
        $response->assertSee('Visits Today');
        $response->assertSee('Visits This Week');
        $response->assertSee('Visits This Month');

        // 3. Check Total Product
        $response->assertSee('Total Products');
        $response->assertSee('Shoe Models');
    }

    public function test_track_visitor_middleware_ignores_admin_and_api(): void
    {
        $adminRequest = Request::create('/admin/dashboard', 'GET', [], [], [], [
            'REMOTE_ADDR' => '10.0.0.99'
        ]);
        $this->assertNull(VisitorLog::recordVisit($adminRequest));

        $apiReq = Request::create('/api/user', 'GET', [], [], [], [
            'REMOTE_ADDR' => '10.0.0.99'
        ]);
        $this->assertNull(VisitorLog::recordVisit($apiReq));
    }
}
