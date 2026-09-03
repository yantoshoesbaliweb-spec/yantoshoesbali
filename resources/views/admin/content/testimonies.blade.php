@extends('admin.layouts.app')

@section('title', 'Testimonies Management - Yanto Shoes Admin')

@section('content')
<div class="container-fluid px-0">

  <!-- Page Header -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item" style="color: var(--admin-muted);">Content</li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Testimonies</li>
        </ol>
      </nav>
      <h1 class="h3 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
        Client Testimonies Management
      </h1>
      <p class="text-muted mb-0" style="font-size: 0.85rem;">Manage customer reviews and testimonials displayed on the homepage.</p>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}#testimonials" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Preview Live Testimonials</span>
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

  <form action="{{ route('admin.content.testimonies.update') }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="content[eyebrow]" value="{{ $content['eyebrow'] ?? 'Client Reviews' }}" />
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Section Title</label>
            <input type="text" class="form-control" name="content[title]" value="{{ $content['title'] ?? 'Loved by Boot Lovers' }}" />
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Title Highlight (Italic)</label>
            <input type="text" class="form-control" name="content[title_highlight]" value="{{ $content['title_highlight'] ?? 'Worldwide' }}" />
          </div>
          <div class="col-12">
            <label class="form-label fw-semibold" style="font-size: 0.82rem;">Section Description</label>
            <input type="text" class="form-control" name="content[description]" value="{{ $content['description'] ?? 'From Bali vacationers to international collectors, see what our clients say about their bespoke boots.' }}" />
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonies Entries -->
    <div id="testimonies-container">
      @php $items = $content['items'] ?? []; @endphp
      @if(count($items) === 0)
        @php
          $items = [
            ['author' => 'Sarah Jenkins', 'origin' => 'Sydney, Australia 🇦🇺', 'product' => 'Custom Tan Classic Cowboy Boots', 'stars' => '5', 'avatar' => 'images/reviewer_sarah.jpg', 'text' => 'I ordered a custom pair of cowboy boots while visiting Canggu. The leather quality is extraordinary and the fit is perfection. Picked them up within 6 days before my flight back home. Truly world-class craftsmanship!'],
            ['author' => "Marcus O'Connor", 'origin' => 'London, United Kingdom 🇬🇧', 'product' => 'Midnight Black Flame Boots', 'stars' => '5', 'avatar' => 'images/reviewer_marcus.jpg', 'text' => 'Hands down the most comfortable leather boots in my collection. Mr. Yanto took my measurements personally at the Legian store. The attention to detail on the welt and stitching is incredible.'],
            ['author' => 'Emma Laurent', 'origin' => 'Los Angeles, USA 🇺🇸', 'product' => 'Ivory Dream Floral Embroidered Boots', 'stars' => '5', 'avatar' => 'images/reviewer_emma.jpg', 'text' => 'Found Yanto Shoes on Instagram and ordered online from California via WhatsApp. The team sent photo updates throughout production and shipped via DHL. They arrived quickly and look even better in real life!'],
            ['author' => 'Lukas Meyer', 'origin' => 'Munich, Germany 🇩🇪', 'product' => 'Scarlet Flame Cowboy Boots', 'stars' => '5', 'avatar' => 'images/reviewer_lukas.jpg', 'text' => 'The quality of genuine leather is instantly recognizable. Sturdy, breathable, and molds to your foot effortlessly. I bought one pair in Uluwatu and immediately ordered another custom pair before leaving Bali.'],
            ['author' => 'Chloe & Victor', 'origin' => 'Amsterdam, Netherlands 🇳🇱', 'product' => 'Bespoke Wedding Western Pair', 'stars' => '5', 'avatar' => 'images/reviewer_couple.jpg', 'text' => 'We ordered matching cowboy boots for our wedding in Bali. The artisans custom engraved our initials on the pull-straps. An unforgettable memory and footwear we will cherish forever.'],
            ['author' => 'David Fontaine', 'origin' => 'Paris, France 🇫🇷', 'product' => 'Classic Tan Low-Cut Boot', 'stars' => '5', 'avatar' => 'images/reviewer_david.jpg', 'text' => 'Yanto Shoes is a true Bali hidden gem. The price-to-quality ratio for genuine handmade full-grain boots is unbeatable anywhere in the world. Cannot recommend them enough!'],
          ];
        @endphp
      @endif

      @foreach($items as $i => $item)
      <div class="card mb-3 testimony-card" data-index="{{ $i }}">
        <div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center" style="border-color: var(--admin-border) !important;">
          <h6 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 0.95rem;">
            <i class="bi bi-chat-quote me-2" style="color: var(--admin-gold);"></i>Testimony #{{ $i + 1 }}
          </h6>
          <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeTestimony(this)" title="Remove">
            <i class="bi bi-trash"></i>
          </button>
        </div>
        <div class="card-body p-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Author Name</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][author]" value="{{ $item['author'] ?? '' }}" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Origin / Country</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][origin]" value="{{ $item['origin'] ?? '' }}" placeholder="e.g. Sydney, Australia 🇦🇺" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Product Purchased</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][product]" value="{{ $item['product'] ?? '' }}" />
            </div>
            <div class="col-12 col-md-3">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Star Rating</label>
              <select class="form-select" name="content[items][{{ $i }}][stars]">
                @for($s = 5; $s >= 1; $s--)
                <option value="{{ $s }}" {{ ($item['stars'] ?? 5) == $s ? 'selected' : '' }}>{{ $s }} ★</option>
                @endfor
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Avatar Image Path</label>
              <input type="text" class="form-control" name="content[items][{{ $i }}][avatar]" value="{{ $item['avatar'] ?? '' }}" placeholder="e.g. images/reviewer_sarah.jpg" />
            </div>
            <div class="col-12 col-md-5">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Upload Avatar (optional)</label>
              <input type="file" class="form-control" name="avatar_files[{{ $i }}]" accept="image/*" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Review Text</label>
              <textarea class="form-control" name="content[items][{{ $i }}][text]" rows="3" style="font-size: 0.85rem;">{{ $item['text'] ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Add Testimony Button -->
    <div class="mb-4">
      <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center gap-2" onclick="addTestimony()">
        <i class="bi bi-plus-circle"></i>
        <span>Add New Testimony</span>
      </button>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
        <i class="bi bi-save"></i>
        <span>Save All Testimonies</span>
      </button>
    </div>

  </form>

</div>
@endsection

@push('scripts')
<script>
  let testimonyIndex = {{ count($items) }};

  function addTestimony() {
    const container = document.getElementById('testimonies-container');
    const i = testimonyIndex++;
    const html = `
      <div class="card mb-3 testimony-card" data-index="${i}">
        <div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center" style="border-color: var(--admin-border) !important;">
          <h6 class="card-title fw-bold mb-0" style="color: var(--admin-text); font-size: 0.95rem;">
            <i class="bi bi-chat-quote me-2" style="color: var(--admin-gold);"></i>New Testimony
          </h6>
          <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeTestimony(this)" title="Remove">
            <i class="bi bi-trash"></i>
          </button>
        </div>
        <div class="card-body p-3">
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Author Name</label>
              <input type="text" class="form-control" name="content[items][${i}][author]" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Origin / Country</label>
              <input type="text" class="form-control" name="content[items][${i}][origin]" placeholder="e.g. Sydney, Australia 🇦🇺" />
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Product Purchased</label>
              <input type="text" class="form-control" name="content[items][${i}][product]" />
            </div>
            <div class="col-12 col-md-3">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Star Rating</label>
              <select class="form-select" name="content[items][${i}][stars]">
                <option value="5" selected>5 ★</option>
                <option value="4">4 ★</option>
                <option value="3">3 ★</option>
                <option value="2">2 ★</option>
                <option value="1">1 ★</option>
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Avatar Image Path</label>
              <input type="text" class="form-control" name="content[items][${i}][avatar]" placeholder="e.g. images/reviewer_sarah.jpg" />
            </div>
            <div class="col-12 col-md-5">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Upload Avatar (optional)</label>
              <input type="file" class="form-control" name="avatar_files[${i}]" accept="image/*" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" style="font-size: 0.82rem;">Review Text</label>
              <textarea class="form-control" name="content[items][${i}][text]" rows="3" style="font-size: 0.85rem;"></textarea>
            </div>
          </div>
        </div>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
  }

  function removeTestimony(btn) {
    const card = btn.closest('.testimony-card');
    if (card) card.remove();
  }
</script>
@endpush
