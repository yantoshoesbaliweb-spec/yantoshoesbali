@extends('admin.layouts.app')

@section('title', 'Dashboard - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">
  
  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Dashboard</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Artisan Workshop Overview
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Welcome back, Mr. Yanto. Here is the operational summary of your 3 Bali stores &amp; custom boot production.</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('admin.orders') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; font-weight: 500; border-radius: 6px;">
        <i class="bi bi-plus-circle"></i>
        <span>New Custom Inquiry</span>
      </a>
      <a href="{{ route('visitor.home') }}" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-eye"></i>
        <span>Preview Website</span>
      </a>
    </div>
  </div>

  <!-- 1. Metric Stats Cards -->
  <div class="row g-3 mb-4">
    
    <!-- Stat 1: Total Inquiries -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="metric-card card h-100 p-3">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <span class="metric-title">Total Inquiries</span>
          <div class="metric-icon-wrap" style="background: rgba(219, 162, 76, 0.15); color: var(--admin-gold, #dba24c);">
            <i class="bi bi-chat-heart"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline gap-2">
          <span class="metric-value">{{ $stats['total_inquiries'] }}</span>
          <span class="badge bg-success-subtle text-success fw-bold" style="font-size: 0.75rem;">+24% this mo</span>
        </div>
        <small class="text-muted mt-2" style="font-size: 0.75rem;">Direct from WhatsApp &amp; In-Store</small>
      </div>
    </div>

    <!-- Stat 2: Active Custom Orders -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="metric-card card h-100 p-3">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <span class="metric-title">Active Bespoke Orders</span>
          <div class="metric-icon-wrap" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
            <i class="bi bi-hammer"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline gap-2">
          <span class="metric-value">{{ $stats['active_orders'] }}</span>
          <span class="badge bg-warning-subtle text-warning-emphasis fw-bold" style="font-size: 0.75rem;">6 Ready this week</span>
        </div>
        <small class="text-muted mt-2" style="font-size: 0.75rem;">Under artisan production (7-day cycle)</small>
      </div>
    </div>

    <!-- Stat 3: Boot Models in Catalog -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="metric-card card h-100 p-3">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <span class="metric-title">Catalog Models</span>
          <div class="metric-icon-wrap" style="background: rgba(34, 197, 94, 0.15); color: #22c55e;">
            <i class="bi bi-box-seam"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline gap-2">
          <span class="metric-value">{{ $stats['boot_models'] }}</span>
          <span class="badge bg-success-subtle text-success fw-bold" style="font-size: 0.75rem;">100% Genuine Leather</span>
        </div>
        <small class="text-muted mt-2" style="font-size: 0.75rem;">Heritage, Boho &amp; Bold Collections</small>
      </div>
    </div>

    <!-- Stat 4: Bali Store Outlets -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="metric-card card h-100 p-3">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <span class="metric-title">Bali Stores</span>
          <div class="metric-icon-wrap" style="background: rgba(168, 85, 247, 0.15); color: #a855f7;">
            <i class="bi bi-shop"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline gap-2">
          <span class="metric-value">{{ $stats['store_outlets'] }}</span>
          <span class="badge bg-info-subtle text-info-emphasis fw-bold" style="font-size: 0.75rem;">All Open Today</span>
        </div>
        <small class="text-muted mt-2" style="font-size: 0.75rem;">Legian &bull; Canggu &bull; Uluwatu</small>
      </div>
    </div>

  </div>

  <!-- 2. Main Content Grid (Recent Inquiries + Showcase Sidebar) -->
  <div class="row g-4 mb-4">
    
    <!-- Left Column: Recent Inquiries Table -->
    <div class="col-12 col-xl-8">
      <div class="card h-100">
        
        <div class="card-header bg-transparent border-bottom d-flex align-items-center justify-content-between p-3" style="border-color: var(--admin-border) !important;">
          <div>
            <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.1rem;">
              <i class="bi bi-chat-left-text me-2" style="color: var(--admin-gold, #dba24c);"></i>Recent Custom Inquiries &amp; Orders
            </h5>
            <small class="text-muted">Live customer orders from international travelers and website inquiries</small>
          </div>
          <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-outline-secondary" style="font-size: 0.78rem; border-color: var(--admin-border); color: var(--admin-text);">
            View All &rarr;
          </a>
        </div>

        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
              <thead>
                <tr>
                  <th class="ps-3">ID &amp; Client</th>
                  <th>Origin</th>
                  <th>Boot Model</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th class="text-end pe-3">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($recentInquiries as $inq)
                <tr>
                  <td class="ps-3">
                    <div class="fw-bold" style="color: var(--admin-text);">{{ $inq['customer'] }}</div>
                    <span class="badge bg-secondary-subtle text-secondary" style="font-size: 0.68rem;">{{ $inq['id'] }}</span>
                  </td>
                  <td>
                    <span class="me-1">{{ $inq['flag'] }}</span>
                    <span>{{ $inq['origin'] }}</span>
                  </td>
                  <td>
                    <div class="fw-semibold" style="color: var(--admin-text);">{{ $inq['model'] }}</div>
                    <small class="text-muted">{{ $inq['type'] }}</small>
                  </td>
                  <td class="text-muted" style="font-size: 0.78rem;">
                    {{ $inq['date'] }}
                  </td>
                  <td>
                    <span class="badge {{ $inq['status_class'] }} px-2 py-1" style="font-size: 0.72rem; font-weight: 600;">
                      {{ $inq['status'] }}
                    </span>
                  </td>
                  <td class="text-end pe-3">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq['phone']) }}" target="_blank" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1" style="font-size: 0.74rem;" title="Chat Client on WhatsApp">
                      <i class="bi bi-whatsapp"></i>
                      <span>Chat</span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer bg-transparent border-top p-3 d-flex align-items-center justify-content-between" style="border-color: var(--admin-border) !important; font-size: 0.8rem; color: var(--admin-muted);">
          <span>Showing 5 latest inquiries of 128 total</span>
          <a href="{{ route('admin.orders') }}" class="fw-semibold" style="color: var(--admin-gold, #dba24c); text-decoration: none;">Manage All Orders &rarr;</a>
        </div>

      </div>
    </div>

    <!-- Right Column: Popular Boots & Store Status -->
    <div class="col-12 col-xl-4">
      <div class="d-flex flex-column gap-4">
        
        <!-- Popular Boots Showcase -->
        <div class="card">
          <div class="card-header bg-transparent border-bottom d-flex align-items-center justify-content-between p-3" style="border-color: var(--admin-border) !important;">
            <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
              <i class="bi bi-fire me-2 text-danger"></i>Top Requested Boots
            </h5>
            <a href="{{ route('admin.products') }}" class="text-muted" style="font-size: 0.76rem; text-decoration: none;">View 12 &rarr;</a>
          </div>

          <div class="card-body p-3">
            <div class="d-flex flex-column gap-3">
              @foreach($popularBoots as $boot)
              <div class="d-flex align-items-center gap-3 p-2 rounded" style="background: var(--admin-surface-soft); border: 1px solid var(--admin-border);">
                <img src="{{ asset($boot['image']) }}" alt="{{ $boot['name'] }}" style="width: 52px; height: 52px; object-fit: cover; border-radius: 6px; border: 1px solid var(--admin-border);" />
                <div class="flex-grow-1 min-w-0">
                  <div class="fw-bold text-truncate" style="font-size: 0.88rem; color: var(--admin-text);">{{ $boot['name'] }}</div>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <small class="text-muted" style="font-size: 0.72rem;">{{ $boot['category'] }}</small>
                    <span class="badge bg-warning text-dark" style="font-size: 0.68rem;">{{ $boot['orders_count'] }} inquiries</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Bali Store Locations Status -->
        <div class="card">
          <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
            <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
              <i class="bi bi-geo-alt me-2" style="color: var(--admin-gold, #dba24c);"></i>Bali Stores Status
            </h5>
          </div>
          <div class="card-body p-3">
            <div class="d-flex flex-column gap-3">
              @foreach($stores as $st)
              <div class="d-flex align-items-start justify-content-between p-2 rounded" style="background: var(--admin-surface-soft); border: 1px solid var(--admin-border);">
                <div>
                  <div class="fw-bold" style="font-size: 0.88rem; color: var(--admin-text);">{{ $st['name'] }}</div>
                  <div class="text-muted" style="font-size: 0.75rem;">{{ $st['location'] }}</div>
                  <div class="d-flex align-items-center gap-1 mt-1 text-success fw-semibold" style="font-size: 0.72rem;">
                    <span class="status-dot" style="width: 6px; height: 6px; background: #22c55e; border-radius: 50%;"></span>
                    <span>{{ $st['status'] }}</span>
                  </div>
                </div>
                <span class="badge bg-secondary" style="font-size: 0.68rem;">{{ $st['badge'] }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>
@endsection
