<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
  <div class="sidebar-header">
    <a class="brand-mark" href="{{ route('admin.dashboard') }}" aria-label="Yanto Shoes Admin Dashboard">
      <span class="brand-icon">
        <img src="{{ asset('images/yanto-logo.png') }}" alt="Logo" style="width: 28px; height: 28px; object-fit: contain;" />
      </span>
      <span class="brand-copy">
        <span class="brand-title">YANTO SHOES</span>
        <span class="brand-subtitle">Bali &bull; Admin Panel</span>
      </span>
    </a>
  </div>

  <nav class="sidebar-nav">
    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
      <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
      <span class="nav-text">Dashboard</span>
    </a>
    
    <a class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}" href="{{ route('admin.products') }}">
      <span class="nav-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
      <span class="nav-text">Boots Catalog</span>
      @php $productCount = \App\Models\Product::count(); @endphp
      @if($productCount > 0)
      <span class="badge rounded-pill bg-warning text-dark ms-auto" style="font-size: 0.7rem; font-weight: 700;">{{ $productCount }}</span>
      @endif
    </a>

    <a class="nav-link {{ request()->routeIs('admin.orders') ? 'active' : '' }}" href="{{ route('admin.orders') }}">
      <span class="nav-icon"><i class="bi bi-chat-left-dots" aria-hidden="true"></i></span>
      <span class="nav-text">Orders &amp; Inquiries</span>
      <span class="badge rounded-pill bg-success ms-auto" style="font-size: 0.7rem; font-weight: 700;">18</span>
    </a>

    <!-- Content Menu & Submenu -->
    <div class="sidebar-menu-group">
      <a class="nav-link {{ request()->is('admin/content*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#contentSubmenu" role="button" aria-expanded="{{ request()->is('admin/content*') ? 'true' : 'false' }}" aria-controls="contentSubmenu">
        <span class="nav-icon"><i class="bi bi-layout-text-window-reverse" aria-hidden="true"></i></span>
        <span class="nav-text">Content</span>
        <i class="bi bi-chevron-down ms-auto submenu-arrow" style="font-size: 0.72rem; transition: transform 0.2s;"></i>
      </a>
      <div class="collapse {{ request()->is('admin/content*') ? 'show' : '' }}" id="contentSubmenu">
        <div class="sidebar-submenu ps-3 pe-1 py-1 d-flex flex-column gap-1">
          <a class="nav-link sub-link {{ request()->routeIs('admin.content.header') ? 'active' : '' }}" href="{{ route('admin.content.header') }}" style="font-size: 0.82rem; min-height: 38px;">
            <span class="nav-icon" style="width: 24px; height: 24px; font-size: 0.7rem;"><i class="bi bi-card-heading"></i></span>
            <span class="nav-text">Header</span>
          </a>
          <a class="nav-link sub-link {{ request()->routeIs('admin.content.story') ? 'active' : '' }}" href="{{ route('admin.content.story') }}" style="font-size: 0.82rem; min-height: 38px;">
            <span class="nav-icon" style="width: 24px; height: 24px; font-size: 0.7rem;"><i class="bi bi-book"></i></span>
            <span class="nav-text">Story</span>
          </a>
          <a class="nav-link sub-link {{ request()->routeIs('admin.content.vision') ? 'active' : '' }}" href="{{ route('admin.content.vision') }}" style="font-size: 0.82rem; min-height: 38px;">
            <span class="nav-icon" style="width: 24px; height: 24px; font-size: 0.7rem;"><i class="bi bi-eye"></i></span>
            <span class="nav-text">Vision</span>
          </a>
          <a class="nav-link sub-link {{ request()->routeIs('admin.content.testimonies') ? 'active' : '' }}" href="{{ route('admin.content.testimonies') }}" style="font-size: 0.82rem; min-height: 38px;">
            <span class="nav-icon" style="width: 24px; height: 24px; font-size: 0.7rem;"><i class="bi bi-star"></i></span>
            <span class="nav-text">Testimonies</span>
          </a>
        </div>
      </div>
    </div>

    <!-- About Us Menu & Submenu -->
    <div class="sidebar-menu-group">
      <a class="nav-link {{ request()->is('admin/about*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#aboutSubmenu" role="button" aria-expanded="{{ request()->is('admin/about*') ? 'true' : 'false' }}" aria-controls="aboutSubmenu">
        <span class="nav-icon"><i class="bi bi-info-circle" aria-hidden="true"></i></span>
        <span class="nav-text">About Us</span>
        <i class="bi bi-chevron-down ms-auto submenu-arrow" style="font-size: 0.72rem; transition: transform 0.2s;"></i>
      </a>
      <div class="collapse {{ request()->is('admin/about*') ? 'show' : '' }}" id="aboutSubmenu">
        <div class="sidebar-submenu ps-3 pe-1 py-1 d-flex flex-column gap-1">
          <a class="nav-link sub-link {{ request()->routeIs('admin.about.contact') ? 'active' : '' }}" href="{{ route('admin.about.contact') }}" style="font-size: 0.82rem; min-height: 38px;">
            <span class="nav-icon" style="width: 24px; height: 24px; font-size: 0.7rem;"><i class="bi bi-telephone"></i></span>
            <span class="nav-text">Contact</span>
          </a>
          <a class="nav-link sub-link {{ request()->routeIs('admin.about.stores') ? 'active' : '' }}" href="{{ route('admin.about.stores') }}" style="font-size: 0.82rem; min-height: 38px;">
            <span class="nav-icon" style="width: 24px; height: 24px; font-size: 0.7rem;"><i class="bi bi-geo-alt"></i></span>
            <span class="nav-text">Stores</span>
          </a>
        </div>
      </div>
    </div>

    <!-- User Settings Nav Link -->
    <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">
      <span class="nav-icon"><i class="bi bi-person-gear" aria-hidden="true"></i></span>
      <span class="nav-text">User Settings</span>
    </a>

    <div class="sidebar-divider my-2" style="border-top: 1px solid rgba(255,255,255,0.08);"></div>

    <a class="nav-link" href="{{ route('visitor.home') }}" target="_blank">
      <span class="nav-icon"><i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></span>
      <span class="nav-text">View Visitor Site</span>
    </a>
  </nav>

  <div class="sidebar-user mt-auto">
    <img class="avatar-img avatar-md sidebar-user-avatar" src="{{ asset('images/yanto.jpeg') }}" alt="{{ Auth::user()->name ?? 'User' }}" style="width: 44px; height: 44px; object-fit: cover; border-radius: 50%; border: 2px solid var(--admin-gold, #dba24c);" />
    <strong class="text-truncate d-block" style="max-width: 180px;">{{ Auth::user()->name ?? 'Admin Yanto' }}</strong>
    <small class="text-uppercase" style="color: var(--admin-gold, #dba24c); font-size: 0.72rem; font-weight: 600;">Role: {{ Auth::user()->role ?? 'admin' }}</small>
  </div>

  <div class="sidebar-footer">
    <span class="status-dot" style="background: #22c55e;"></span>
    <span class="sidebar-footer-text">Bali Workshops: Active</span>
  </div>
</aside>
