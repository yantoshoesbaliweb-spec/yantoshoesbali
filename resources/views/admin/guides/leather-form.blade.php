@extends('admin.layouts.app')

@section('title', ($leather ? 'Edit' : 'Add') . ' Leather - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.guides.leathers') }}" style="color: var(--admin-gold, #dba24c);">Leather</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">{{ $leather ? 'Edit' : 'Add' }}</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        {{ $leather ? 'Edit Leather' : 'Add Leather' }}
      </h1>
    </div>
    <a href="{{ route('admin.guides.leathers') }}" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
      <i class="bi bi-arrow-left"></i>
      <span>Back to Leather</span>
    </a>
  </div>

  @if(isset($errors) && $errors->any())
  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
    <div class="fw-semibold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Terjadi kesalahan pengisian form:</div>
    <ul class="mb-0 ps-3">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <form
    action="{{ $leather ? route('admin.guides.leathers.update', $leather) : route('admin.guides.leathers.store') }}"
    method="POST"
    enctype="multipart/form-data"
    id="leatherForm"
  >
    @csrf
    @if($leather) @method('PUT') @endif

    <div class="row g-4">
      <!-- Main Details -->
      <div class="col-12 col-lg-8">
        <div class="card p-3 p-md-4">
          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.85rem;">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="e.g. Calfskin Leather" value="{{ old('name', $leather->name ?? '') }}" />
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.85rem;">Traits (1 baris per poin)</label>
            <textarea class="form-control @error('traits') is-invalid @enderror" name="traits" rows="6" placeholder="Smooth, supple and refined&#10;Fine, even grain with a soft touch&#10;Excellent durability">{{ old('traits', $leather->traits ?? '') }}</textarea>
            @error('traits')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Setiap baris baru akan menjadi 1 bullet point karakteristik pada panduan.</small>
          </div>
        </div>
      </div>

      <!-- Image Column -->
      <div class="col-12 col-lg-4">
        <div class="card p-3 p-md-4">
          <label class="form-label fw-semibold mb-2" style="font-size: 0.85rem;">
            Image
            @if(!$leather)
              <small class="text-muted fw-normal">(Opsional, fallback otomatis tersedia)</small>
            @endif
          </label>

          @if($leather && $leather->image)
            <div class="mb-3 text-center" id="currentImageContainer">
              <img src="{{ $leather->image_url }}" alt="{{ $leather->name }}" onerror="this.onerror=null;this.src='{{ asset('images/leather_calfskin.jpg') }}';" class="img-fluid rounded border shadow-sm" style="max-height: 200px; object-fit: cover;" />
              <div class="text-muted mt-1" style="font-size: 0.75rem;">Foto saat ini di sistem</div>
            </div>
          @endif

          <!-- Client-side Error Banner -->
          <div id="clientImageError" class="alert alert-danger py-2 px-3 mb-2 d-none" style="font-size: 0.8rem;">
            <i class="bi bi-exclamation-circle-fill me-1"></i> <span id="clientImageErrorText"></span>
          </div>

          <!-- New Image Live Preview -->
          <div id="imagePreviewContainer" class="mb-3 d-none text-center p-2 rounded border" style="background: var(--admin-surface-soft, rgba(0,0,0,0.02));">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="badge bg-primary-subtle text-primary" style="font-size: 0.72rem;">Pratinjau Foto Baru</span>
              <button type="button" class="btn btn-link text-danger p-0 text-decoration-none" id="btnCancelPreview" style="font-size: 0.75rem;">
                <i class="bi bi-x-circle me-1"></i>Batal
              </button>
            </div>
            <img id="previewImg" src="" alt="Pratinjau baru" class="img-fluid rounded border shadow-sm mb-2" style="max-height: 180px; object-fit: cover;" />
            <div class="text-muted d-flex justify-content-between px-1" style="font-size: 0.72rem;">
              <span id="previewFileName" class="text-truncate" style="max-width: 150px;">-</span>
              <span id="previewFileSize">-</span>
            </div>
          </div>

          <div class="mb-3">
            <input
              type="file"
              class="form-control @error('image') is-invalid @enderror"
              id="imageInput"
              name="image"
              accept="image/jpeg,image/png,image/webp,image/svg+xml"
            />
            @error('image')
              <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
            @enderror
            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">
              Format: JPG, PNG, WEBP, SVG (Maks. 5MB).
            </small>
          </div>

          <hr class="my-3" style="border-color: var(--admin-border);" />

          <div class="d-flex gap-2">
            <button type="submit" id="submitBtn" class="btn btn-primary flex-fill d-inline-flex align-items-center justify-content-center gap-2 py-2" style="font-size: 0.85rem;">
              <i class="bi bi-save"></i>
              <span>{{ $leather ? 'Update Leather' : 'Save Leather' }}</span>
            </button>
            <a href="{{ route('admin.guides.leathers') }}" class="btn btn-outline-secondary py-2" style="font-size: 0.85rem;">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('imageInput');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImg = document.getElementById('previewImg');
    const previewFileName = document.getElementById('previewFileName');
    const previewFileSize = document.getElementById('previewFileSize');
    const btnCancel = document.getElementById('btnCancelPreview');
    const errorBox = document.getElementById('clientImageError');
    const errorText = document.getElementById('clientImageErrorText');

    function showError(msg) {
      errorText.textContent = msg;
      errorBox.classList.remove('d-none');
    }

    function clearError() {
      errorText.textContent = '';
      errorBox.classList.add('d-none');
    }

    function resetPreview() {
      input.value = '';
      previewImg.src = '';
      previewContainer.classList.add('d-none');
      clearError();
    }

    if (btnCancel) {
      btnCancel.addEventListener('click', resetPreview);
    }

    if (input) {
      input.addEventListener('change', function(e) {
        clearError();
        const file = e.target.files[0];
        if (!file) {
          resetPreview();
          return;
        }

        // 1. Validate File Size (Max 5MB = 5 * 1024 * 1024 bytes)
        const maxBytes = 5 * 1024 * 1024;
        if (file.size > maxBytes) {
          const actualMb = (file.size / (1024 * 1024)).toFixed(2);
          showError(`Ukuran file terlalu besar (${actualMb} MB). Maksimal yang diperbolehkan adalah 5 MB.`);
          resetPreview();
          return;
        }

        // 2. Validate File Type
        if (!file.type.startsWith('image/')) {
          showError('File yang dipilih bukan gambar yang valid. Pilih file JPG, PNG, WEBP, atau SVG.');
          resetPreview();
          return;
        }

        // 3. Read & Preview
        const reader = new FileReader();
        reader.onload = function(evt) {
          previewImg.src = evt.target.result;
          previewFileName.textContent = file.name;
          const kb = (file.size / 1024).toFixed(1);
          previewFileSize.textContent = kb > 1000 ? (kb / 1024).toFixed(2) + ' MB' : kb + ' KB';
          previewContainer.classList.remove('d-none');
        };

        reader.onerror = function() {
          showError('Gagal membaca file gambar. Kemungkinan file rusak atau tidak dapat diakses.');
          resetPreview();
        };

        reader.readAsDataURL(file);
      });
    }
  });
</script>
@endpush
