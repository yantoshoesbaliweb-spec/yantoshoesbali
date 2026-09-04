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

  

</div>
@endsection
