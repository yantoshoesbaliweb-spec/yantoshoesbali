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
    <ul class="mb-0">
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
  >
    @csrf
    @if($leather) @method('PUT') @endif

    <div class="row g-4">
      <!-- Main Details -->
      <div class="col-12 col-lg-8">
        <div class="card p-3 p-md-4">
          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.85rem;">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" required placeholder="e.g. Calfskin Leather" value="{{ old('name', $leather->name ?? '') }}" />
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.85rem;">Traits (1 baris per poin)</label>
            <textarea class="form-control" name="traits" rows="6" placeholder="Smooth, supple and refined&#10;Fine, even grain with a soft touch&#10;Excellent durability">{{ old('traits', $leather->traits ?? '') }}</textarea>
            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Setiap baris baru akan menjadi 1 bullet point karakteristik pada panduan.</small>
          </div>
        </div>
      </div>

      <!-- Image Column -->
      <div class="col-12 col-lg-4">
        <div class="card p-3 p-md-4">
          <label class="form-label fw-semibold" style="font-size: 0.85rem;">Image</label>

          @if($leather && $leather->image)
            <div class="mb-3 text-center">
              <img src="{{ $leather->image_url }}" alt="{{ $leather->name }}" class="img-fluid rounded border" style="max-height: 200px; object-fit: cover;" />
              <div class="text-muted mt-1" style="font-size: 0.75rem;">Foto saat ini</div>
            </div>
          @endif

          <div class="mb-3">
            <input type="file" class="form-control" name="image" accept="image/*" />
            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Format: JPG, PNG, WEBP (Max 5MB)</small>
          </div>

          <hr class="my-3" style="border-color: var(--admin-border);" />

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary flex-fill d-inline-flex align-items-center justify-content-center gap-2 py-2" style="font-size: 0.85rem;">
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
