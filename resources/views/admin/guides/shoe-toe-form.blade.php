@extends('admin.layouts.app')

@section('title', ($shoeToe ? 'Edit' : 'Add') . ' Shoe Toe - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.guides.shoe-toes') }}" style="color: var(--admin-gold, #dba24c);">Shoe Toe</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">{{ $shoeToe ? 'Edit' : 'Add' }}</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        {{ $shoeToe ? 'Edit Shoe Toe' : 'Add Shoe Toe' }}
      </h1>
    </div>
    <a href="{{ route('admin.guides.shoe-toes') }}" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
      <i class="bi bi-arrow-left"></i>
      <span>Back to Shoe Toe</span>
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
    action="{{ $shoeToe ? route('admin.guides.shoe-toes.update', $shoeToe) : route('admin.guides.shoe-toes.store') }}"
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    @if($shoeToe) @method('PUT') @endif

    <div class="row g-4">
      <!-- Main Details -->
      <div class="col-12 col-lg-8">
        <div class="card p-3 p-md-4">
          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.85rem;">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" required placeholder="e.g. Square" value="{{ old('name', $shoeToe->name ?? '') }}" />
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.85rem;">Description</label>
            <textarea class="form-control" name="description" rows="4" placeholder="Deskripsi siluet dan profil ujung sepatu...">{{ old('description', $shoeToe->description ?? '') }}</textarea>
          </div>
        </div>
      </div>

      <!-- Image Column -->
      <div class="col-12 col-lg-4">
        <div class="card p-3 p-md-4">
          <label class="form-label fw-semibold" style="font-size: 0.85rem;">Image</label>

          @if($shoeToe && $shoeToe->image)
            <div class="mb-3 text-center">
              <img src="{{ $shoeToe->image_url }}" alt="{{ $shoeToe->name }}" class="img-fluid rounded border" style="max-height: 220px; object-fit: cover;" />
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
              <span>{{ $shoeToe ? 'Update Shoe Toe' : 'Save Shoe Toe' }}</span>
            </button>
            <a href="{{ route('admin.guides.shoe-toes') }}" class="btn btn-outline-secondary py-2" style="font-size: 0.85rem;">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>
@endsection
