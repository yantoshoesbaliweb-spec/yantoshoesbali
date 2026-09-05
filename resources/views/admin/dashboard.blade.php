@extends('admin.layouts.app')

@section('title', 'Dashboard - Yanto Shoes Bali Admin')

@section('content')
<div class="dashboard-viewport-lock container-fluid px-0">
  
  <!-- Compact Header Row: Title, Live Clock Widget, & Actions -->
  <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-2 dashboard-header-bar">
    <div class="d-flex align-items-center gap-3">
      <div>
        <div class="d-flex align-items-center gap-2">
          <h1 class="h4 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.45rem; line-height: 1.1;">
            Dashboard Overview
          </h1>
          <span class="badge rounded-pill" style="background: rgba(219, 162, 76, 0.15); color: var(--admin-gold, #dba24c); font-size: 0.68rem; font-weight: 600;">
            Admin Panel
          </span>
        </div>
        <small class="text-muted" style="font-size: 0.78rem;">
          Welcome back, <strong style="color: var(--admin-text);">{{ Auth::user()->name ?? 'Administrator' }}</strong>
        </small>
      </div>
    </div>

    <!-- Live Clock & Date Pill -->
    <div class="d-flex align-items-center gap-2">
      <div class="d-flex align-items-center gap-2 px-3 py-1.5 rounded-pill shadow-sm" style="background: var(--admin-primary, #391802); border: 1px solid rgba(219, 162, 76, 0.3);">
        <i class="bi bi-calendar2-week text-warning" style="font-size: 0.78rem;"></i>
        <span id="liveDayDateText" style="font-size: 0.78rem; color: #f3c77d; font-weight: 500;">
          {{ $dayName }}, {{ $dateFormatted }}
        </span>
        <span style="color: rgba(255, 255, 255, 0.3); font-size: 0.75rem;">&bull;</span>
        <i class="bi bi-clock text-warning" style="font-size: 0.78rem;"></i>
        <span id="liveClockDisplay" class="font-monospace fw-bold text-white" style="font-size: 0.95rem; letter-spacing: 0.04em;">
          {{ $timeFormatted }}
        </span>
        <span class="badge bg-warning text-dark px-1.5 py-0.5" style="font-size: 0.62rem; font-weight: 700; letter-spacing: 0.04em;">
          WITA
        </span>
      </div>

      <!-- Quick Action Buttons -->
      <a href="{{ route('visitor.home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-none d-sm-inline-flex align-items-center gap-1 px-2.5 py-1.5" style="font-size: 0.78rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;" title="Open Live Visitor Website">
        <i class="bi bi-globe"></i>
        <span>Live Site</span>
      </a>
      <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1 px-2.5 py-1.5" style="font-size: 0.78rem; border-radius: 6px;" title="Add New Product">
        <i class="bi bi-plus-lg"></i>
        <span>Add Product</span>
      </a>
    </div>
  </div>

  <!-- Compact 5-Card Metrics Row (Fits horizontally without vertical bulk) -->
  <div class="row g-2 dashboard-metrics-row">
    
    <!-- 1. Visits Today -->
    <div class="col-6 col-md-4 col-xl">
      <div class="card p-2.5 px-3 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 8px;">
        <div class="d-flex align-items-center justify-content-between mb-1">
          <span class="text-muted fw-semibold" style="font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Visits Today
          </span>
          <div class="d-flex align-items-center justify-content-center rounded" style="width: 28px; height: 28px; background: rgba(219, 162, 76, 0.12); color: var(--admin-gold, #dba24c); font-size: 0.85rem;">
            <i class="bi bi-eye"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline justify-content-between">
          <div class="fw-bold" style="font-size: 1.5rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
            {{ number_format($visitorMetrics['today']) }}
          </div>
          <span class="badge bg-success-subtle text-success py-0.5 px-1.5" style="font-size: 0.64rem; font-weight: 500;">
            Today
          </span>
        </div>
      </div>
    </div>

    <!-- 2. Visits This Week -->
    <div class="col-6 col-md-4 col-xl">
      <div class="card p-2.5 px-3 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 8px;">
        <div class="d-flex align-items-center justify-content-between mb-1">
          <span class="text-muted fw-semibold" style="font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Visits This Week
          </span>
          <div class="d-flex align-items-center justify-content-center rounded" style="width: 28px; height: 28px; background: rgba(13, 110, 253, 0.12); color: #0d6efd; font-size: 0.85rem;">
            <i class="bi bi-calendar-week"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline justify-content-between">
          <div class="fw-bold" style="font-size: 1.5rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
            {{ number_format($visitorMetrics['this_week']) }}
          </div>
          <span class="badge bg-primary-subtle text-primary py-0.5 px-1.5" style="font-size: 0.64rem; font-weight: 500;">
            This Week
          </span>
        </div>
      </div>
    </div>

    <!-- 3. Visits This Month -->
    <div class="col-6 col-md-4 col-xl">
      <div class="card p-2.5 px-3 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 8px;">
        <div class="d-flex align-items-center justify-content-between mb-1">
          <span class="text-muted fw-semibold" style="font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Visits This Month
          </span>
          <div class="d-flex align-items-center justify-content-center rounded" style="width: 28px; height: 28px; background: rgba(25, 135, 84, 0.12); color: #198754; font-size: 0.85rem;">
            <i class="bi bi-calendar3"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline justify-content-between">
          <div class="fw-bold" style="font-size: 1.5rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
            {{ number_format($visitorMetrics['this_month']) }}
          </div>
          <span class="badge bg-success-subtle text-success py-0.5 px-1.5" style="font-size: 0.64rem; font-weight: 500;">
            {{ $now->translatedFormat('F') }}
          </span>
        </div>
      </div>
    </div>

    <!-- 4. Total Products -->
    <div class="col-6 col-md-6 col-xl">
      <div class="card p-2.5 px-3 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 8px;">
        <div class="d-flex align-items-center justify-content-between mb-1">
          <span class="text-muted fw-semibold" style="font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Total Products
          </span>
          <div class="d-flex align-items-center justify-content-center rounded" style="width: 28px; height: 28px; background: rgba(114, 57, 234, 0.12); color: #7239ea; font-size: 0.85rem;">
            <i class="bi bi-box-seam"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline justify-content-between">
          <div class="d-flex align-items-baseline gap-1">
            <span class="fw-bold" style="font-size: 1.5rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
              {{ $totalProducts }}
            </span>
            <span class="text-muted" style="font-size: 0.72rem;">Shoe Models</span>
          </div>
          <span class="badge bg-secondary-subtle text-secondary py-0.5 px-1.5" style="font-size: 0.64rem; font-weight: 500;">
            {{ $activeProducts }} Active
          </span>
        </div>
      </div>
    </div>

    <!-- 5. Cumulative Visits (All-Time) -->
    <div class="col-12 col-md-6 col-xl">
      <div class="card p-2.5 px-3 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: linear-gradient(135deg, var(--admin-surface) 0%, rgba(219, 162, 76, 0.06) 100%); border-radius: 8px;">
        <div class="d-flex align-items-center justify-content-between mb-1">
          <span class="text-muted fw-semibold" style="font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Cumulative Visits
          </span>
          <div class="d-flex align-items-center justify-content-center rounded" style="width: 28px; height: 28px; background: rgba(219, 162, 76, 0.2); color: var(--admin-gold, #dba24c); font-size: 0.85rem;">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline justify-content-between">
          <div class="fw-bold" style="font-size: 1.5rem; color: var(--admin-brand, #391802); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
            {{ number_format($visitorMetrics['total']) }}
          </div>
          <span class="badge bg-warning text-dark py-0.5 px-1.5" style="font-size: 0.64rem; font-weight: 600;">
            All Time
          </span>
        </div>
      </div>
    </div>

  </div>

  <!-- Bottom Main Row: Recent Products & Quick Actions (Fills available height without scroll) -->
  <div class="row g-2 dashboard-main-row flex-grow-1">
    
    <!-- Recent Products Table (Scrollable within container if needed) -->
    <div class="col-12 col-lg-8 h-100">
      <div class="card border shadow-sm dashboard-scroll-panel" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 8px;">
        
        <!-- Panel Header -->
        <div class="p-2.5 px-3 border-bottom d-flex align-items-center justify-content-between" style="border-color: var(--admin-border) !important;">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-collection text-primary" style="font-size: 0.85rem;"></i>
            <h2 class="h6 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.15rem;">
              Recent Products Collection
            </h2>
            <span class="badge bg-light text-muted border py-0.5 px-1.5" style="font-size: 0.65rem;">
              {{ $recentProducts->count() }} items
            </span>
          </div>
          <a href="{{ route('admin.products') }}" class="btn btn-sm btn-outline-secondary py-0.5 px-2 d-inline-flex align-items-center gap-1" style="font-size: 0.74rem; border-color: var(--admin-border);">
            <span>Catalog</span>
            <i class="bi bi-arrow-right" style="font-size: 0.7rem;"></i>
          </a>
        </div>

        <!-- Scrollable Table Container -->
        <div class="dashboard-table-scroll p-0">
          <table class="table table-hover align-middle mb-0" style="font-size: 0.82rem;">
            <thead>
              <tr style="border-bottom: 1px solid var(--admin-border); color: var(--admin-muted); font-size: 0.72rem; text-transform: uppercase;">
                <th style="width: 48px;" class="ps-3">Photo</th>
                <th>Product Name</th>
                <th>Category / Series</th>
                <th>Turnaround</th>
                <th>Status</th>
                <th class="text-end pe-3">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentProducts as $p)
              <tr>
                <td class="ps-3 py-1.5">
                  <img
                    src="{{ asset($p->primary_image ?? 'images/product_tan.png') }}"
                    alt="{{ $p->name }}"
                    onerror="this.onerror=null;this.src='{{ asset('images/product_tan.png') }}';"
                    style="width: 36px; height: 36px; object-fit: cover; border-radius: 5px; border: 1px solid var(--admin-border);"
                  />
                </td>
                <td class="py-1.5">
                  <strong style="color: var(--admin-text); font-size: 0.84rem;">{{ $p->name }}</strong>
                </td>
                <td class="py-1.5">
                  <span class="text-muted" style="font-size: 0.78rem;">
                    {{ $p->series ?? ($p->categoryRelation->name ?? '-') }}
                  </span>
                </td>
                <td class="py-1.5">
                  <small class="text-muted" style="font-size: 0.75rem;">{{ $p->turnaround ?: '7 Days' }}</small>
                </td>
                <td class="py-1.5">
                  <span class="badge {{ $p->status === 'Active' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}" style="font-size: 0.68rem; font-weight: 500;">
                    {{ $p->status }}
                  </span>
                </td>
                <td class="text-end pe-3 py-1.5">
                  <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-sm btn-outline-primary py-0.5 px-2" style="font-size: 0.72rem;" title="Edit Product">
                    <i class="bi bi-pencil"></i>
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center py-4 text-muted" style="font-size: 0.82rem;">
                  No products registered yet. <a href="{{ route('admin.products.create') }}" style="color: var(--admin-gold);">Add now &rarr;</a>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="col-12 col-lg-4 h-100">
      <div class="card border shadow-sm dashboard-scroll-panel" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 8px;">
        
        <!-- Panel Header -->
        <div class="p-2.5 px-3 border-bottom d-flex align-items-center justify-content-between" style="border-color: var(--admin-border) !important;">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-lightning-charge text-warning" style="font-size: 0.85rem;"></i>
            <h2 class="h6 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.15rem;">
              Quick Actions
            </h2>
          </div>
          <small class="text-muted" style="font-size: 0.72rem;">Shortcuts</small>
        </div>

        <!-- Action Links -->
        <div class="p-2.5 d-flex flex-column gap-1.5 flex-grow-1 justify-content-between">
          
          <a href="{{ route('admin.products.create') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border transition-all" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.8rem;">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-plus-circle-fill text-primary" style="font-size: 0.85rem;"></i>
              <span class="fw-medium">Add New Boot Model</span>
            </div>
            <i class="bi bi-chevron-right text-muted" style="font-size: 0.7rem;"></i>
          </a>

          <a href="{{ route('admin.guides.shoe-toes') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border transition-all" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.8rem;">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-bezier2 text-warning" style="font-size: 0.85rem;"></i>
              <span class="fw-medium">Shoe Toe Silhouette Guide</span>
            </div>
            <i class="bi bi-chevron-right text-muted" style="font-size: 0.7rem;"></i>
          </a>

          <a href="{{ route('admin.guides.leathers') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border transition-all" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.8rem;">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-palette-fill text-success" style="font-size: 0.85rem;"></i>
              <span class="fw-medium">Leather Varieties Guide</span>
            </div>
            <i class="bi bi-chevron-right text-muted" style="font-size: 0.7rem;"></i>
          </a>

          <a href="{{ route('admin.content.header') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border transition-all" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.8rem;">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-sliders text-info" style="font-size: 0.85rem;"></i>
              <span class="fw-medium">Hero Slider &amp; Announcements</span>
            </div>
            <i class="bi bi-chevron-right text-muted" style="font-size: 0.7rem;"></i>
          </a>

          <a href="{{ route('admin.content.testimonies') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border transition-all" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.8rem;">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-chat-quote-fill text-secondary" style="font-size: 0.85rem;"></i>
              <span class="fw-medium">Customer Reviews Management</span>
            </div>
            <i class="bi bi-chevron-right text-muted" style="font-size: 0.7rem;"></i>
          </a>

          <!-- Store Status Info Box -->
          <div class="p-2 rounded mt-1 d-flex align-items-center justify-content-between" style="background: rgba(219, 162, 76, 0.08); border: 1px dashed rgba(219, 162, 76, 0.3); font-size: 0.74rem;">
            <div class="d-flex align-items-center gap-1.5 text-muted">
              <i class="bi bi-geo-alt-fill text-warning"></i>
              <span>Outlets: <strong>Legian &bull; Canggu &bull; Uluwatu</strong></span>
            </div>
            <a href="{{ route('admin.about.stores') }}" class="text-decoration-none fw-semibold" style="color: var(--admin-gold, #dba24c); font-size: 0.72rem;">
              Stores &rarr;
            </a>
          </div>

        </div>

      </div>
    </div>

  </div>

