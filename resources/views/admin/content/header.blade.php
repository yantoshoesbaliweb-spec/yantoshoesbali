@extends('admin.layouts.app')

@section('title', 'Header & Hero Slider Settings - Yanto Shoes Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item" style="color: var(--admin-muted);">Content</li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Header</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Header &amp; Hero Slider Settings
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Configure the announcement rotator bar, dynamic hero slides (add, edit, delete), and brand marquee strip.</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}#hero" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Preview Live Hero</span>
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

  <form action="{{ route('admin.content.header.update') }}" method="POST" id="header-settings-form">
    @csrf

    <!-- 1. Announcement Bar Settings -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-megaphone me-2" style="color: var(--admin-gold, #dba24c);"></i>Announcement Bar Rotator Messages
        </h5>
        <small class="text-muted">Enter messages displayed in the rotating top banner (1 message per line).</small>
      </div>
      <div class="card-body p-3">
        <div class="mb-2">
          <label class="form-label fw-semibold" style="font-size: 0.84rem;">Rotating Messages (1 per line)</label>
          <textarea class="form-control" name="content[announcements]" rows="4" style="font-size: 0.85rem; background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);">{{ is_array($content['announcements'] ?? null) ? implode("\n", $content['announcements']) : ($content['announcements'] ?? '') }}</textarea>
        </div>
      </div>
    </div>

    <!-- 2. Dynamic Hero Slides Settings -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3 d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2" style="border-color: var(--admin-border) !important;">
        <div>
          <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
            <i class="bi bi-images me-2" style="color: var(--admin-gold, #dba24c);"></i>Hero Slides Management
          </h5>
          <small class="text-muted">Add new slides, delete unwanted slides, or edit content and background images.</small>
        </div>
        <button type="button" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1" id="add-slide-btn">
          <i class="bi bi-plus-circle"></i>
          <span>Add New Slide</span>
        </button>
      </div>

      <div class="card-body p-3">
        <!-- Container for Slides -->
        <div class="d-flex flex-column gap-4" id="slides-container">
          @php
            $slides = $content['slides'] ?? [
              [
                'subtitle' => 'Made in Bali • Genuine Leather',
                'title' => 'YANTO SHOES',
                'title_highlight' => 'BALI',
                'description' => 'Handcrafted Cowboy Boots — Made by master artisans, from genuine leather, crafted exclusively for you.',
                'btn_primary_text' => 'Explore Catalog',
                'btn_primary_link' => '/catalog',
                'btn_secondary_text' => 'Custom Order',
                'btn_secondary_link' => '#custom',
                'image' => 'images/hero_boots.png'
              ]
            ];
          @endphp

          @foreach($slides as $i => $slide)
          <div class="slide-item p-3 rounded border position-relative" data-slide-index="{{ $i }}" style="background: var(--admin-surface-soft); border-color: var(--admin-border) !important;">
            
            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: var(--admin-border) !important;">
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-warning text-dark fw-bold px-2 py-1 slide-badge">Slide #{{ $i + 1 }}</span>
                <span class="text-muted slide-info" style="font-size: 0.78rem;">Hero frame</span>
              </div>
              <button type="button" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1 delete-slide-btn" onclick="removeSlide(this)" title="Delete this slide">
                <i class="bi bi-trash"></i>
                <span class="d-none d-sm-inline">Delete Slide</span>
              </button>
            </div>

            <div class="row g-3">
              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Subtitle Eyebrow</label>
                <input type="text" class="form-control form-control-sm input-subtitle" name="content[slides][{{ $i }}][subtitle]" value="{{ $slide['subtitle'] ?? '' }}" placeholder="e.g. Made in Bali • Genuine Leather" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Background Image Path</label>
                <input type="text" class="form-control form-control-sm input-image" name="content[slides][{{ $i }}][image]" value="{{ $slide['image'] ?? '' }}" placeholder="e.g. images/hero_boots.png" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Main Title (Line 1)</label>
                <input type="text" class="form-control form-control-sm input-title" name="content[slides][{{ $i }}][title]" value="{{ $slide['title'] ?? '' }}" placeholder="e.g. YANTO SHOES" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Title Highlight / Italic (Line 2)</label>
                <input type="text" class="form-control form-control-sm input-title-highlight" name="content[slides][{{ $i }}][title_highlight]" value="{{ $slide['title_highlight'] ?? '' }}" placeholder="e.g. BALI" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Description Paragraph</label>
                <textarea class="form-control form-control-sm input-description" name="content[slides][{{ $i }}][description]" rows="2" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);">{{ $slide['description'] ?? '' }}</textarea>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <label class="form-label fw-semibold" style="font-size: 0.78rem;">Primary Button Text</label>
                <input type="text" class="form-control form-control-sm input-btn-p-text" name="content[slides][{{ $i }}][btn_primary_text]" value="{{ $slide['btn_primary_text'] ?? '' }}" placeholder="e.g. Explore Catalog" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <label class="form-label fw-semibold" style="font-size: 0.78rem;">Primary Button Link</label>
                <input type="text" class="form-control form-control-sm input-btn-p-link" name="content[slides][{{ $i }}][btn_primary_link]" value="{{ $slide['btn_primary_link'] ?? '' }}" placeholder="e.g. /catalog or https://wa.me/..." style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <label class="form-label fw-semibold" style="font-size: 0.78rem;">Secondary Button Text</label>
                <input type="text" class="form-control form-control-sm input-btn-s-text" name="content[slides][{{ $i }}][btn_secondary_text]" value="{{ $slide['btn_secondary_text'] ?? '' }}" placeholder="e.g. Custom Order" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                <label class="form-label fw-semibold" style="font-size: 0.78rem;">Secondary Button Link</label>
                <input type="text" class="form-control form-control-sm input-btn-s-link" name="content[slides][{{ $i }}][btn_secondary_link]" value="{{ $slide['btn_secondary_link'] ?? '' }}" placeholder="e.g. #custom" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>
            </div>

          </div>
          @endforeach
        </div>

        <!-- Add Slide Bottom Action -->
        <div class="text-center mt-3 pt-3 border-top" style="border-color: var(--admin-border) !important;">
          <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 px-4 py-2" id="add-slide-btn-bottom">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Add Another Slide</span>
          </button>
        </div>

      </div>
    </div>

    <!-- 3. Brand Marquee Strip -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-symmetry-horizontal me-2" style="color: var(--admin-gold, #dba24c);"></i>Marquee Brand Strip Items
        </h5>
        <small class="text-muted">Items displayed in the continuous marquee strip below hero slider (1 item per line).</small>
      </div>
      <div class="card-body p-3">
        <div class="mb-2">
          <label class="form-label fw-semibold" style="font-size: 0.84rem;">Marquee Text Items (1 per line)</label>
          <textarea class="form-control" name="content[marquee]" rows="5" style="font-size: 0.85rem; background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);">{{ is_array($content['marquee'] ?? null) ? implode("\n", $content['marquee']) : ($content['marquee'] ?? '') }}</textarea>
        </div>
      </div>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
        <i class="bi bi-save"></i>
        <span>Save Header Changes</span>
      </button>
    </div>

  </form>

</div>
@endsection

@push('scripts')
<script>
  // Function to re-index all slides in the form
  function reindexSlides() {
    const slideItems = document.querySelectorAll('.slide-item');
    slideItems.forEach((item, idx) => {
      item.setAttribute('data-slide-index', idx);
      
      // Update badge
      const badge = item.querySelector('.slide-badge');
      if (badge) badge.textContent = `Slide #${idx + 1}`;

      // Update input names
      item.querySelector('.input-subtitle').name = `content[slides][${idx}][subtitle]`;
      item.querySelector('.input-image').name = `content[slides][${idx}][image]`;
      item.querySelector('.input-title').name = `content[slides][${idx}][title]`;
      item.querySelector('.input-title-highlight').name = `content[slides][${idx}][title_highlight]`;
      item.querySelector('.input-description').name = `content[slides][${idx}][description]`;
      item.querySelector('.input-btn-p-text').name = `content[slides][${idx}][btn_primary_text]`;
      item.querySelector('.input-btn-p-link').name = `content[slides][${idx}][btn_primary_link]`;
      item.querySelector('.input-btn-s-text').name = `content[slides][${idx}][btn_secondary_text]`;
      item.querySelector('.input-btn-s-link').name = `content[slides][${idx}][btn_secondary_link]`;
    });
  }

  // Remove a slide with smooth removal and re-indexing
  function removeSlide(button) {
    const slideItems = document.querySelectorAll('.slide-item');
    if (slideItems.length <= 1) {
      alert('You must have at least 1 hero slide.');
      return;
    }

    const slideItem = button.closest('.slide-item');
    if (slideItem) {
      slideItem.remove();
      reindexSlides();
    }
  }

  // Add a new empty slide
  function addNewSlide() {
    const container = document.getElementById('slides-container');
    const newIndex = document.querySelectorAll('.slide-item').length;

    const newSlideHtml = `
      <div class="slide-item p-3 rounded border position-relative" data-slide-index="${newIndex}" style="background: var(--admin-surface-soft); border-color: var(--admin-border) !important; animation: fadeIn 0.3s ease;">
        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: var(--admin-border) !important;">
          <div class="d-flex align-items-center gap-2">
            <span class="badge bg-warning text-dark fw-bold px-2 py-1 slide-badge">Slide #${newIndex + 1}</span>
            <span class="text-muted slide-info" style="font-size: 0.78rem;">New Hero frame</span>
          </div>
          <button type="button" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1 delete-slide-btn" onclick="removeSlide(this)" title="Delete this slide">
            <i class="bi bi-trash"></i>
            <span class="d-none d-sm-inline">Delete Slide</span>
          </button>
        </div>

        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Subtitle Eyebrow</label>
            <input type="text" class="form-control form-control-sm input-subtitle" name="content[slides][${newIndex}][subtitle]" value="Handcrafted in Bali • Genuine Leather" placeholder="e.g. Made in Bali • Genuine Leather" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Background Image Path</label>
            <input type="text" class="form-control form-control-sm input-image" name="content[slides][${newIndex}][image]" value="images/hero_boots.png" placeholder="e.g. images/hero_boots.png" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Main Title (Line 1)</label>
            <input type="text" class="form-control form-control-sm input-title" name="content[slides][${newIndex}][title]" value="NEW COLLECTION" placeholder="e.g. YANTO SHOES" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Title Highlight / Italic (Line 2)</label>
            <input type="text" class="form-control form-control-sm input-title-highlight" name="content[slides][${newIndex}][title_highlight]" value="BALI STYLE" placeholder="e.g. BALI" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Description Paragraph</label>
            <textarea class="form-control form-control-sm input-description" name="content[slides][${newIndex}][description]" rows="2" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);">Discover our latest handcrafted leather boots made by Bali master artisans.</textarea>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <label class="form-label fw-semibold" style="font-size: 0.78rem;">Primary Button Text</label>
            <input type="text" class="form-control form-control-sm input-btn-p-text" name="content[slides][${newIndex}][btn_primary_text]" value="Explore Catalog" placeholder="e.g. Explore Catalog" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <label class="form-label fw-semibold" style="font-size: 0.78rem;">Primary Button Link</label>
            <input type="text" class="form-control form-control-sm input-btn-p-link" name="content[slides][${newIndex}][btn_primary_link]" value="/catalog" placeholder="e.g. /catalog" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <label class="form-label fw-semibold" style="font-size: 0.78rem;">Secondary Button Text</label>
            <input type="text" class="form-control form-control-sm input-btn-s-text" name="content[slides][${newIndex}][btn_secondary_text]" value="Custom Order" placeholder="e.g. Custom Order" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <label class="form-label fw-semibold" style="font-size: 0.78rem;">Secondary Button Link</label>
            <input type="text" class="form-control form-control-sm input-btn-s-link" name="content[slides][${newIndex}][btn_secondary_link]" value="#custom" placeholder="e.g. #custom" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>
        </div>
      </div>
    `;

    container.insertAdjacentHTML('beforeend', newSlideHtml);
    reindexSlides();
  }

  // Event listeners for Add buttons
  document.getElementById('add-slide-btn')?.addEventListener('click', addNewSlide);
  document.getElementById('add-slide-btn-bottom')?.addEventListener('click', addNewSlide);
</script>
@endpush
