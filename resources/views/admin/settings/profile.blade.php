@extends('admin.layouts.app')

@section('title', 'User Settings - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">User Settings</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Account &amp; User Settings
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Manage your user account profile, email address, and security credentials.</p>
    </div>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="bi bi-check-circle-fill text-success fs-5"></i>
    <div>{{ session('success') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if($errors->any())
  <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
    <div>{{ $errors->first() }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="row g-4 mb-4">

    <!-- Left Column: User Summary Card -->
    <div class="col-12 col-lg-4">
      <div class="card h-100 p-4 text-center">
        <div class="mb-3 position-relative d-inline-block mx-auto">
          <img src="{{ asset('images/yanto.jpeg') }}" alt="{{ $user->name }}" class="rounded-circle shadow" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid var(--admin-gold, #dba24c);" />
          <span class="position-absolute bottom-0 end-0 badge rounded-pill bg-success border border-white p-2">
            <span class="visually-hidden">Online</span>
          </span>
        </div>

        <h4 class="fw-bold mb-1" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.5rem;">
          {{ $user->name }}
        </h4>
        <p class="text-muted mb-2" style="font-size: 0.84rem;">{{ $user->email }}</p>

        <div class="mb-3">
          @if($user->role === 'admin')
          <span class="badge bg-warning text-dark px-3 py-1 fw-bold" style="font-size: 0.76rem;">
            <i class="bi bi-shield-lock me-1"></i>Administrator
          </span>
          @else
          <span class="badge bg-info text-white px-3 py-1 fw-bold" style="font-size: 0.76rem;">
            <i class="bi bi-shop me-1"></i>Store Staff
          </span>
          @endif
        </div>

        <hr style="border-color: var(--admin-border);" />

        <div class="text-start" style="font-size: 0.82rem;">
          <div class="d-flex justify-content-between py-2 border-bottom" style="border-color: var(--admin-border) !important;">
            <span class="text-muted">Account ID</span>
            <span class="fw-semibold" style="color: var(--admin-text);">#USR-00{{ $user->id }}</span>
          </div>
          <div class="d-flex justify-content-between py-2 border-bottom" style="border-color: var(--admin-border) !important;">
            <span class="text-muted">Registered Role</span>
            <span class="fw-semibold text-uppercase" style="color: var(--admin-gold, #dba24c);">{{ $user->role }}</span>
          </div>
          <div class="d-flex justify-content-between py-2">
            <span class="text-muted">Status</span>
            <span class="badge bg-success-subtle text-success fw-bold">Active &bull; Verified</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Edit Profile Form -->
    <div class="col-12 col-lg-8">
      <div class="card p-4">
        
        <div class="border-bottom pb-3 mb-4" style="border-color: var(--admin-border) !important;">
          <h5 class="fw-bold mb-1" style="color: var(--admin-text); font-size: 1.15rem;">
            <i class="bi bi-person-gear me-2" style="color: var(--admin-gold, #dba24c);"></i>Update Account Details
          </h5>
          <small class="text-muted">Modify your username, email address, or update your password.</small>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row g-3 mb-4">
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.84rem;">Full Name</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent text-muted" style="border-color: var(--admin-border);"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.84rem;">Email Address</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent text-muted" style="border-color: var(--admin-border);"><i class="bi bi-envelope"></i></span>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold text-muted" style="font-size: 0.84rem;">Assigned Role</label>
              <input type="text" class="form-control text-muted" value="{{ strtoupper($user->role) }}" disabled style="background: var(--admin-surface-soft); border-color: var(--admin-border);" />
              <small class="text-muted" style="font-size: 0.72rem;">Role cannot be self-modified for security.</small>
            </div>
          </div>

          <!-- Password Change Section -->
          <div class="border-top pt-4 mb-4" style="border-color: var(--admin-border) !important;">
            <h6 class="fw-bold mb-2" style="color: var(--admin-text); font-size: 0.98rem;">
              <i class="bi bi-key me-2 text-warning"></i>Change Password (Optional)
            </h6>
            <p class="text-muted mb-3" style="font-size: 0.78rem;">Leave blank if you do not wish to change your password.</p>

            <div class="row g-3">
              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Current Password</label>
                <input type="password" class="form-control form-control-sm @error('current_password') is-invalid @enderror" name="current_password" placeholder="Enter current password" style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">New Password</label>
                <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" placeholder="Enter new password" style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Confirm New Password</label>
                <input type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm new password" style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>
            </div>
          </div>

          <div class="d-flex align-items-center justify-content-end gap-2">
            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
              <i class="bi bi-check-circle"></i>
              <span>Save Profile Changes</span>
            </button>
          </div>

        </form>

      </div>
    </div>

  </div>

</div>
@endsection
