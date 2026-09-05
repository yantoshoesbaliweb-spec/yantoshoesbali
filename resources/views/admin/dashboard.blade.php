@extends('admin.layouts.app')

@section('title', 'Dashboard - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">
  
  <!-- Breadcrumb & Header Bar -->
  <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.78rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Dashboard</li>
        </ol>
      </nav>
      <h1 class="h4 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.6rem; line-height: 1.1;">
        Dashboard Overview
      </h1>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.82rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-globe"></i>
        <span>Live Site</span>
      </a>
      <a href="{{ route('admin.products.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.82rem; border-radius: 6px;">
        <i class="bi bi-plus-lg"></i>
        <span>Add Product</span>
      </a>
    </div>
  </div>

  <!-- Key Metrics Row: Visits Today, This Week, This Month, & Total Cumulative Visitors -->
  <div class="row g-3 g-xl-4 mb-4">
    
    <!-- 1. Visits Today -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Visits Today
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(219, 162, 76, 0.12); color: var(--admin-gold, #dba24c); font-size: 1.25rem;">
            <i class="bi bi-eye"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
          {{ number_format($visitorMetrics['today']) }}
        </div>
        <div class="d-flex align-items-center gap-1 mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge bg-success-subtle text-success py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
            <i class="bi bi-check-circle me-1"></i>Today
          </span>
          <span class="text-truncate">{{ $dayName }} Traffic</span>
        </div>
      </div>
    </div>

    <!-- 2. Visits This Week -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Visits This Week
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(13, 110, 253, 0.12); color: #0d6efd; font-size: 1.25rem;">
            <i class="bi bi-calendar-week"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
          {{ number_format($visitorMetrics['this_week']) }}
        </div>
        <div class="d-flex align-items-center gap-1 mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge bg-primary-subtle text-primary py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
            This Week
          </span>
          <span class="text-truncate">Monday &ndash; Sunday</span>
        </div>
      </div>
    </div>

    <!-- 3. Visits This Month -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Visits This Month
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(25, 135, 84, 0.12); color: #198754; font-size: 1.25rem;">
            <i class="bi bi-calendar3"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
          {{ number_format($visitorMetrics['this_month']) }}
        </div>
        <div class="d-flex align-items-center gap-1 mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge bg-success-subtle text-success py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
            {{ $now->translatedFormat('F') }}
          </span>
          <span class="text-truncate">Year {{ $now->year }}</span>
        </div>
      </div>
    </div>

    <!-- 4. Total Cumulative Visitors (Total Visitor Akumulatif) -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Total Visitors
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(114, 57, 234, 0.12); color: #7239ea; font-size: 1.25rem;">
            <i class="bi bi-people"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1; font-family: 'Cormorant Garamond', Georgia, serif;">
          {{ number_format($visitorMetrics['total']) }}
        </div>
        <div class="d-flex align-items-center justify-content-between mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge py-1 px-2" style="background: rgba(114, 57, 234, 0.12); color: #7239ea; font-size: 0.7rem; font-weight: 500;">
            <i class="bi bi-graph-up-arrow me-1"></i>All-Time
          </span>
          <span class="text-truncate">Cumulative Visitors</span>
        </div>
      </div>
    </div>

  </div>

  <!-- Bottom Section: Roomy Product Table (Max 4 Items) & Brand-New Quick Action Console -->
  <div class="row g-4 mb-4">
    
    <!-- Table Products (Roomy / Diperbesar, Maksimal 4 Item, Menampilkan Total Products) -->
    <div class="col-12 col-lg-8">
      <div class="card p-4 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 14px;">
        
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3 pb-3 border-bottom" style="border-color: var(--admin-border) !important;">
          <div>
            <div class="d-flex align-items-center gap-2 mb-1">
              <div class="d-inline-flex align-items-center justify-content-center rounded-2" style="width: 34px; height: 34px; background: rgba(219, 162, 76, 0.12); color: var(--admin-gold, #dba24c); font-size: 1.15rem;">
                <i class="bi bi-box-seam"></i>
              </div>
              <h3 class="h5 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.45rem;">
                Recent Products Collection
              </h3>
            </div>
            <!-- Total Products Displayed in Table Header -->
            <div class="d-flex flex-wrap align-items-center gap-2 mt-1.5">
              <span class="badge bg-primary-subtle text-primary py-1 px-2.5" style="font-size: 0.78rem; font-weight: 600; border-radius: 6px;">
                <i class="bi bi-tag-fill me-1"></i>Total Products: {{ $totalProducts }} Shoe Models
              </span>
              <span class="badge bg-success-subtle text-success py-1 px-2" style="font-size: 0.74rem; font-weight: 500; border-radius: 6px;">
                {{ $activeProducts }} Active
              </span>
              <small class="text-muted ms-1" style="font-size: 0.8rem;">&bull; Showing latest 3 boot models</small>
            </div>
          </div>
          <a href="{{ route('admin.products') }}" class="btn btn-sm btn-outline-secondary px-3 py-2 d-inline-flex align-items-center gap-2" style="font-size: 0.82rem; border-color: var(--admin-border); border-radius: 6px;">
            <span>Manage All Products</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
            <thead>
              <tr style="border-bottom: 2px solid var(--admin-border); color: var(--admin-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.06em;">
                <th class="py-3" style="width: 72px;">Photo</th>
                <th class="py-3">Product Name</th>
                <th class="py-3">Category / Series</th>
                <th class="py-3">Turnaround</th>
                <th class="py-3">Status</th>
                <th class="py-3 text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentProducts->take(3) as $p)
              <tr style="border-bottom: 1px solid var(--admin-border);">
                <td class="py-3">
                  <div class="position-relative" style="width: 52px; height: 52px;">
                    <img
                      src="{{ asset($p->primary_image ?? 'images/product_tan.png') }}"
                      alt="{{ $p->name }}"
                      onerror="this.onerror=null;this.src='{{ asset('images/product_tan.png') }}';"
                      style="width: 52px; height: 52px; object-fit: cover; border-radius: 8px; border: 1px solid var(--admin-border); box-shadow: 0 2px 8px rgba(0,0,0,0.06);"
                    />
                  </div>
                </td>
                <td class="py-3">
                  <div class="fw-bold" style="color: var(--admin-text); font-size: 0.96rem;">{{ $p->name }}</div>
                  <small class="text-muted" style="font-size: 0.78rem;">Slug: {{ $p->slug }}</small>
                </td>
                <td class="py-3">
                  <span class="badge px-2.5 py-1" style="background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.8rem; border: 1px solid var(--admin-border); font-weight: 500;">
                    {{ $p->series ?? ($p->categoryRelation->name ?? '-') }}
                  </span>
                </td>
                <td class="py-3">
                  <span class="text-muted" style="font-size: 0.85rem;"><i class="bi bi-clock-history me-1.5 text-warning"></i>{{ $p->turnaround ?: '7 Days' }}</span>
                </td>
                <td class="py-3">
                  <span class="badge {{ $p->status === 'Active' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}" style="font-size: 0.76rem; padding: 5px 10px; border-radius: 6px; font-weight: 600;">
                    <i class="bi {{ $p->status === 'Active' ? 'bi-check-circle-fill' : 'bi-pause-circle-fill' }} me-1"></i>{{ $p->status }}
                  </span>
                </td>
                <td class="text-end py-3">
                  <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-sm btn-outline-primary px-3 py-1.5 d-inline-flex align-items-center gap-1.5" style="font-size: 0.82rem; border-radius: 6px;" title="Edit Product">
                    <i class="bi bi-pencil-square"></i>
                    <span>Edit</span>
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center py-5 text-muted" style="font-size: 0.9rem;">
                  <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                  No products registered yet. <a href="{{ route('admin.products.create') }}" class="fw-semibold" style="color: var(--admin-gold);">Add your first product &rarr;</a>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- BRAND-NEW SHORTCUTS DESIGN: Atelier Command Console (Mewah, Ramping, Sempurna dengan Footer) -->
    <div class="col-12 col-lg-4">
      <div class="card p-4 border shadow-sm h-100 d-flex flex-column justify-content-between" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 14px;">
        
        <div>
          <!-- Header Console -->
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2.5 border-bottom" style="border-color: var(--admin-border) !important;">
            <div class="d-flex align-items-center gap-2">
              <div class="d-inline-flex align-items-center justify-content-center rounded-2" style="width: 32px; height: 32px; background: rgba(219, 162, 76, 0.12); color: var(--admin-gold, #dba24c); font-size: 1.1rem;">
                <i class="bi bi-lightning-charge-fill"></i>
              </div>
              <h3 class="h5 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.4rem;">
                Quick Actions
              </h3>
            </div>
            <span class="badge bg-warning text-dark px-2.5 py-1" style="font-size: 0.7rem; font-weight: 600;">
              Shortcuts
            </span>
          </div>

          <!-- 1. Featured Primary Action: Dark Leather Hero Card -->
          <a href="{{ route('admin.products.create') }}" class="primary-shortcut-hero d-flex align-items-center justify-content-between p-3 px-3.5 rounded-3 text-decoration-none mb-3 shadow-sm" style="background: linear-gradient(135deg, #391802 0%, #4a2003 100%); color: #ffffff; border: 1px solid rgba(219, 162, 76, 0.35); border-radius: 10px;">
            <div class="d-flex align-items-center gap-3">
              <div class="d-flex align-items-center justify-content-center rounded-2" style="width: 38px; height: 38px; background: rgba(219, 162, 76, 0.22); color: var(--admin-gold, #dba24c); font-size: 1.2rem; flex-shrink: 0;">
                <i class="bi bi-plus-lg"></i>
              </div>
              <div>
                <strong class="d-block text-white" style="font-size: 0.92rem; line-height: 1.2;">Add New Product</strong>
                <small style="color: rgba(255, 255, 255, 0.72); font-size: 0.74rem;">Register handcrafted boot</small>
              </div>
            </div>
            <i class="bi bi-arrow-right-circle-fill" style="color: var(--admin-gold, #dba24c); font-size: 1.3rem;"></i>
          </a>

          <!-- 2. Refined Atelier Management Links: Spacing Diperlebar (gap-3) -->
          <div class="d-flex flex-column gap-3">
            
            <!-- Shoe Toe Guide -->
            <a href="{{ route('admin.guides.shoe-toes') }}" class="atelier-nav-link d-flex align-items-center justify-content-between p-2.5 px-3 rounded-2 text-decoration-none" style="background: var(--admin-surface-soft); color: var(--admin-text);">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-2" style="width: 34px; height: 34px; background: rgba(219, 162, 76, 0.14); color: #b78103; font-size: 1rem; flex-shrink: 0;">
                  <i class="bi bi-bezier2"></i>
                </div>
                <div>
                  <span class="fw-semibold d-block" style="font-size: 0.86rem; line-height: 1.2;">Shoe Toe Guide</span>
                  <small class="text-muted" style="font-size: 0.72rem;">Toe shapes &amp; lasts</small>
                </div>
              </div>
              <i class="bi bi-chevron-right nav-arrow" style="font-size: 0.85rem;"></i>
            </a>

            <!-- Leather Varieties Guide -->
            <a href="{{ route('admin.guides.leathers') }}" class="atelier-nav-link d-flex align-items-center justify-content-between p-2.5 px-3 rounded-2 text-decoration-none" style="background: var(--admin-surface-soft); color: var(--admin-text);">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-2" style="width: 34px; height: 34px; background: rgba(25, 135, 84, 0.12); color: #198754; font-size: 1rem; flex-shrink: 0;">
                  <i class="bi bi-palette"></i>
                </div>
                <div>
                  <span class="fw-semibold d-block" style="font-size: 0.86rem; line-height: 1.2;">Leather Varieties</span>
                  <small class="text-muted" style="font-size: 0.72rem;">Swatches &amp; colors</small>
                </div>
              </div>
              <i class="bi bi-chevron-right nav-arrow" style="font-size: 0.85rem;"></i>
            </a>

            <!-- Hero Slider & Announcements -->
            <a href="{{ route('admin.content.header') }}" class="atelier-nav-link d-flex align-items-center justify-content-between p-2.5 px-3 rounded-2 text-decoration-none" style="background: var(--admin-surface-soft); color: var(--admin-text);">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-2" style="width: 34px; height: 34px; background: rgba(13, 202, 240, 0.12); color: #0aa2c0; font-size: 1rem; flex-shrink: 0;">
                  <i class="bi bi-sliders"></i>
                </div>
                <div>
                  <span class="fw-semibold d-block" style="font-size: 0.86rem; line-height: 1.2;">Hero Slider &amp; Banners</span>
                  <small class="text-muted" style="font-size: 0.72rem;">Homepage banners</small>
                </div>
              </div>
              <i class="bi bi-chevron-right nav-arrow" style="font-size: 0.85rem;"></i>
            </a>

            <!-- Customer Reviews & Testimonies -->
            <a href="{{ route('admin.content.testimonies') }}" class="atelier-nav-link d-flex align-items-center justify-content-between p-2.5 px-3 rounded-2 text-decoration-none" style="background: var(--admin-surface-soft); color: var(--admin-text);">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-2" style="width: 34px; height: 34px; background: rgba(111, 66, 193, 0.12); color: #6f42c1; font-size: 1rem; flex-shrink: 0;">
                  <i class="bi bi-chat-quote"></i>
                </div>
                <div>
                  <span class="fw-semibold d-block" style="font-size: 0.86rem; line-height: 1.2;">Customer Reviews</span>
                  <small class="text-muted" style="font-size: 0.72rem;">Visitor feedback</small>
                </div>
              </div>
              <i class="bi bi-chevron-right nav-arrow" style="font-size: 0.85rem;"></i>
            </a>

          </div>
        </div>

      </div>
    </div>

  </div>

</div>

<style>
  .primary-shortcut-hero {
    transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .primary-shortcut-hero:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(57, 24, 2, 0.3) !important;
    border-color: var(--admin-gold, #dba24c) !important;
  }
  .atelier-nav-link {
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    border: 1px solid var(--admin-border);
  }
  .atelier-nav-link:hover {
    background: #ffffff !important;
    border-color: var(--admin-gold, #dba24c) !important;
    transform: translateX(3px);
    box-shadow: 0 4px 12px rgba(219, 162, 76, 0.12);
  }
  .atelier-nav-link .nav-arrow {
    transition: transform 0.2s ease, color 0.2s ease;
    color: var(--admin-muted);
  }
  .atelier-nav-link:hover .nav-arrow {
    transform: translateX(3px);
    color: var(--admin-gold, #dba24c) !important;
  }
</style>
@endsection
