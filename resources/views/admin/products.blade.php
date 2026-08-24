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
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Manage all 12 signature handcrafted genuine leather boot models displayed on the public catalog.</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <button class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; font-weight: 500; border-radius: 6px;" onclick="alert('Modal: Tambah Model Sepatu Baru (Mock UI)')">
        <i class="bi bi-plus-circle"></i>
        <span>Add Boot Model</span>
      </button>
      <a href="{{ route('visitor.catalog') }}" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Live Catalog</span>
      </a>
    </div>
  </div>

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
              <img src="{{ asset($boot['image']) }}" alt="{{ $boot['name'] }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid var(--admin-border);" />
            </td>
            <td>
              <div class="fw-bold" style="color: var(--admin-text); font-size: 0.92rem;">{{ $boot['name'] }}</div>
              <small class="text-muted" style="font-size: 0.74rem;">{{ $boot['series'] }}</small>
            </td>
            <td>
              <span class="badge bg-secondary-subtle text-secondary px-2 py-1" style="font-size: 0.72rem;">
                {{ $boot['category'] }}
              </span>
            </td>
            <td>
              <div class="text-truncate" style="max-width: 240px;" title="{{ $boot['leather'] }}">
                <i class="bi bi-shield-check me-1" style="color: var(--admin-gold, #dba24c);"></i>{{ $boot['leather'] }}
              </div>
            </td>
            <td>
              <span class="d-inline-flex align-items-center gap-1 text-muted" style="font-size: 0.78rem;">
                <i class="bi bi-clock-history"></i>{{ $boot['turnaround'] }}
              </span>
            </td>
            <td>
              <span class="badge {{ $boot['badge_class'] }}" style="font-size: 0.7rem;">
                {{ $boot['badge'] }}
              </span>
            </td>
            <td>
              <span class="badge bg-success" style="font-size: 0.7rem;">
                <i class="bi bi-check-circle me-1"></i>{{ $boot['status'] }}
              </span>
            </td>
            <td class="text-end">
              <div class="btn-group btn-group-sm">
                <a href="{{ route('visitor.catalog') }}" target="_blank" class="btn btn-outline-secondary" title="View on Catalog">
                  <i class="bi bi-eye"></i>
                </a>
                <button class="btn btn-outline-primary" title="Edit Model" onclick="alert('Edit Model: {{ addslashes($boot['name']) }}')">
                  <i class="bi bi-pencil"></i>
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
</script>
@endpush
