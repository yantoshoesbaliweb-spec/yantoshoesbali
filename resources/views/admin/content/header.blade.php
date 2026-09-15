@extends('admin.layouts.app')

@section('title', 'Header Video & Announcement Settings - Yanto Shoes Admin')

@push('styles')
<style>
  .video-preview-box {
    position: relative;
    width: 100%;
    max-width: 560px;
    border-radius: 12px;
    overflow: hidden;
    background: #000;
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
  }
  .video-preview-box video {
    width: 100%;
    max-height: 320px;
    object-fit: cover;
    display: block;
  }
  .video-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    color: var(--admin-muted);
    text-align: center;
  }
  .video-placeholder i {
    font-size: 3rem;
    margin-bottom: 12px;
    color: var(--admin-gold, #dba24c);
    opacity: 0.6;
  }
  .upload-zone {
    border: 2px dashed var(--admin-border);
    border-radius: 10px;
    padding: 24px;
    text-align: center;
    transition: border-color 0.2s ease, background-color 0.2s ease;
    cursor: pointer;
    position: relative;
  }
  .upload-zone:hover, .upload-zone.dragover {
    border-color: var(--admin-gold, #dba24c);
    background-color: rgba(219, 162, 76, 0.05);
  }
  .upload-zone input[type="file"] {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
  }
  .upload-icon {
    font-size: 2rem;
    color: var(--admin-gold, #dba24c);
    margin-bottom: 8px;
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
        Header Video & Caption
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

    <!-- 2. Hero Video Settings -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-camera-video me-2" style="color: var(--admin-gold, #dba24c);"></i>Hero Video
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-4">
          <!-- Video Preview -->
          <div class="col-12 col-lg-7">
            <label class="form-label fw-semibold mb-2" style="font-size: 0.85rem;">Current Video</label>
            <div class="video-preview-box" id="videoPreviewBox">
              @if(!empty($content['video']))
              <video id="videoPreview" controls muted playsinline>
                <source src="{{ asset($content['video']) }}">
                Your browser does not support the video tag.
              </video>
              @else
              <div class="video-placeholder" id="videoPlaceholder">
                <i class="bi bi-camera-video"></i>
                <p class="mb-0" style="font-size: 0.85rem;">No video uploaded yet</p>
                <small>Upload an MP4, WebM, or MOV file (max 50MB)</small>
              </div>
              @endif
            </div>
          </div>

          <!-- Video Upload & Caption -->
          <div class="col-12 col-lg-5">
            <div class="mb-4">
              <label class="form-label fw-semibold" style="font-size: 0.85rem;">Upload New Video</label>
              <div class="upload-zone" id="uploadZone">
                <input type="file" name="video_file" accept="video/mp4,video/webm,video/quicktime" id="videoFileInput" />
                <div class="upload-icon"><i class="bi bi-cloud-arrow-up"></i></div>
                <p class="mb-1 fw-semibold" style="font-size: 0.88rem; color: var(--admin-text);">
                  Drag & drop or click to upload
                </p>
                <small style="color: var(--admin-muted);">MP4, WebM, or MOV • Max 50MB</small>
                <div class="mt-2 d-none" id="selectedFileName" style="font-size: 0.8rem; color: var(--admin-gold, #dba24c);"></div>
              </div>
              @if(!empty($content['video']))
              <small class="text-muted mt-2 d-block" style="font-size: 0.75rem;">
                <i class="bi bi-check-circle text-success me-1"></i>Current: {{ basename($content['video']) }}
              </small>
              @endif
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold" style="font-size: 0.85rem;">
                <i class="bi bi-chat-quote me-1" style="color: var(--admin-gold, #dba24c);"></i>Caption Text
              </label>
              <textarea class="form-control" name="content[caption]" rows="3" placeholder="e.g. Handcrafted Genuine Leather Cowboy Boots, Made in Bali Since 1990" style="font-size: 0.85rem; background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);">{{ $content['caption'] ?? '' }}</textarea>
              <small style="color: var(--admin-muted); font-size: 0.75rem;">This caption will appear overlaid on the hero video.</small>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold" style="font-size: 0.85rem;">
                <i class="bi bi-link-45deg me-1" style="color: var(--admin-gold, #dba24c);"></i>CTA Button Text
              </label>
              <input type="text" class="form-control form-control-sm" name="content[cta_text]" value="{{ $content['cta_text'] ?? 'Explore Catalog' }}" placeholder="e.g. Explore Catalog" style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold" style="font-size: 0.85rem;">
                <i class="bi bi-link-45deg me-1" style="color: var(--admin-gold, #dba24c);"></i>CTA Button Link
              </label>
              <input type="text" class="form-control form-control-sm" name="content[cta_link]" value="{{ $content['cta_link'] ?? '/catalog' }}" placeholder="e.g. /catalog or https://wa.me/..." style="background: var(--admin-surface-soft); border-color: var(--admin-border); color: var(--admin-text);" />
            </div>
          </div>
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('videoFileInput');
    const uploadZone = document.getElementById('uploadZone');
    const selectedFileName = document.getElementById('selectedFileName');

    // Show selected file name
    if (fileInput) {
      fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
          const file = this.files[0];
          selectedFileName.textContent = '✓ Selected: ' + file.name + ' (' + (file.size / (1024 * 1024)).toFixed(1) + 'MB)';
          selectedFileName.classList.remove('d-none');

          // Preview the video
          const videoPreviewBox = document.getElementById('videoPreviewBox');
          const existingPlaceholder = document.getElementById('videoPlaceholder');
          let videoEl = document.getElementById('videoPreview');

          if (existingPlaceholder) existingPlaceholder.remove();

          if (!videoEl) {
            videoEl = document.createElement('video');
            videoEl.id = 'videoPreview';
            videoEl.controls = true;
            videoEl.muted = true;
            videoEl.playsInline = true;
            videoPreviewBox.appendChild(videoEl);
          }

          const url = URL.createObjectURL(file);
          videoEl.src = url;
          videoEl.load();
        }
      });
    }

    // Drag & drop visual feedback
    if (uploadZone) {
      uploadZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
      });
      uploadZone.addEventListener('dragleave', function() {
        this.classList.remove('dragover');
      });
      uploadZone.addEventListener('drop', function() {
        this.classList.remove('dragover');
      });
    }
  });
</script>
@endpush