</div>

<style>
  /* Prevent Vertical Overflow On Desktop / Laptop Screens */
  @media (min-width: 992px) {
    /* Tighten layout padding inside main for dashboard only */
    .admin-main:has(.dashboard-viewport-lock) .admin-content {
      padding: 0.75rem 1.25rem !important;
      overflow: hidden !important;
    }
    
    /* Lock the dashboard to viewport height */
    .dashboard-viewport-lock {
      height: calc(100vh - 128px);
      display: flex;
      flex-direction: column;
      gap: 0.65rem;
      overflow: hidden;
    }

    .dashboard-header-bar {
      flex-shrink: 0;
    }

    .dashboard-metrics-row {
      flex-shrink: 0;
    }

    .dashboard-main-row {
      flex: 1 1 0;
      min-height: 0; /* Crucial for inner child overflow-y auto */
    }

    .dashboard-scroll-panel {
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .dashboard-table-scroll {
      flex: 1 1 0;
      overflow-y: auto;
      min-height: 0;
    }

    /* Elegant Custom Scrollbar */
    .dashboard-table-scroll::-webkit-scrollbar {
      width: 5px;
    }
    .dashboard-table-scroll::-webkit-scrollbar-track {
      background: transparent;
    }
    .dashboard-table-scroll::-webkit-scrollbar-thumb {
      background: rgba(219, 162, 76, 0.3);
      border-radius: 4px;
    }
    .dashboard-table-scroll::-webkit-scrollbar-thumb:hover {
      background: var(--admin-gold, #dba24c);
    }
  }

  /* Hover micro-interactions */
  .transition-all {
    transition: all 0.18s ease-in-out;
  }
  .transition-all:hover {
    transform: translateX(2px);
    border-color: var(--admin-gold) !important;
    background: #ffffff !important;
  }
</style>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const clockEl = document.getElementById('liveClockDisplay');
    const dayDateEl = document.getElementById('liveDayDateText');

    const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const monthNames = [
      'January', 'February', 'March', 'April', 'May', 'June',
      'July', 'August', 'September', 'October', 'November', 'December'
    ];

    function updateLiveClock() {
      // Create date object
      const now = new Date();
      
      // Format time
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      
      if (clockEl) {
        clockEl.textContent = `${hours}:${minutes}:${seconds}`;
      }

      // Update date periodically
      if (dayDateEl) {
        const dayName = dayNames[now.getDay()];
        const dayNum = String(now.getDate()).padStart(2, '0');
        const monthName = monthNames[now.getMonth()];
        const year = now.getFullYear();
        dayDateEl.textContent = `${dayName}, ${monthName} ${dayNum}, ${year}`;
      }
    }

    // Run immediately and every second
    updateLiveClock();
    setInterval(updateLiveClock, 1000);
  });
</script>
@endpush
