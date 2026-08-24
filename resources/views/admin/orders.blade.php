@extends('admin.layouts.app')

@section('title', 'Orders & Inquiries - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">
  
  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Orders &amp; Inquiries</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Bespoke Orders &amp; Inquiries Tracker
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Track custom sizing, bespoke design requests, and production timelines across all stores.</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <button class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; font-weight: 500; border-radius: 6px;" onclick="alert('Modal: Tambah Pesanan Custom Baru (Mock UI)')">
        <i class="bi bi-plus-circle"></i>
        <span>Add New Order</span>
      </button>
    </div>
  </div>

  <!-- Orders Card Container -->
  <div class="card p-2 p-md-3">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="orders-table" style="font-size: 0.85rem; width: 100%;">
        <thead>
          <tr>
            <th>ID &amp; Date</th>
            <th>Customer &amp; Origin</th>
            <th>Boot Model</th>
            <th>Custom Specifications &amp; Notes</th>
            <th>Channel</th>
            <th>Timeline</th>
            <th>Status</th>
            <th class="text-end">Contact</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $ord)
          <tr>
            <td>
              <div class="fw-bold text-primary" style="color: var(--admin-gold, #dba24c) !important;">{{ $ord['id'] }}</div>
              <small class="text-muted" style="font-size: 0.72rem;">{{ $ord['date'] }}</small>
            </td>
            <td>
              <div class="fw-bold" style="color: var(--admin-text);">{{ $ord['customer'] }}</div>
              <div class="text-muted" style="font-size: 0.76rem;">{{ $ord['origin'] }}</div>
            </td>
            <td>
              <div class="fw-semibold" style="color: var(--admin-text);">{{ $ord['model'] }}</div>
              <small class="text-muted" style="font-size: 0.72rem;">{{ $ord['phone'] }}</small>
            </td>
            <td>
              <div style="max-width: 280px; font-size: 0.8rem; line-height: 1.4; color: var(--admin-text);">
                {{ $ord['custom_notes'] }}
              </div>
            </td>
            <td>
              <span class="badge bg-secondary-subtle text-secondary" style="font-size: 0.7rem;">
                {{ $ord['channel'] }}
              </span>
            </td>
            <td>
              <div class="d-flex align-items-center gap-1 text-muted" style="font-size: 0.76rem;">
                <i class="bi bi-calendar-event"></i>{{ $ord['est_completion'] }}
              </div>
            </td>
            <td>
              <span class="badge {{ $ord['status_class'] }} px-2 py-1" style="font-size: 0.72rem; font-weight: 600;">
                {{ $ord['status'] }}
              </span>
            </td>
            <td class="text-end">
              <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $ord['phone']) }}" target="_blank" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1" style="font-size: 0.74rem;" title="Chat via WhatsApp">
                <i class="bi bi-whatsapp"></i>
                <span>WA</span>
              </a>
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
      $('#orders-table').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search customer, country, model...",
          lengthMenu: "Show _MENU_ entries",
          info: "Showing _START_ to _END_ of _TOTAL_ inquiries",
          paginate: {
            previous: "<i class='bi bi-chevron-left'></i>",
            next: "<i class='bi bi-chevron-right'></i>"
          }
        },
        order: [[0, 'desc']],
        columnDefs: [
          { orderable: false, targets: [3, 7] }
        ]
      });
    }
  });
</script>
@endpush
