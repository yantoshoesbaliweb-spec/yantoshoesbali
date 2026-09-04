@extends('admin.layouts.app')

@section('title', 'Story Narrative Settings - Yanto Shoes Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item" style="color: var(--admin-muted);">Content</li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Story</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Story
      </h1>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}#about" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Preview Live Story</span>
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

  <form action="{{ route('admin.content.story.update') }}" method="POST">
    @csrf

    <!-- 1. Header & Media -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-person-badge me-2" style="color: var(--admin-gold, #dba24c);"></i>Section Titles &amp; Artisan Photo
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Section Eyebrow</label>
            <input type="text" class="form-control" name="content[eyebrow]" value="{{ $content['eyebrow'] ?? 'YANTO SHOES BALI' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Main Heading Title</label>
            <input type="text" class="form-control" name="content[title]" value="{{ $content['title'] ?? 'A Legacy of Craftsmanship' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Title Highlight (Italic Accent)</label>
            <input type="text" class="form-control" name="content[title_highlight]" value="{{ $content['title_highlight'] ?? 'Since 1990' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Artisan Photo Path</label>
            <input type="text" class="form-control" name="content[image]" value="{{ $content['image'] ?? 'images/yanto-header.jpeg' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Photo Floating Badge (Top Line)</label>
            <input type="text" class="form-control" name="content[badge_year]" value="{{ $content['badge_year'] ?? 'Est. 1990' }}" />
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Photo Floating Badge (Sub Line)</label>
            <input type="text" class="form-control" name="content[badge_sub]" value="{{ $content['badge_sub'] ?? 'Bali Heritage' }}" />
          </div>
        </div>
      </div>
    </div>

    <!-- 2. Story Narrative Text -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-journal-text me-2" style="color: var(--admin-gold, #dba24c);"></i>Narrative Paragraphs
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="mb-3">
          <label class="form-label fw-semibold" style="font-size: 0.82rem;">Lead Opening Sentence</label>
          <input type="text" class="form-control" name="content[lead_text]" value="{{ $content['lead_text'] ?? 'It all began with a craftsman named Mr Yanto.' }}" />
        </div>

        <div class="mb-2">
          <textarea class="form-control" name="content[paragraphs]" rows="6" style="font-size: 0.85rem; background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);">{{ is_array($content['paragraphs'] ?? null) ? implode("\n\n", $content['paragraphs']) : ($content['paragraphs'] ?? '') }}</textarea>
        </div>
      </div>
    </div>

    <!-- 3. Values Box -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-patch-check me-2" style="color: var(--admin-gold, #dba24c);"></i>Core Values Box &amp; Tagline
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="mb-3">
          <label class="form-label fw-semibold" style="font-size: 0.82rem;">Values Intro Sentence</label>
          <input type="text" class="form-control" name="content[values_intro]" value="{{ $content['values_intro'] ?? 'After more than three decades, the values established by Mr Yanto remain at the heart of the brand:' }}" />
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold" style="font-size: 0.82rem;">3 Core Brand Values (1 item per line)</label>
          <textarea class="form-control" name="content[values_items]" rows="3" style="font-size: 0.85rem; background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);">{{ is_array($content['values_items'] ?? null) ? implode("\n", $content['values_items']) : ($content['values_items'] ?? '') }}</textarea>
        </div>

        <div>
          <label class="form-label fw-semibold" style="font-size: 0.82rem;">Story Tagline Footer</label>
          <input type="text" class="form-control" name="content[tagline]" value="{{ $content['tagline'] ?? 'Yanto Shoes Bali — A Legacy of Cowboy Craftsmanship.' }}" />
        </div>
      </div>
    </div>

    <!-- 4. Mastery Pill Badges (4 Pills) -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-award me-2" style="color: var(--admin-gold, #dba24c);"></i>Mastery Highlight Badges (4 Pills)
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          @php $pills = $content['pills'] ?? []; @endphp
          @for($p = 0; $p < 4; $p++)
          @php $pill = $pills[$p] ?? []; @endphp
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="p-3 rounded border" style="background: var(--admin-surface-soft); border-color: var(--admin-border) !important;">
              <div class="fw-bold mb-2 text-primary" style="color: var(--admin-gold, #dba24c) !important; font-size: 0.82rem;">Badge #{{ $p + 1 }}</div>
              <div class="mb-2">
                <label class="form-label text-muted" style="font-size: 0.76rem;">Number / Highlight</label>
                <input type="text" class="form-control form-control-sm" name="content[pills][{{ $p }}][num]" value="{{ $pill['num'] ?? '' }}" placeholder="e.g. 35+" />
              </div>
              <div>
                <label class="form-label text-muted" style="font-size: 0.76rem;">Label Text</label>
                <input type="text" class="form-control form-control-sm" name="content[pills][{{ $p }}][text]" value="{{ $pill['text'] ?? '' }}" placeholder="e.g. Years Mastery" />
              </div>
            </div>
          </div>
          @endfor
        </div>
      </div>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
        <i class="bi bi-save"></i>
        <span>Save Story Changes</span>
      </button>
    </div>

  </form>

</div>
@endsection
