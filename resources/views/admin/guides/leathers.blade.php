@extends('admin.layouts.app')

@section('title', 'Leather - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item"><span style="color: var(--admin-muted);">Guides</span></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Leather</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Leather
      </h1>
    </div>

    <div class="d-flex align-items-center gap-2">
      <span class="badge {{ $leathers->count() >= 6 ? 'bg-warning text-dark' : 'bg-secondary-subtle text-secondary' }} px-3 py-2" style="font-size: 0.82rem;">
        {{ $leathers->count() }} / 6 Item
      </span>

      @if($canAdd)
        <a href="{{ route('admin.guides.leathers.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem;">
          <i class="bi bi-plus-lg"></i>
          <span>Add Leather</span>
        </a>
      @else
        <button class="btn btn-secondary d-inline-flex align-items-center gap-2 px-3 py-2 opacity-50" style="font-size: 0.85rem;" disabled title="Maksimal 6 item telah tercapai">
          <i class="bi bi-plus-lg"></i>
          <span>Add Leather</span>
        </button>
      @endif
    </div>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="bi bi-check-circle-fill text-success fs-5"></i>
    <div>{{ session('success') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
    <div>{{ session('error') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(!$canAdd)
  <div class="alert alert-info py-2 px-3 mb-4 d-flex align-items-center gap-2" style="font-size: 0.84rem;">
    <i class="bi bi-info-circle-fill text-info"></i>
    <span>Maksimal 6 item leather telah tercapai. Hapus salah satu item jika ingin menambahkan yang baru.</span>
  </div>
  @endif

  <!-- DataTable Card -->
  <div class="card p-3 p-md-4">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="leathers-table" style="font-size: 0.85rem; width: 100%;">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th style="width: 80px;">Image</th>
            <th style="width: 170px;">Name</th>
            <th>Traits</th>
            <th class="text-end" style="width: 110px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($leathers as $idx => $leather)
          <tr>
            <td>{{ $idx + 1 }}</td>
            <td>
              <img src="{{ $leather->image_url }}" alt="{{ $leather->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid var(--admin-border);" />
            </td>
            <td>
              <strong style="color: var(--admin-text); font-size: 0.92rem;">{{ $leather->name }}</strong>
            </td>
            <td>
              <ul class="mb-0 ps-3" style="font-size: 0.8rem; color: var(--admin-muted); line-height: 1.45;">
                @foreach($leather->traits_list as $trait)
                  <li>{{ $trait }}</li>
                @endforeach
              </ul>
            </td>
            <td class="text-end">
              <div class="btn-group btn-group-sm">
                <a href="{{ route('admin.guides.leathers.edit', $leather) }}" class="btn btn-outline-primary" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.guides.leathers.destroy', $leather) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus varietas kulit {{ $leather->name }}?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger" title="Delete">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
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
      $('#leathers-table').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search leather...",
          lengthMenu: "Show _MENU_ items",
          info: "Showing _START_ to _END_ of _TOTAL_ items",
          paginate: {
            previous: "<i class='bi bi-chevron-left'></i>",
            next: "<i class='bi bi-chevron-right'></i>"
          }
        },
        order: [[0, 'asc']],
        columnDefs: [
          { orderable: false, targets: [1, 4] }
        ]
      });
    }
  });
</script>
@endpush
