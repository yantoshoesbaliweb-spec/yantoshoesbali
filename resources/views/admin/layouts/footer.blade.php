<footer class="admin-footer py-3 px-3 px-lg-4 border-top" style="border-color: var(--admin-border) !important; background: var(--admin-surface);">
  <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between gap-2" style="font-size: 0.82rem; color: var(--admin-muted);">
    <div class="d-flex flex-wrap align-items-center gap-2 text-center text-md-start">
      <span>&copy; {{ date('Y') }} <strong style="color: var(--admin-text);">Yanto Shoes Bali</strong></span>
      <span class="text-muted">&bull;</span>
      <span>Managed by <strong style="color: var(--admin-text);">Joshua Nugraha</strong></span>
    </div>

    <!-- Live Time & Date in Footer -->
    <div class="d-flex align-items-center gap-2" style="font-size: 0.8rem;">
      <i class="bi bi-clock text-warning"></i>
      <span id="liveDayDateText">{{ now()->locale('en')->translatedFormat('l, F d, Y') }}</span>
      <span class="text-muted">&bull;</span>
      <span id="liveClockDisplay" class="font-monospace fw-semibold" style="color: var(--admin-text);">{{ now()->format('H:i:s') }}</span>
      <span class="badge bg-warning text-dark px-1.5 py-0.5" style="font-size: 0.65rem; font-weight: 700;">WITA</span>
    </div>
  </div>
</footer>

@push('scripts')
<script>
  (function() {
    function initFooterClock() {
      const clockEl = document.getElementById('liveClockDisplay');
      const dayDateEl = document.getElementById('liveDayDateText');
      if (!clockEl && !dayDateEl) return;

      const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
      ];

      function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        if (clockEl) {
          clockEl.textContent = `${hours}:${minutes}:${seconds}`;
        }

        if (dayDateEl) {
          const dayName = dayNames[now.getDay()];
          const dayNum = String(now.getDate()).padStart(2, '0');
          const monthName = monthNames[now.getMonth()];
          const year = now.getFullYear();
          dayDateEl.textContent = `${dayName}, ${monthName} ${dayNum}, ${year}`;
        }
      }

      updateClock();
      setInterval(updateClock, 1000);
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initFooterClock);
    } else {
      initFooterClock();
    }
  })();
</script>
@endpush

