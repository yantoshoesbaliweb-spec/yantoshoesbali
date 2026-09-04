@extends('admin.layouts.app')

@section('title', ($product ? 'Edit' : 'Add') . ' Product - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.products') }}" style="color: var(--admin-gold, #dba24c);">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">{{ $product ? 'Edit' : 'Add' }}</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        {{ $product ? 'Edit Product' : 'Add Product' }}
      </h1>
    </div>
    <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
      <i class="bi bi-arrow-left"></i>
      <span>Back to Products</span>
    </a>
  </div>

  @if($errors->any())
  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <form
    action="{{ $product ? route('admin.products.update', $product) : route('admin.products.store') }}"
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    @if($product) @method('PUT') @endif

    <div class="row g-4">
      <!-- Left Column: Product Details -->
      <div class="col-12 col-lg-8">
        <div class="card p-3 p-md-4">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Product Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" required placeholder="e.g. Classic Tan Cowboy Boots" value="{{ old('name', $product->name ?? '') }}" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Series</label>
              <input type="text" class="form-control" name="series" placeholder="e.g. Heritage Classic Series" value="{{ old('series', $product->series ?? '') }}" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Category</label>
              <select class="form-select" name="category_id">
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Turnaround</label>
              <input type="text" class="form-control" name="turnaround" placeholder="e.g. 6-7 Days" value="{{ old('turnaround', $product->turnaround ?? '') }}" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Leather Material</label>
              <input type="text" class="form-control" name="leather" placeholder="e.g. Full Grain Cowhide" value="{{ old('leather', $product->leather ?? '') }}" />
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Images -->
      <div class="col-12 col-lg-4">
        <div class="card p-3 p-md-4">
          <label class="form-label fw-semibold mb-3" style="font-size: 0.82rem;">
            <i class="bi bi-images me-1" style="color: var(--admin-gold);"></i> Product Images
          </label>

          <!-- Existing Images -->
          @if($product && $product->images->count())
          <div class="mb-3">
            <div class="row g-2">
              @foreach($product->images as $img)
              <div class="col-4" id="img-wrap-{{ $img->id }}">
                <div class="position-relative" style="border-radius: 8px; overflow: hidden; border: 1px solid var(--admin-border);">
                  <img src="{{ asset($img->image_path) }}" alt="Product image" style="width: 100%; height: 80px; object-fit: cover;" />
                  <form action="{{ route('admin.products.image.delete', $img) }}" method="POST" class="position-absolute" style="top: 4px; right: 4px;" onsubmit="return confirm('Delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm p-0 d-flex align-items-center justify-content-center" style="width: 22px; height: 22px; border-radius: 50%; font-size: 0.65rem;">
                      <i class="bi bi-x-lg"></i>
                    </button>
                  </form>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          @endif

          <!-- Upload New Images -->
          <div class="upload-zone" id="uploadZone" style="border: 2px dashed var(--admin-border); border-radius: 10px; padding: 1.5rem; text-align: center; cursor: pointer; transition: all 0.2s ease; background: var(--admin-surface-soft);">
            <i class="bi bi-cloud-arrow-up" style="font-size: 2rem; color: var(--admin-gold);"></i>
            <p class="mb-1 mt-2" style="font-size: 0.82rem; color: var(--admin-text); font-weight: 500;">
              Click or drag images here
            </p>
            <small class="text-muted" style="font-size: 0.72rem;">JPG, PNG, WebP, SVG — Max 5MB each, up to 10 files</small>
            <input type="file" name="image_files[]" id="imageInput" multiple accept="image/*" class="d-none" />
          </div>

          <!-- Preview Area -->
          <div id="imagePreview" class="row g-2 mt-2"></div>
        </div>
      </div>
    </div>

    <!-- Submit -->
    <div class="d-flex justify-content-end gap-2 mt-4">
      <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary px-4">Cancel</a>
      <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-2 px-4">
        <i class="bi bi-save"></i>
        {{ $product ? 'Update Product' : 'Save Product' }}
      </button>
    </div>
  </form>

</div>
@endsection

@push('styles')
<style>
  .upload-zone:hover,
  .upload-zone.dragover {
    border-color: var(--admin-gold) !important;
    background: rgba(219, 162, 76, 0.06) !important;
  }
  .preview-thumb {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid var(--admin-border);
  }
  .preview-thumb img {
    width: 100%;
    height: 80px;
    object-fit: cover;
  }
  .preview-thumb .remove-btn {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: #dc3545;
    color: #fff;
    border: none;
    font-size: 0.65rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }
</style>
@endpush

@push('scripts')
<script>
  const uploadZone = document.getElementById('uploadZone');
  const imageInput = document.getElementById('imageInput');
  const imagePreview = document.getElementById('imagePreview');

  // Click to open file picker
  uploadZone.addEventListener('click', function() {
    imageInput.click();
  });

  // Drag and drop
  uploadZone.addEventListener('dragover', function(e) {
    e.preventDefault();
    uploadZone.classList.add('dragover');
  });

  uploadZone.addEventListener('dragleave', function() {
    uploadZone.classList.remove('dragover');
  });

  uploadZone.addEventListener('drop', function(e) {
    e.preventDefault();
    uploadZone.classList.remove('dragover');
    if (e.dataTransfer.files.length) {
      imageInput.files = e.dataTransfer.files;
      showPreviews(e.dataTransfer.files);
    }
  });

  // Show file previews
  imageInput.addEventListener('change', function() {
    showPreviews(this.files);
  });

  function showPreviews(files) {
    imagePreview.innerHTML = '';
    Array.from(files).forEach(function(file, index) {
      if (!file.type.startsWith('image/')) return;
      var reader = new FileReader();
      reader.onload = function(e) {
        var col = document.createElement('div');
        col.className = 'col-4';
        col.innerHTML = '<div class="preview-thumb">' +
          '<img src="' + e.target.result + '" alt="Preview" />' +
          '</div>';
        imagePreview.appendChild(col);
      };
      reader.readAsDataURL(file);
    });
  }
</script>
@endpush
