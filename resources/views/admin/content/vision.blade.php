@extends('admin.layouts.app')

@section('title', 'Bespoke Custom Order (Vision) Settings - Yanto Shoes Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item" style="color: var(--admin-muted);">Content</li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Vision</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Vision
      </h1>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}#custom" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Preview Live Custom Section</span>
      </a>
    </div>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="bi bi-check-circle-fill text-success fs-5"></i>
    <div>{{ session('success') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <form action="{{ route('admin.content.vision.update') }}" method="POST">
    @csrf

    <!-- 1. Section Headings & Image -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-card-text me-2" style="color: var(--admin-gold, #dba24c);"></i>Section Title &amp; Visual Media
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Section Eyebrow</label>
            <input type="text" class="form-control" name="content[eyebrow]" value="{{ $content['eyebrow'] ?? 'Bespoke Custom Orders' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Main Heading (Line 1)</label>
            <input type="text" class="form-control" name="content[title]" value="{{ $content['title'] ?? 'Your Vision,' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Heading Highlight (Line 2 Italic)</label>
            <input type="text" class="form-control" name="content[title_highlight]" value="{{ $content['title_highlight'] ?? 'Our Craftsmanship' }}" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Side Photo Path</label>
            <input type="text" class="form-control" name="content[image]" value="{{ $content['image'] ?? 'images/craftsmanship.png' }}" />
          </div>

          <div class="col-12">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Description Paragraph</label>
            <textarea class="form-control" name="content[description]" rows="3">{{ $content['description'] ?? 'Looking for a specific heel height, exotic leather finish, or unique custom embroidery? Let our master artisans create your dream boots tailored to your exact measurements in just 7 days.' }}</textarea>
          </div>
        </div>
      </div>
    </div>

    <!-- 2. Features List -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-check2-circle me-2" style="color: var(--admin-gold, #dba24c);"></i>Bespoke Features &amp; Process Points
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="d-flex flex-column gap-3">
          @php $features = $content['features'] ?? []; @endphp
          @for($f = 0; $f < 4; $f++)
          @php $feat = $features[$f] ?? []; @endphp
          <div class="p-3 rounded border" style="background: var(--admin-surface-soft); border-color: var(--admin-border) !important;">
            <div class="row g-2 align-items-center">
              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold text-muted" style="font-size: 0.76rem;">Feature #{{ $f + 1 }} Bold Title</label>
                <input type="text" class="form-control form-control-sm" name="content[features][{{ $f }}][title]" value="{{ $feat['title'] ?? '' }}" placeholder="e.g. Free Consultation:" />
              </div>
              <div class="col-12 col-md-8">
                <label class="form-label fw-semibold text-muted" style="font-size: 0.76rem;">Description Text</label>
                <input type="text" class="form-control form-control-sm" name="content[features][{{ $f }}][desc]" value="{{ $feat['desc'] ?? '' }}" placeholder="e.g. Send us your reference photos, drawings, or ideas." />
              </div>
            </div>
          </div>
          @endfor
        </div>
      </div>
    </div>

    <!-- 3. WhatsApp CTA Consultation Button -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-whatsapp me-2 text-success"></i>Call-to-Action (WhatsApp Consultation)
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-5">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Button Text</label>
            <input type="text" class="form-control" name="content[cta_text]" value="{{ $content['cta_text'] ?? 'Start Custom Consultation' }}" />
          </div>
          <div class="col-12 col-md-7">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">WhatsApp Direct Consultation Link</label>
            <input type="text" class="form-control" name="content[cta_link]" value="{{ $content['cta_link'] ?? 'https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20consult%20about%20a%20custom%20order' }}" />
          </div>
        </div>
      </div>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
        <i class="bi bi-save"></i>
        <span>Save Vision Changes</span>
      </button>
    </div>

  </form>

</div>
@endsection
