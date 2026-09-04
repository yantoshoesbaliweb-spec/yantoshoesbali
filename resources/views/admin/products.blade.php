@extends('admin.layouts.app')

@section('title', 'Products - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">
  
  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item"><span style="color: var(--admin-muted);">Catalog</span></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Products</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
       Products
      </h1>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('admin.products.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; font-weight: 500; border-radius: 6px;">
        <i class="bi bi-plus-circle"></i>
        <span>Add Product</span>
      </a>
      <a href="{{ route('visitor.catalog') }}" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Live Catalog</span>
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

  <!-- Products Card Container -->
  <div class="card p-2 p-md-3">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="products-table" style="font-size: 0.85rem; width: 100%;">
        <thead>
          <tr>
            <th style="width: 70px;">Image</th>
            <th>Name &amp; Series</th>
            <th>Category</th>
            <th>Leather Material</th>
            <th>Turnaround</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $boot)
          <tr>
            <td>
              <img src="{{ asset($boot->primary_image ?? $boot->image ?? 'images/placeholder.png') }}" alt="{{ $boot->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid var(--admin-border);" />
            </td>
            <td>
              <div class="fw-bold" style="color: var(--admin-text); font-size: 0.92rem;">{{ $boot->name }}</div>
              <small class="text-muted" style="font-size: 0.74rem;">{{ $boot->series }}</small>
            </td>
            <td>
              <span class="badge bg-secondary-subtle text-secondary px-2 py-1" style="font-size: 0.72rem;">
                {{ $boot->categoryRelation->name ?? '-' }}
              </span>
            </td>
            <td>
              <div class="text-truncate" style="max-width: 240px;" title="{{ $boot->leather }}">
                <i class="bi bi-shield-check me-1" style="color: var(--admin-gold, #dba24c);"></i>{{ $boot->leather }}
              </div>
            </td>
            <td>
              <span class="d-inline-flex align-items-center gap-1 text-muted" style="font-size: 0.78rem;">
                <i class="bi bi-clock-history"></i>{{ $boot->turnaround }}
              </span>
            </td>
            <td>
              <form action="{{ route('admin.products.toggle', $boot->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="badge border-0 {{ $boot->status === 'Active' ? 'bg-success' : 'bg-secondary' }}" style="font-size: 0.7rem; cursor: pointer;" title="Click to toggle">
                  <i class="bi {{ $boot->status === 'Active' ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>{{ $boot->status }}
                </button>
              </form>
            </td>
            <td class="text-end">
              <div class="btn-group btn-group-sm">
                <a href="{{ route('visitor.catalog') }}" target="_blank" class="btn btn-outline-secondary" title="View on Catalog">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('admin.products.edit', $boot) }}" class="btn btn-outline-primary" title="Edit Product">
                  <i class="bi bi-pencil"></i>
                </a>
                <button class="btn btn-outline-danger" title="Delete Product" onclick="confirmDelete({{ $boot->id }}, '{{ addslashes($boot->name) }}')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content" style="border: 1px solid var(--admin-border); border-radius: 12px;">
      <div class="modal-header border-bottom" style="border-color: var(--admin-border) !important;">
        <h6 class="modal-title fw-bold text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Confirm Delete</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="mb-0" style="font-size: 0.88rem;">Are you sure you want to delete <strong id="deleteProductName"></strong>?</p>
      </div>
      <div class="modal-footer border-top" style="border-color: var(--admin-border) !important;">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm" method="POST" class="d-inline">
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
  $(document).ready(function() {
    if ($.fn.DataTable) {
      $('#products-table').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search products...",
          lengthMenu: "Show _MENU_ products",
          info: "Showing _START_ to _END_ of _TOTAL_ products",
          paginate: {
            previous: "<i class='bi bi-chevron-left'></i>",
            next: "<i class='bi bi-chevron-right'></i>"
          }
        },
        order: [[1, 'asc']],
        columnDefs: [
          { orderable: false, targets: [0, 6] }
        ]
      });
    }
  });

  function confirmDelete(id, name) {
    document.getElementById('deleteProductName').textContent = name;
    document.getElementById('deleteForm').action = "{{ url('admin/products') }}/" + id;
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
  }
</script>
@endpush
