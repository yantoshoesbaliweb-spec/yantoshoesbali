<nav class="navbar admin-navbar navbar-expand bg-white">
  <div class="container-fluid px-3 px-lg-4">
    
    <!-- Sidebar Toggle -->
    <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <!-- Navbar Right Actions -->
    <div class="navbar-actions ms-auto d-flex align-items-center gap-2">
      
      <!-- Quick Link to Visitor Site -->
      <a href="{{ route('visitor.home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-none d-sm-inline-flex align-items-center gap-1" style="font-size: 0.8rem; border-color: var(--admin-border); color: var(--admin-text);">
        <i class="bi bi-globe"></i>
        <span>Live Site</span>
      </a>

      <!-- User Profile Dropdown -->
      <div class="dropdown ms-1">
        <button class="profile-button d-flex align-items-center gap-2 bg-transparent border-0 p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="avatar-img avatar-sm rounded-circle" src="{{ asset('images/yanto.jpeg') }}" alt="{{ Auth::user()->name ?? 'User' }}" style="width: 36px; height: 36px; object-fit: cover; border: 2px solid var(--admin-gold, #dba24c);" />
          <div class="d-none d-lg-block text-start">
            <div class="fw-bold profile-name" style="font-size: 0.85rem; line-height: 1.1; color: var(--admin-text);">{{ Auth::user()->name ?? 'Admin' }}</div>
            <small class="text-muted text-capitalize" style="font-size: 0.72rem;">{{ Auth::user()->role ?? 'admin' }}</small>
          </div>
          <i class="bi bi-chevron-down text-muted d-none d-lg-block" style="font-size: 0.75rem;"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="border-color: var(--admin-border); background: var(--admin-surface); min-width: 220px;">
          <li class="px-3 py-2 border-bottom" style="border-color: var(--admin-border) !important;">
            <div class="fw-bold" style="font-size: 0.88rem; color: var(--admin-text);">{{ Auth::user()->name ?? 'User' }}</div>
            <small class="text-muted">{{ Auth::user()->email ?? '' }}</small>
            <div class="mt-1">
              <span class="badge {{ (Auth::user()->role ?? '') === 'admin' ? 'bg-warning text-dark' : 'bg-info text-white' }}" style="font-size: 0.68rem; text-transform: uppercase;">
                {{ Auth::user()->role ?? 'user' }}
              </span>
            </div>
          </li>
          <li><a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
          <li><a class="dropdown-item py-2 {{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}"><i class="bi bi-person-gear me-2"></i>User Settings</a></li>
          <li><a class="dropdown-item py-2" href="{{ route('admin.products') }}"><i class="bi bi-box-seam me-2"></i>Products</a></li>
          <li><hr class="dropdown-divider" style="border-color: var(--admin-border);"></li>
          <li><a class="dropdown-item py-2" href="{{ route('visitor.home') }}" target="_blank"><i class="bi bi-globe me-2"></i>Visitor Website</a></li>
          <li><hr class="dropdown-divider" style="border-color: var(--admin-border);"></li>
          <li>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="dropdown-item py-2 text-danger">
                <i class="bi bi-box-arrow-right me-2"></i>Sign Out
              </button>
            </form>
          </li>
        </ul>
      </div>

    </div>
  </div>
</nav>
