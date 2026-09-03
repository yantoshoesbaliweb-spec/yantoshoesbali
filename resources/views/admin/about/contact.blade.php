@extends('admin.layouts.app')

@section('title', 'Contact Information - Yanto Shoes Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item" style="color: var(--admin-muted);">About Us</li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Contact</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Contact Information
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Manage email, WhatsApp, and social media links displayed across the website.</p>
    </div>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="bi bi-check-circle-fill text-success fs-5"></i>
    <div>{{ session('success') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <form action="{{ route('admin.about.contact.update') }}" method="POST">
    @csrf

    <!-- Email & Phone -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-envelope me-2" style="color: var(--admin-gold, #dba24c);"></i>Email &amp; Phone
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">
              <i class="bi bi-envelope-fill me-1 text-danger"></i> Email Address
            </label>
            <input type="email" class="form-control" name="content[email]" value="{{ $content['email'] ?? 'info@yantoshoesbali.com' }}" placeholder="info@yantoshoesbali.com" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">
              <i class="bi bi-phone-fill me-1 text-success"></i> Phone Number
            </label>
            <input type="text" class="form-control" name="content[phone]" value="{{ $content['phone'] ?? '+62 813 5305 5475' }}" placeholder="+62 813 5305 5475" />
          </div>
        </div>
      </div>
    </div>

    <!-- WhatsApp -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-whatsapp me-2" style="color: #25D366;"></i>WhatsApp
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">WhatsApp Number (with country code)</label>
            <input type="text" class="form-control" name="content[whatsapp]" value="{{ $content['whatsapp'] ?? '6281353055475' }}" placeholder="6281353055475" />
            <small class="text-muted">Format: country code + number without +, spaces, or dashes. Used for wa.me links.</small>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Default WhatsApp Message</label>
            <input type="text" class="form-control" name="content[whatsapp_message]" value="{{ $content['whatsapp_message'] ?? 'Hi Yanto Shoes Bali, I would like to ask about your products' }}" />
          </div>
        </div>
      </div>
    </div>

    <!-- Social Media Links -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-globe me-2" style="color: var(--admin-gold, #dba24c);"></i>Social Media Links
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">
              <i class="bi bi-instagram me-1" style="color: #E1306C;"></i> Instagram URL
            </label>
            <input type="url" class="form-control" name="content[instagram]" value="{{ $content['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/' }}" placeholder="https://www.instagram.com/yantoshoes_bali/" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">
              <i class="bi bi-instagram me-1" style="color: #E1306C;"></i> Instagram Handle
            </label>
            <input type="text" class="form-control" name="content[instagram_handle]" value="{{ $content['instagram_handle'] ?? '@yantoshoes_bali' }}" placeholder="@yantoshoes_bali" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">
              <i class="bi bi-tiktok me-1"></i> TikTok URL
            </label>
            <input type="url" class="form-control" name="content[tiktok]" value="{{ $content['tiktok'] ?? 'https://www.tiktok.com/@yantoshoesbali' }}" placeholder="https://www.tiktok.com/@yantoshoesbali" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">
              <i class="bi bi-facebook me-1" style="color: #1877F2;"></i> Facebook URL
            </label>
            <input type="url" class="form-control" name="content[facebook]" value="{{ $content['facebook'] ?? 'https://facebook.com/yantoshoesbali' }}" placeholder="https://facebook.com/yantoshoesbali" />
          </div>
        </div>
      </div>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
        <i class="bi bi-save"></i>
        <span>Save Contact Information</span>
      </button>
    </div>

  </form>

</div>
@endsection
