@extends('admin.layouts.app')

@section('title', 'Boots Catalog - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">
  
  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Boots Catalog</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Handcrafted Boots Catalog
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Manage all signature handcrafted genuine leather boot models displayed on the public catalog.</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <button class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; font-weight: 500; border-radius: 6px;" data-bs-toggle="modal" data-bs-target="#productModal" onclick="resetProductForm()">
        <i class="bi bi-plus-circle"></i>
        <span>Add Boot Model</span>
      </button>
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
            <th>Boot Name &amp; Series</th>
            <th>Category</th>
            <th>Leather Material</th>
            <th>Turnaround</th>
            <th>Badge</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $boot)
          <tr>
            <td>
              <img src="{{ asset($boot->image) }}" alt="{{ $boot->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid var(--admin-border);" />
            </td>
            <td>
              <div class="fw-bold" style="color: var(--admin-text); font-size: 0.92rem;">{{ $boot->name }}</div>
              <small class="text-muted" style="font-size: 0.74rem;">{{ $boot->series }}</small>
            </td>
            <td>
              <span class="badge bg-secondary-subtle text-secondary px-2 py-1" style="font-size: 0.72rem;">
                {{ $boot->category }}
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
              <span class="badge {{ $boot->badge_class }}" style="font-size: 0.7rem;">
                {{ $boot->badge }}
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
                <button class="btn btn-outline-primary" title="Edit Model" onclick="editProduct({{ json_encode($boot) }})">
                  <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-outline-danger" title="Delete Model" onclick="confirmDelete({{ $boot->id }}, '{{ addslashes($boot->name) }}')">
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

<!-- Product Create/Edit Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border: 1px solid var(--admin-border); border-radius: 12px;">
      <div class="modal-header border-bottom" style="border-color: var(--admin-border) !important;">
        <h5 class="modal-title fw-bold" id="productModalLabel" style="font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; color: var(--admin-text);">
          <i class="bi bi-box-seam me-2" style="color: var(--admin-gold);"></i>
          <span id="modalTitle">Add New Boot Model</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="productForm" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Boot Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="pName" required placeholder="e.g. Classic Tan Cowboy Boots" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Series</label>
              <input type="text" class="form-control" name="series" id="pSeries" placeholder="e.g. Heritage Classic Series" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Category</label>
              <select class="form-select" name="category" id="pCategory">
                <option value="Classic">Classic</option>
                <option value="Bohemian">Bohemian</option>
                <option value="Bold">Bold</option>
                <option value="Premium">Premium</option>
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Turnaround</label>
              <input type="text" class="form-control" name="turnaround" id="pTurnaround" placeholder="e.g. 6-7 Days" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Badge Label</label>
              <input type="text" class="form-control" name="badge" id="pBadge" placeholder="e.g. Best Seller" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Leather Material</label>
              <input type="text" class="form-control" name="leather" id="pLeather" placeholder="e.g. Full Grain Cowhide (Tan Oil Pull-up)" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Badge Style Class</label>
              <select class="form-select" name="badge_class" id="pBadgeClass">
                <option value="bg-warning text-dark">Gold (Best Seller)</option>
                <option value="bg-success text-white">Green (New/Boho)</option>
                <option value="bg-danger text-white">Red (Bold/Textured)</option>
                <option value="bg-dark text-white">Dark (Premium/Heavy)</option>
                <option value="bg-info text-white">Blue (Suede/Info)</option>
                <option value="bg-secondary text-white">Gray (Classic/Durable)</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Product Image</label>
              <input type="file" class="form-control" name="image_file" accept="image/*" />
              <small class="text-muted">Upload a new image or leave empty to keep current.</small>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Image Path (manual)</label>
              <input type="text" class="form-control" name="image" id="pImage" placeholder="e.g. images/product_tan.png" />
              <small class="text-muted">Used only if no file is uploaded above.</small>
            </div>
          </div>
        </div>
        <div class="modal-footer border-top" style="border-color: var(--admin-border) !important;">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-save"></i>
            <span id="submitBtnText">Save Boot Model</span>
          </button>
        </div>
      </form>
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
          searchPlaceholder: "Search boots, series, leather...",
          lengthMenu: "Show _MENU_ models",
          info: "Showing _START_ to _END_ of _TOTAL_ boots",
          paginate: {
            previous: "<i class='bi bi-chevron-left'></i>",
            next: "<i class='bi bi-chevron-right'></i>"
          }
        },
        order: [[1, 'asc']],
        columnDefs: [
          { orderable: false, targets: [0, 7] }
        ]
      });
    }
  });

  function resetProductForm() {
    document.getElementById('modalTitle').textContent = 'Add New Boot Model';
    document.getElementById('submitBtnText').textContent = 'Save Boot Model';
    document.getElementById('productForm').action = "{{ route('admin.products.store') }}";
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('pName').value = '';
    document.getElementById('pSeries').value = '';
    document.getElementById('pCategory').value = 'Classic';
    document.getElementById('pTurnaround').value = '';
    document.getElementById('pBadge').value = '';
    document.getElementById('pLeather').value = '';
    document.getElementById('pBadgeClass').value = 'bg-warning text-dark';
    document.getElementById('pImage').value = '';
  }

  function editProduct(product) {
    document.getElementById('modalTitle').textContent = 'Edit Boot Model';
    document.getElementById('submitBtnText').textContent = 'Update Boot Model';
    document.getElementById('productForm').action = "{{ url('admin/products') }}/" + product.id;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('pName').value = product.name || '';
    document.getElementById('pSeries').value = product.series || '';
    document.getElementById('pCategory').value = product.category || 'Classic';
    document.getElementById('pTurnaround').value = product.turnaround || '';
    document.getElementById('pBadge').value = product.badge || '';
    document.getElementById('pLeather').value = product.leather || '';
    document.getElementById('pBadgeClass').value = product.badge_class || 'bg-secondary text-white';
    document.getElementById('pImage').value = product.image || '';

    var modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
  }

  function confirmDelete(id, name) {
    document.getElementById('deleteProductName').textContent = name;
    document.getElementById('deleteForm').action = "{{ url('admin/products') }}/" + id;
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
  }
</script>
@endpush
