@extends('admin.layouts.app')

@section('title', 'Store Locations - Yanto Shoes Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item" style="color: var(--admin-muted);">About Us</li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Stores</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Store Locations Management
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Manage Bali store locations displayed on the homepage (maps, addresses, operating hours).</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}#stores" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Preview Live Stores</span>
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

  <form action="{{ route('admin.about.stores.update') }}" method="POST">
    @csrf

    <!-- Section Header Settings -->
    <div class="card mb-4">
      <div class="card-header bg-transparent border-bottom p-3" style="border-color: var(--admin-border) !important;">
        <h5 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 1.05rem;">
          <i class="bi bi-type-h1 me-2" style="color: var(--admin-gold, #dba24c);"></i>Section Header
        </h5>
      </div>
      <div class="card-body p-3">
        <div class="row g-3">
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Eyebrow Text</label>
            <input type="text" class="form-control" name="content[eyebrow]" value="{{ $content['eyebrow'] ?? 'Visit Our Stores' }}" />
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Section Title</label>
            <input type="text" class="form-control" name="content[title]" value="{{ $content['title'] ?? 'Our Bali Store Locations' }}" />
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Section Description</label>
            <input type="text" class="form-control" name="content[description]" value="{{ $content['description'] ?? 'Experience our boots firsthand. Visit any of our three stores across Bali for fittings, custom sizing, and instant purchases.' }}" />
          </div>
        </div>
      </div>
    </div>

    <!-- Store Entries -->
    <div id="stores-container">
      @php
        $items = $content['items'] ?? [
          [
            'name' => 'Legian Flagship',
            'badge' => 'Flagship Outlet',
            'address' => 'Jl. Legian No. 388, Kuta, Badung, Bali 80361',
            'hours' => '10:00 AM – 6:00 PM (Mon – Sun)',
            'map_embed' => 'https://maps.google.com/maps?q=Yanto+Shoes+3+Uluwatu-Pecatu,+Bali&hl=en&z=16&output=embed',
            'map_link' => 'https://maps.app.goo.gl/qH3JJZtfXYbTJqXw7?g_st=aw',
            'whatsapp_text' => 'Hi Yanto Shoes Legian, I am planning to visit your store',
          ],
          [
            'name' => 'Canggu Store',
            'badge' => 'Canggu Hub',
            'address' => 'Jl. Pantai Batu Bolong No. 56, Canggu, Bali 80351',
            'hours' => '10:00 AM – 6:00 PM (Mon – Sun)',
            'map_embed' => 'https://maps.google.com/maps?q=Yanto+Shoes+2,+Jl.+Pantai+Batu+Bolong+No.11a,+Canggu,+Bali&hl=en&z=16&output=embed',
            'map_link' => 'https://maps.app.goo.gl/v36RDnMZDLeoEkcd9?g_st=aw',
            'whatsapp_text' => 'Hi Yanto Shoes Canggu, I am planning to visit your store',
          ],
          [
            'name' => 'Uluwatu Store',
            'badge' => 'Clifftop Outlet',
            'address' => 'Jl. Labuansait No. 12, Pecatu, Uluwatu, Bali 80361',
            'hours' => '10:00 AM – 6:00 PM (Mon – Sun)',
            'map_embed' => 'https://maps.google.com/maps?q=yanto+shoes,+Jl.+Werkudara+No.20,+Legian,+Bali&hl=en&z=16&output=embed',
            'map_link' => 'https://maps.app.goo.gl/rWzUWYkMv3h5L53R8?g_st=aw',
            'whatsapp_text' => 'Hi Yanto Shoes Uluwatu, I am planning to visit your store',
          ],
        ];
      @endphp

      @foreach($items as $i => $store)
      <div class="card mb-3 store-card" data-index="{{ $i }}">
        <div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center" style="border-color: var(--admin-border) !important;">
          <h6 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 0.95rem;">
            <i class="bi bi-geo-alt-fill me-2" style="color: var(--admin-gold);"></i>Store #{{ $i + 1 }}: {{ $store['name'] ?? 'New Store' }}
          </h6>
          <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeStore(this)" title="Remove">
            <i class="bi bi-trash"></i>
          </button>
        </div>
        <div class="card-body p-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Store Name</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][name]" value="{{ $store['name'] ?? '' }}" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Badge / Label</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][badge]" value="{{ $store['badge'] ?? '' }}" placeholder="e.g. Flagship Outlet" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Operating Hours</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][hours]" value="{{ $store['hours'] ?? '10:00 AM – 6:00 PM (Mon – Sun)' }}" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Full Address</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][address]" value="{{ $store['address'] ?? '' }}" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Google Maps Embed URL</label>
              <input type="url" class="form-control" name="content[items][{{ $i }}][map_embed]" value="{{ $store['map_embed'] ?? '' }}" placeholder="https://maps.google.com/maps?q=..." />
              <small class="text-muted">The iframe src URL for the embedded map.</small>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Google Maps Direction Link</label>
              <input type="url" class="form-control" name="content[items][{{ $i }}][map_link]" value="{{ $store['map_link'] ?? '' }}" placeholder="https://maps.app.goo.gl/..." />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">WhatsApp Message for this Store</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][whatsapp_text]" value="{{ $store['whatsapp_text'] ?? '' }}" placeholder="Hi Yanto Shoes, I am planning to visit..." />
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Add Store Button -->
    <div class="mb-4">
      <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center gap-2" onclick="addStore()">
        <i class="bi bi-plus-circle"></i>
        <span>Add New Store</span>
      </button>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
        <i class="bi bi-save"></i>
        <span>Save Store Locations</span>
      </button>
    </div>

  </form>

</div>
@endsection

@push('scripts')
<script>
  let storeIndex = {{ count($items) }};

  function addStore() {
    const container = document.getElementById('stores-container');
    const i = storeIndex++;
    const html = `
      <div class="card mb-3 store-card" data-index="${i}">
        <div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center" style="border-color: var(--admin-border) !important;">
          <h6 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 0.95rem;">
            <i class="bi bi-geo-alt-fill me-2" style="color: var(--admin-gold);"></i>New Store
          </h6>
          <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeStore(this)" title="Remove">
            <i class="bi bi-trash"></i>
          </button>
        </div>
        <div class="card-body p-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Store Name</label>
              <input type="text" class="form-control" name="content[items][${i}][name]" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Badge / Label</label>
              <input type="text" class="form-control" name="content[items][${i}][badge]" placeholder="e.g. Flagship Outlet" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Operating Hours</label>
              <input type="text" class="form-control" name="content[items][${i}][hours]" value="10:00 AM – 6:00 PM (Mon – Sun)" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Full Address</label>
              <input type="text" class="form-control" name="content[items][${i}][address]" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Google Maps Embed URL</label>
              <input type="url" class="form-control" name="content[items][${i}][map_embed]" placeholder="https://maps.google.com/maps?q=..." />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Google Maps Direction Link</label>
              <input type="url" class="form-control" name="content[items][${i}][map_link]" placeholder="https://maps.app.goo.gl/..." />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">WhatsApp Message for this Store</label>
              <input type="text" class="form-control" name="content[items][${i}][whatsapp_text]" placeholder="Hi Yanto Shoes, I am planning to visit..." />
            </div>
          </div>
        </div>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
  }

  function removeStore(btn) {
    const card = btn.closest('.store-card');
    if (card) card.remove();
  }
</script>
@endpush
