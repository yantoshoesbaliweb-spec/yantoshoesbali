@extends('admin.layouts.app')

@section('title', 'Header & Hero Slider Settings - Yanto Shoes Admin')

@push('styles')
<style>
  .slide-item {
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease, background-color 0.2s ease;
  }
  .drag-handle {
    cursor: grab;
    user-select: none;
    touch-action: none;
    color: var(--admin-muted);
    transition: color 0.15s ease, transform 0.15s ease;
  }
  .drag-handle:hover {
    color: var(--admin-gold, #dba24c);
    transform: scale(1.15);
  }
  .drag-handle:active {
    cursor: grabbing;
  }
  /* SortableJS States */
  .slide-sortable-ghost {
    opacity: 0.45;
    background: rgba(219, 162, 76, 0.08) !important;
    border: 2px dashed var(--admin-gold, #dba24c) !important;
  }
  .slide-sortable-chosen {
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    border-color: var(--admin-gold, #dba24c) !important;
  }
  .slide-sortable-drag {
    opacity: 0.95;
    cursor: grabbing !important;
  }
  /* Flash animation on position swap */
  @keyframes slideHighlight {
    0% {
      background-color: rgba(219, 162, 76, 0.25);
      border-color: var(--admin-gold, #dba24c);
      transform: scale(1.008);
    }
    100% {
      background-color: var(--admin-surface-soft);
      transform: scale(1);
    }
  }
  .slide-reorder-highlight {
    animation: slideHighlight 0.6s ease-out;
  }
  .btn-move-slide {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    color: var(--admin-text);
    border-color: var(--admin-border);
    background: var(--admin-surface);
  }
  .btn-move-slide:hover:not(:disabled) {
    background-color: var(--admin-gold, #dba24c);
    border-color: var(--admin-gold, #dba24c);
    color: #ffffff;
  }
  .btn-move-slide:disabled {
    opacity: 0.35;
    cursor: not-allowed;
  }
  .slide-preview-box {
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }
</style>
@endpush

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
        Header
      </h1>
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

  @if($errors->any())
  <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start gap-2 mb-4" role="alert">
    <i class="bi bi-exclamation-triangle-fill text-danger fs-5 mt-1"></i>
    <div>
      <strong>Validation error:</strong>
      <ul class="mb-0 ps-3 mt-1">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <form action="{{ route('admin.content.header.update') }}" method="POST" id="header-settings-form" enctype="multipart/form-data">
    @csrf

    <!-- 1. Announcement Bar Settings -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-megaphone me-2" style="color: var(--admin-gold, #dba24c);"></i>Announcement Bar
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="mb-2">
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
            
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3 border-bottom pb-2" style="border-color: var(--admin-border) !important;">
              <div class="d-flex align-items-center gap-2">
                <!-- Drag Handle -->
                <div class="drag-handle d-flex align-items-center px-1" title="Drag to reorder slide">
                  <i class="bi bi-grip-vertical fs-5"></i>
                </div>
                <!-- Badge -->
                <span class="badge bg-warning text-dark fw-bold px-2 py-1 slide-badge">Slide #{{ $i + 1 }}</span>
                <!-- Live Title Preview -->
                <span class="text-truncate slide-title-preview fw-semibold ms-1" style="font-size: 0.85rem; max-width: 260px; color: var(--admin-text);">
                  {{ !empty($slide['title']) ? $slide['title'] : 'Untitled Slide' }}
                </span>
              </div>

              <div class="d-flex align-items-center gap-1">
                <!-- Move Up / Down Buttons -->
                <div class="btn-group me-1" role="group" aria-label="Reorder Slide">
                  <button type="button" class="btn btn-sm btn-outline-secondary btn-move-slide move-up-btn" onclick="moveSlideUp(this)" title="Move Up" {{ $loop->first ? 'disabled' : '' }}>
                    <i class="bi bi-arrow-up"></i>
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-secondary btn-move-slide move-down-btn" onclick="moveSlideDown(this)" title="Move Down" {{ $loop->last ? 'disabled' : '' }}>
                    <i class="bi bi-arrow-down"></i>
                  </button>
                </div>

                <!-- Delete Button -->
                <button type="button" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1 delete-slide-btn" onclick="removeSlide(this)" title="Delete this slide">
                  <i class="bi bi-trash"></i>
                  <span class="d-none d-sm-inline">Delete</span>
                </button>
              </div>
            </div>

            <div class="row g-3">
              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Subtitle Eyebrow</label>
                <input type="text" class="form-control form-control-sm input-subtitle" name="content[slides][{{ $i }}][subtitle]" value="{{ $slide['subtitle'] ?? '' }}" placeholder="e.g. Made in Bali • Genuine Leather" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Background Image (Upload)</label>
                <div class="d-flex align-items-center gap-3">
                  <!-- Live Thumbnail Preview Box -->
                  <div class="slide-preview-box rounded border position-relative overflow-hidden flex-shrink-0" style="width: 96px; height: 62px; background: var(--admin-surface); border-color: var(--admin-border) !important;">
                    <img src="{{ !empty($slide['image']) ? asset($slide['image']) : asset('images/hero_boots.png') }}" alt="Slide Image" class="slide-preview-img w-100 h-100" style="object-fit: cover;" onerror="this.src='{{ asset('images/hero_boots.png') }}'" />
                  </div>
                  
                  <!-- File Input and Hidden Path -->
                  <div class="flex-grow-1 min-w-0">
                    <input type="file" class="form-control form-control-sm input-image-file mb-1" name="slide_files[{{ $i }}]" accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml" onchange="previewSlideImage(this)" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text); font-size: 0.78rem;" />
                    <input type="hidden" class="input-image" name="content[slides][{{ $i }}][image]" value="{{ $slide['image'] ?? 'images/hero_boots.png' }}" />
                    <small class="text-muted d-block text-truncate current-image-label" style="font-size: 0.72rem;">
                      {{ $slide['image'] ?? 'images/hero_boots.png' }}
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-semibold" style="font-size: 0.8rem;">Main Title (Line 1)</label>
                <input type="text" class="form-control form-control-sm input-title" name="content[slides][{{ $i }}][title]" value="{{ $slide['title'] ?? '' }}" placeholder="e.g. YANTO SHOES" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" oninput="updateSlideTitlePreview(this.closest('.slide-item'), this.value)" />
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
      </div>
      <div class="card-body p-3">
        <div class="mb-2">
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
  // Function to preview selected image instantly
  function previewSlideImage(input) {
    const file = input.files && input.files[0];
    if (file) {
      const reader = new FileReader();
      const slideItem = input.closest('.slide-item');
      const previewImg = slideItem.querySelector('.slide-preview-img');
      const label = slideItem.querySelector('.current-image-label');

      reader.onload = function(e) {
        if (previewImg) previewImg.src = e.target.result;
        if (label) label.textContent = 'Selected: ' + file.name;
      };
      reader.readAsDataURL(file);
    }
  }

  // Function to re-index all slides in the form
  function reindexSlides() {
    const slideItems = document.querySelectorAll('#slides-container .slide-item');
    const total = slideItems.length;

    slideItems.forEach((item, idx) => {
      item.setAttribute('data-slide-index', idx);
      
      // Update badge
      const badge = item.querySelector('.slide-badge');
      if (badge) badge.textContent = `Slide #${idx + 1}`;

      // Update Move Up / Move Down buttons disabled state
      const upBtn = item.querySelector('.move-up-btn');
      const downBtn = item.querySelector('.move-down-btn');
      if (upBtn) upBtn.disabled = (idx === 0);
      if (downBtn) downBtn.disabled = (idx === total - 1);

      // Update input names
      const subtitleInput = item.querySelector('.input-subtitle');
      if (subtitleInput) subtitleInput.name = `content[slides][${idx}][subtitle]`;

      const fileInput = item.querySelector('.input-image-file');
      if (fileInput) fileInput.name = `slide_files[${idx}]`;

      const imageInput = item.querySelector('.input-image');
      if (imageInput) imageInput.name = `content[slides][${idx}][image]`;

      const titleInput = item.querySelector('.input-title');
      if (titleInput) {
        titleInput.name = `content[slides][${idx}][title]`;
        updateSlideTitlePreview(item, titleInput.value);
      }

      const titleHighlightInput = item.querySelector('.input-title-highlight');
      if (titleHighlightInput) titleHighlightInput.name = `content[slides][${idx}][title_highlight]`;

      const descInput = item.querySelector('.input-description');
      if (descInput) descInput.name = `content[slides][${idx}][description]`;

      const btnPText = item.querySelector('.input-btn-p-text');
      if (btnPText) btnPText.name = `content[slides][${idx}][btn_primary_text]`;

      const btnPLink = item.querySelector('.input-btn-p-link');
      if (btnPLink) btnPLink.name = `content[slides][${idx}][btn_primary_link]`;

      const btnSText = item.querySelector('.input-btn-s-text');
      if (btnSText) btnSText.name = `content[slides][${idx}][btn_secondary_text]`;

      const btnSLink = item.querySelector('.input-btn-s-link');
      if (btnSLink) btnSLink.name = `content[slides][${idx}][btn_secondary_link]`;
    });
  }

  // Update title preview text in slide card header
  function updateSlideTitlePreview(slideItem, titleValue) {
    const preview = slideItem.querySelector('.slide-title-preview');
    if (preview) {
      preview.textContent = titleValue && titleValue.trim() !== '' ? titleValue : 'Untitled Slide';
    }
  }

  // Highlight element animation
  function flashHighlight(elem) {
    elem.classList.remove('slide-reorder-highlight');
    void elem.offsetWidth; // Trigger reflow
    elem.classList.add('slide-reorder-highlight');
    setTimeout(() => {
      elem.classList.remove('slide-reorder-highlight');
    }, 700);
  }

  // Move slide up
  function moveSlideUp(button) {
    const slideItem = button.closest('.slide-item');
    const prevItem = slideItem.previousElementSibling;
    if (prevItem && prevItem.classList.contains('slide-item')) {
      slideItem.parentNode.insertBefore(slideItem, prevItem);
      reindexSlides();
      flashHighlight(slideItem);
      slideItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  // Move slide down
  function moveSlideDown(button) {
    const slideItem = button.closest('.slide-item');
    const nextItem = slideItem.nextElementSibling;
    if (nextItem && nextItem.classList.contains('slide-item')) {
      slideItem.parentNode.insertBefore(nextItem, slideItem);
      reindexSlides();
      flashHighlight(slideItem);
      slideItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  // Remove a slide with confirmation and re-indexing
  function removeSlide(button) {
    const slideItems = document.querySelectorAll('#slides-container .slide-item');
    if (slideItems.length <= 1) {
      alert('You must have at least 1 hero slide.');
      return;
    }

    if (!confirm('Are you sure you want to delete this slide?')) {
      return;
    }

    const slideItem = button.closest('.slide-item');
    if (slideItem) {
      slideItem.remove();
      reindexSlides();
    }
  }

  // Add a new slide
  function addNewSlide() {
    const container = document.getElementById('slides-container');
    const newIndex = document.querySelectorAll('#slides-container .slide-item').length;

    const newSlideHtml = `
      <div class="slide-item p-3 rounded border position-relative" data-slide-index="${newIndex}" style="background: var(--admin-surface-soft); border-color: var(--admin-border) !important; animation: fadeIn 0.3s ease;">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3 border-bottom pb-2" style="border-color: var(--admin-border) !important;">
          <div class="d-flex align-items-center gap-2">
            <div class="drag-handle d-flex align-items-center px-1" title="Drag to reorder slide">
              <i class="bi bi-grip-vertical fs-5"></i>
            </div>
            <span class="badge bg-warning text-dark fw-bold px-2 py-1 slide-badge">Slide #${newIndex + 1}</span>
            <span class="text-truncate slide-title-preview fw-semibold ms-1" style="font-size: 0.85rem; max-width: 260px; color: var(--admin-text);">
              NEW COLLECTION
            </span>
          </div>
          <div class="d-flex align-items-center gap-1">
            <div class="btn-group me-1" role="group" aria-label="Reorder Slide">
              <button type="button" class="btn btn-sm btn-outline-secondary btn-move-slide move-up-btn" onclick="moveSlideUp(this)" title="Move Up">
                <i class="bi bi-arrow-up"></i>
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary btn-move-slide move-down-btn" onclick="moveSlideDown(this)" title="Move Down">
                <i class="bi bi-arrow-down"></i>
              </button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1 delete-slide-btn" onclick="removeSlide(this)" title="Delete this slide">
              <i class="bi bi-trash"></i>
              <span class="d-none d-sm-inline">Delete</span>
            </button>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Subtitle Eyebrow</label>
            <input type="text" class="form-control form-control-sm input-subtitle" name="content[slides][${newIndex}][subtitle]" value="Handcrafted in Bali • Genuine Leather" placeholder="e.g. Made in Bali • Genuine Leather" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Background Image (Upload)</label>
            <div class="d-flex align-items-center gap-3">
              <div class="slide-preview-box rounded border position-relative overflow-hidden flex-shrink-0" style="width: 96px; height: 62px; background: var(--admin-surface); border-color: var(--admin-border) !important;">
                <img src="{{ asset('images/hero_boots.png') }}" alt="Slide Image" class="slide-preview-img w-100 h-100" style="object-fit: cover;" onerror="this.src='{{ asset('images/hero_boots.png') }}'" />
              </div>
              <div class="flex-grow-1 min-w-0">
                <input type="file" class="form-control form-control-sm input-image-file mb-1" name="slide_files[${newIndex}]" accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml" onchange="previewSlideImage(this)" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text); font-size: 0.78rem;" />
                <input type="hidden" class="input-image" name="content[slides][${newIndex}][image]" value="images/hero_boots.png" />
                <small class="text-muted d-block text-truncate current-image-label" style="font-size: 0.72rem;">
                  images/hero_boots.png (Default)
                </small>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label fw-semibold" style="font-size: 0.8rem;">Main Title (Line 1)</label>
            <input type="text" class="form-control form-control-sm input-title" name="content[slides][${newIndex}][title]" value="NEW COLLECTION" placeholder="e.g. YANTO SHOES" style="background: var(--admin-surface); border-color: var(--admin-border); color: var(--admin-text);" oninput="updateSlideTitlePreview(this.closest('.slide-item'), this.value)" />
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
    const newSlideEl = container.lastElementChild;
    if (newSlideEl) {
      flashHighlight(newSlideEl);
      newSlideEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  }

  // Initialize on DOM ready
  document.addEventListener('DOMContentLoaded', function() {
    const slidesContainer = document.getElementById('slides-container');
    if (slidesContainer) {
      new Sortable(slidesContainer, {
        handle: '.drag-handle',
        animation: 200,
        ghostClass: 'slide-sortable-ghost',
        chosenClass: 'slide-sortable-chosen',
        dragClass: 'slide-sortable-drag',
        onEnd: function() {
          reindexSlides();
        }
      });
    }

    // Bind live title preview for initial slides
    document.querySelectorAll('#slides-container .input-title').forEach(input => {
      input.addEventListener('input', function() {
        updateSlideTitlePreview(this.closest('.slide-item'), this.value);
      });
    });

    // Initial indexing to set up button disabled states properly
    reindexSlides();

    // Event listeners for Add buttons
    document.getElementById('add-slide-btn')?.addEventListener('click', addNewSlide);
    document.getElementById('add-slide-btn-bottom')?.addEventListener('click', addNewSlide);
  });
</script>
@endpush
