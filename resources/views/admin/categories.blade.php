@extends('admin.layouts.app')

@section('title', 'Categories - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item"><span style="color: var(--admin-muted);">Catalog</span></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Categories</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Categories
      </h1>
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
  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="row g-4">
    <!-- Add Category Form -->
    <div class="col-12 col-md-4">
      <div class="card p-3">
        <h6 class="fw-bold mb-3" style="color: var(--admin-text); font-size: 0.95rem;">
          <i class="bi bi-plus-circle me-1" style="color: var(--admin-gold);"></i> Add Category
        </h6>
        <form action="{{ route('admin.categories.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Category Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" required placeholder="e.g. Classic" value="{{ old('name') }}" />
          </div>
          <button type="submit" class="btn btn-primary w-100 d-inline-flex align-items-center justify-content-center gap-2" style="font-size: 0.85rem;">
            <i class="bi bi-save"></i> Save Category
          </button>
        </form>
      </div>
    </div>

    <!-- Categories List -->
    <div class="col-12 col-md-8">
      <div class="card p-2 p-md-3">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Products</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($categories as $idx => $category)
              <tr id="category-row-{{ $category->id }}">
                <td>{{ $idx + 1 }}</td>
                <td>
                  <span class="category-name-display" data-id="{{ $category->id }}">{{ $category->name }}</span>
                  <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="category-edit-form d-none" data-id="{{ $category->id }}">
                    @csrf
                    @method('PUT')
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="name" value="{{ $category->name }}" required />
                      <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i></button>
                      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="cancelEdit({{ $category->id }})"><i class="bi bi-x-lg"></i></button>
                    </div>
                  </form>
                </td>
                <td>
                  <span class="badge bg-secondary-subtle text-secondary px-2 py-1" style="font-size: 0.72rem;">
                    {{ $category->products_count }} products
                  </span>
                </td>
                <td class="text-end">
                  <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-primary" title="Edit" onclick="startEdit({{ $category->id }})">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-outline-danger" title="Delete" onclick="confirmDeleteCategory({{ $category->id }}, '{{ addslashes($category->name) }}')">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted py-4">No categories yet.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content" style="border: 1px solid var(--admin-border); border-radius: 12px;">
      <div class="modal-header border-bottom" style="border-color: var(--admin-border) !important;">
        <h6 class="modal-title fw-bold text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Confirm Delete</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="mb-0" style="font-size: 0.88rem;">Are you sure you want to delete <strong id="deleteCategoryName"></strong>?</p>
      </div>
      <div class="modal-footer border-top" style="border-color: var(--admin-border) !important;">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteCategoryForm" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  function startEdit(id) {
    document.querySelector('.category-name-display[data-id="' + id + '"]').classList.add('d-none');
    document.querySelector('.category-edit-form[data-id="' + id + '"]').classList.remove('d-none');
  }

  function cancelEdit(id) {
    document.querySelector('.category-name-display[data-id="' + id + '"]').classList.remove('d-none');
    document.querySelector('.category-edit-form[data-id="' + id + '"]').classList.add('d-none');
  }

  function confirmDeleteCategory(id, name) {
    document.getElementById('deleteCategoryName').textContent = name;
    document.getElementById('deleteCategoryForm').action = "{{ url('admin/categories') }}/" + id;
    var modal = new bootstrap.Modal(document.getElementById('deleteCategoryModal'));
    modal.show();
  }
</script>
@endpush
