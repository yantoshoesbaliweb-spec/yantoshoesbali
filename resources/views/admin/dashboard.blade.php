@extends('admin.layouts.app')

@section('title', 'Dashboard - Yanto Shoes Bali Admin')

@section('content')
<div class="container-fluid px-0">
  
  <!-- Page Header Breadcrumb & Preview Button -->
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1" style="font-size: 0.8rem;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--admin-gold, #dba24c);">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--admin-muted);">Dashboard</li>
        </ol>
      </nav>
      <h1 class="h4 fw-bold mb-0" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.6rem;">
        Dashboard Ringkasan
      </h1>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('visitor.home') }}" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-color: var(--admin-border); color: var(--admin-text); border-radius: 6px;">
        <i class="bi bi-globe"></i>
        <span>Buka Website Pengunjung</span>
      </a>
      <a href="{{ route('admin.products.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="font-size: 0.85rem; border-radius: 6px;">
        <i class="bi bi-plus-lg"></i>
        <span>Tambah Produk</span>
      </a>
    </div>
  </div>

  <!-- Hero Banner: Hari, Tanggal, & Live Waktu -->
  <div class="card border mb-4 shadow-sm" style="border-color: var(--admin-border) !important; background: linear-gradient(135deg, var(--admin-surface) 0%, var(--admin-surface-soft, #fcf9f5) 100%); border-radius: 12px;">
    <div class="card-body p-3 p-md-4">
      <div class="row align-items-center g-3">
        
        <!-- Welcome Greeting -->
        <div class="col-12 col-lg-7">
          <div class="d-inline-flex align-items-center gap-2 px-2 py-1 rounded mb-2" style="background: rgba(219, 162, 76, 0.12); color: var(--admin-gold, #dba24c); font-size: 0.75rem; font-weight: 600;">
            <i class="bi bi-shield-check"></i>
            <span>YANTO SHOES BALI &bull; ADMIN PANEL</span>
          </div>
          <h2 class="h3 fw-bold mb-1" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.85rem;">
            Selamat Datang, {{ Auth::user()->name ?? 'Administrator' }}
          </h2>
          <p class="text-muted mb-0" style="font-size: 0.86rem; line-height: 1.45;">
            Pantau performa kunjungan toko, analitik lalu lintas, dan katalog produk buatan tangan Bali Anda secara real-time.
          </p>
        </div>

        <!-- Live Clock & Date Box -->
        <div class="col-12 col-lg-5">
          <div class="p-3 rounded text-white text-lg-end" style="background: var(--admin-primary, #391802); border-radius: 10px; box-shadow: 0 4px 15px rgba(57, 24, 2, 0.12);">
            
            <!-- Hari & Tanggal -->
            <div class="d-flex align-items-center justify-content-lg-end gap-2 mb-1" style="font-size: 0.85rem; color: var(--admin-gold, #dba24c); font-weight: 500;">
              <i class="bi bi-calendar2-week"></i>
              <span id="liveDayDateText">{{ $dayName }}, {{ $dateFormatted }}</span>
            </div>

            <!-- Jam / Waktu Live -->
            <div class="d-flex align-items-baseline justify-content-lg-end gap-2">
              <span id="liveClockDisplay" class="font-monospace fw-bold" style="font-size: 1.75rem; letter-spacing: 0.05em; color: #ffffff;">
                {{ $timeFormatted }}
              </span>
              <span class="badge bg-warning text-dark px-2 py-1" style="font-size: 0.68rem; font-weight: 600; letter-spacing: 0.05em;">
                WITA
              </span>
            </div>

            <div class="text-white-50 mt-1" style="font-size: 0.72rem;">
              <i class="bi bi-geo-alt me-1"></i>Waktu Lokal Bali (Indonesia Tengah &bull; UTC+8)
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Key Metrics Row: Kunjungan Hari Ini, Minggu Ini, Bulan Ini, & Total Produk -->
  <div class="row g-3 mb-4">
    
    <!-- 1. Kunjungan Hari Ini -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Kunjungan Hari Ini
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(219, 162, 76, 0.12); color: var(--admin-gold, #dba24c); font-size: 1.25rem;">
            <i class="bi bi-eye"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1;">
          {{ number_format($visitorMetrics['today']) }}
        </div>
        <div class="d-flex align-items-center gap-1 mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge bg-success-subtle text-success py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
            <i class="bi bi-check-circle me-1"></i>Hari Ini
          </span>
          <span class="text-truncate">Trafik {{ $dayName }}</span>
        </div>
      </div>
    </div>

    <!-- 2. Kunjungan Minggu Ini -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Kunjungan Minggu Ini
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(13, 110, 253, 0.12); color: #0d6efd; font-size: 1.25rem;">
            <i class="bi bi-calendar-week"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1;">
          {{ number_format($visitorMetrics['this_week']) }}
        </div>
        <div class="d-flex align-items-center gap-1 mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge bg-primary-subtle text-primary py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
            Minggu Ini
          </span>
          <span class="text-truncate">Senin &ndash; Minggu</span>
        </div>
      </div>
    </div>

    <!-- 3. Kunjungan Bulan Ini -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Kunjungan Bulan Ini
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(25, 135, 84, 0.12); color: #198754; font-size: 1.25rem;">
            <i class="bi bi-calendar3"></i>
          </div>
        </div>
        <div class="metric-value mb-1 fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1;">
          {{ number_format($visitorMetrics['this_month']) }}
        </div>
        <div class="d-flex align-items-center gap-1 mt-2" style="font-size: 0.75rem; color: var(--admin-muted);">
          <span class="badge bg-success-subtle text-success py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
            {{ $now->locale('id')->translatedFormat('F') }}
          </span>
          <span class="text-truncate">Tahun {{ $now->year }}</span>
        </div>
      </div>
    </div>

    <!-- 4. Total Product -->
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card h-100 p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="text-muted fw-semibold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            Total Produk
          </span>
          <div class="d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; border-radius: 8px; background: rgba(114, 57, 234, 0.12); color: #7239ea; font-size: 1.25rem;">
            <i class="bi bi-box-seam"></i>
          </div>
        </div>
        <div class="d-flex align-items-baseline gap-2 mb-1">
          <span class="metric-value fw-bold" style="font-size: 2.1rem; color: var(--admin-text); line-height: 1.1;">
            {{ $totalProducts }}
          </span>
          <span class="text-muted fw-normal" style="font-size: 0.95rem; font-family: 'Outfit', sans-serif;">
            Model Sepatu
          </span>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-2" style="font-size: 0.75rem;">
          <span class="badge bg-secondary-subtle text-secondary py-1 px-2" style="font-size: 0.7rem;">
            {{ $activeProducts }} Aktif
          </span>
          <a href="{{ route('admin.products') }}" class="text-decoration-none fw-medium" style="color: var(--admin-gold, #dba24c);">
            Katalog &rarr;
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- Bottom Section: Produk Terbaru & Shortcut Manajemen -->
  <div class="row g-4">
    
    <!-- Tabel Produk Terbaru -->
    <div class="col-12 col-lg-8">
      <div class="card p-3 p-md-4 border shadow-sm h-100" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h3 class="h5 fw-bold mb-1" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.35rem;">
              Koleksi Produk Terkini
            </h3>
            <small class="text-muted" style="font-size: 0.78rem;">Model sepatu boots yang terdaftar di katalog toko.</small>
          </div>
          <a href="{{ route('admin.products') }}" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1" style="font-size: 0.78rem; border-color: var(--admin-border);">
            <span>Kelola Semua</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
            <thead>
              <tr style="border-bottom: 1px solid var(--admin-border); color: var(--admin-muted); font-size: 0.76rem; text-transform: uppercase;">
                <th style="width: 60px;">Foto</th>
                <th>Nama Produk</th>
                <th>Kategori / Series</th>
                <th>Turnaround</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentProducts as $p)
              <tr>
                <td>
                  <img
                    src="{{ asset($p->primary_image ?? 'images/product_tan.png') }}"
                    alt="{{ $p->name }}"
                    onerror="this.onerror=null;this.src='{{ asset('images/product_tan.png') }}';"
                    style="width: 44px; height: 44px; object-fit: cover; border-radius: 6px; border: 1px solid var(--admin-border);"
                  />
                </td>
                <td>
                  <strong style="color: var(--admin-text); font-size: 0.88rem;">{{ $p->name }}</strong>
                </td>
                <td>
                  <span class="text-muted" style="font-size: 0.82rem;">
                    {{ $p->series ?? ($p->categoryRelation->name ?? '-') }}
                  </span>
                </td>
                <td>
                  <small class="text-muted">{{ $p->turnaround ?: '7 Days' }}</small>
                </td>
                <td>
                  <span class="badge {{ $p->status === 'Active' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}" style="font-size: 0.7rem;">
                    {{ $p->status }}
                  </span>
                </td>
                <td class="text-end">
                  <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-sm btn-outline-primary py-1 px-2" style="font-size: 0.75rem;" title="Edit Produk">
                    <i class="bi bi-pencil"></i>
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center py-4 text-muted" style="font-size: 0.85rem;">
                  Belum ada produk terdaftar. <a href="{{ route('admin.products.create') }}" style="color: var(--admin-gold);">Tambah sekarang &rarr;</a>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Shortcut Menu & Total Ringkasan -->
    <div class="col-12 col-lg-4">
      <div class="d-flex flex-column gap-3 h-100">
        
        <!-- Quick Actions Card -->
        <div class="card p-3 p-md-4 border shadow-sm" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
          <h3 class="h6 fw-bold mb-3" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.25rem;">
            Akses Cepat Pengaturan
          </h3>
          <div class="d-flex flex-column gap-2">
            
            <a href="{{ route('admin.products.create') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.83rem;">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle text-primary"></i>
                <span>Tambah Produk Baru</span>
              </div>
              <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
            </a>

            <a href="{{ route('admin.guides.shoe-toes') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.83rem;">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-bootstrap text-warning"></i>
                <span>Panduan Shoe Toe</span>
              </div>
              <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
            </a>

            <a href="{{ route('admin.guides.leathers') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.83rem;">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-palette text-success"></i>
                <span>Panduan Ragam Kulit</span>
              </div>
              <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
            </a>

            <a href="{{ route('admin.content.header') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.83rem;">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-sliders text-info"></i>
                <span>Hero Slider & Pengumuman</span>
              </div>
              <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
            </a>

            <a href="{{ route('admin.content.testimonies') }}" class="d-flex align-items-center justify-content-between p-2 rounded text-decoration-none border" style="border-color: var(--admin-border) !important; background: var(--admin-surface-soft); color: var(--admin-text); font-size: 0.83rem;">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-chat-quote text-secondary"></i>
                <span>Kelola Testimoni Pelanggan</span>
              </div>
              <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
            </a>

          </div>
        </div>

        <!-- Akumulasi Total Kunjungan Card -->
        <div class="card p-3 p-md-4 border shadow-sm flex-grow-1" style="border-color: var(--admin-border) !important; background: var(--admin-surface); border-radius: 10px;">
          <h3 class="h6 fw-bold mb-2" style="color: var(--admin-text); font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.15rem;">
            Akumulasi Kunjungan
          </h3>
          <p class="text-muted mb-3" style="font-size: 0.78rem;">
            Total keseluruhan rekaman pengunjung sejak peluncuran situs web.
          </p>

          <div class="d-flex align-items-baseline justify-content-between p-3 rounded" style="background: rgba(219, 162, 76, 0.08); border: 1px solid rgba(219, 162, 76, 0.2);">
            <div>
              <small class="text-muted d-block" style="font-size: 0.72rem; text-transform: uppercase;">Total Kunjungan</small>
              <strong style="color: var(--admin-brand, #391802); font-size: 1.6rem; font-family: 'Cormorant Garamond', serif;">
                {{ number_format($visitorMetrics['total']) }}
              </strong>
            </div>
            <span class="badge bg-warning text-dark px-2 py-1" style="font-size: 0.72rem;">
              All Time
            </span>
          </div>

          <div class="mt-3 text-muted" style="font-size: 0.74rem;">
            <i class="bi bi-info-circle me-1"></i> Data diperbarui otomatis setiap ada pengunjung yang membuka halaman utama atau katalog toko.
          </div>
        </div>

      </div>
    </div>

  </div>

</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const clockEl = document.getElementById('liveClockDisplay');
    const dayDateEl = document.getElementById('liveDayDateText');

    const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const monthNames = [
      'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
      'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    function updateLiveClock() {
      // Create date object in Asia/Makassar (WITA, UTC+8)
      const now = new Date();
      
      // Format time in WITA
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      
      if (clockEl) {
        clockEl.textContent = `${hours}:${minutes}:${seconds}`;
      }

      // Update date periodically
      if (dayDateEl) {
        const dayName = dayNames[now.getDay()];
        const dayNum = String(now.getDate()).padStart(2, '0');
        const monthName = monthNames[now.getMonth()];
        const year = now.getFullYear();
        dayDateEl.textContent = `${dayName}, ${dayNum} ${monthName} ${year}`;
      }
    }

    // Run immediately and every second
    updateLiveClock();
    setInterval(updateLiveClock, 1000);
  });
</script>
@endpush
