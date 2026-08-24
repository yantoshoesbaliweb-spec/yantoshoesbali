/* ============================================================
   YANTO SHOES BALI — JavaScript
   ============================================================ */

(function () {
  'use strict';

  /* ---- Announcement Bar Rotator ---- */
  const annMsgs = document.querySelectorAll('.ann-msg');
  const annPrev = document.getElementById('ann-prev');
  const annNext = document.getElementById('ann-next');
  let annIdx = 0;
  let annTimer;

  function showAnn(idx) {
    annMsgs.forEach(m => m.classList.remove('active'));
    annMsgs[idx].classList.add('active');
  }

  function nextAnn() {
    annIdx = (annIdx + 1) % annMsgs.length;
    showAnn(annIdx);
  }

  function prevAnn() {
    annIdx = (annIdx - 1 + annMsgs.length) % annMsgs.length;
    showAnn(annIdx);
  }

  function startAnnTimer() {
    annTimer = setInterval(nextAnn, 4000);
  }

  if (annNext && annPrev) {
    annNext.addEventListener('click', () => { clearInterval(annTimer); nextAnn(); startAnnTimer(); });
    annPrev.addEventListener('click', () => { clearInterval(annTimer); prevAnn(); startAnnTimer(); });
    startAnnTimer();
  }

  /* ---- Navbar Scroll Behavior ---- */
  const navbar = document.getElementById('navbar');
  const annBar = document.getElementById('announcement-bar');

  function updateNavbar() {
    if (window.scrollY > 60) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', updateNavbar, { passive: true });
  updateNavbar();

  /* ---- Mobile Nav Toggle ---- */
  const hamburger = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobile-nav');

  if (hamburger && mobileNav) {
    hamburger.addEventListener('click', () => {
      mobileNav.classList.toggle('open');
      const spans = hamburger.querySelectorAll('span');
      if (mobileNav.classList.contains('open')) {
        spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        spans[1].style.opacity = '0';
        spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
      } else {
        spans[0].style.transform = '';
        spans[1].style.opacity = '';
        spans[2].style.transform = '';
      }
    });

    // Close mobile nav on link click
    mobileNav.querySelectorAll('.mobile-nav-link').forEach(link => {
      link.addEventListener('click', () => {
        mobileNav.classList.remove('open');
        const spans = hamburger.querySelectorAll('span');
        spans[0].style.transform = '';
        spans[1].style.opacity = '';
        spans[2].style.transform = '';
      });
    });
  }

  /* ---- Hero Slider ---- */
  const slides = document.querySelectorAll('.hero-slide');
  const dots = document.querySelectorAll('.hero-dot');
  let currentSlide = 0;
  let slideTimer;

  function goToSlide(idx) {
    slides[currentSlide].classList.remove('active');
    dots[currentSlide].classList.remove('active');
    currentSlide = idx;
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');

    // Re-trigger hero animations
    const content = slides[currentSlide].querySelector('.hero-content');
    if (content) {
      content.querySelectorAll('.hero-eyebrow, .hero-title, .hero-subtitle, .hero-actions').forEach(el => {
        el.style.animation = 'none';
        el.offsetHeight; // trigger reflow
        el.style.animation = '';
      });
    }
  }

  function nextSlide() {
    goToSlide((currentSlide + 1) % slides.length);
  }

  function startSlideTimer() {
    slideTimer = setInterval(nextSlide, 6000);
  }

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      clearInterval(slideTimer);
      goToSlide(i);
      startSlideTimer();
    });
  });

  if (slides.length > 0) {
    startSlideTimer();
  }

  /* ---- Scroll Reveal ---- */
  const revealEls = document.querySelectorAll(
    '.product-card, .store-card, .stat, .about-content, .about-image, ' +
    '.custom-content, .section-header, .ig-tile, .footer-col, .footer-brand'
  );

  revealEls.forEach((el, i) => {
    el.classList.add('reveal');
    // Stagger for grid items
    const parent = el.parentElement;
    const siblings = Array.from(parent.children);
    const idx = siblings.indexOf(el);
    if (idx <= 3) {
      el.classList.add(`reveal-delay-${idx}`);
    }
  });

  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

  /* ---- WhatsApp Float Visibility ---- */
  const waFloat = document.getElementById('wa-float');
  let lastScrollY = window.scrollY;

  function updateWaFloat() {
    const scrollY = window.scrollY;
    if (scrollY > 300) {
      waFloat.style.opacity = '1';
      waFloat.style.pointerEvents = 'auto';
    } else {
      waFloat.style.opacity = '0';
      waFloat.style.pointerEvents = 'none';
    }
    lastScrollY = scrollY;
  }

  if (waFloat) {
    waFloat.style.opacity = '0';
    waFloat.style.transition = 'opacity 0.3s, transform 0.3s, box-shadow 0.3s';
    window.addEventListener('scroll', updateWaFloat, { passive: true });
  }

  /* ---- Smooth anchor links ---- */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 112; // navbar + ann bar height
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ---- Marquee duplication for seamless loop ---- */
  const stripContent = document.querySelector('.strip-content');
  if (stripContent) {
    const clone = stripContent.cloneNode(true);
    stripContent.parentElement.appendChild(clone);
  }

  /* ---- Parallax on hero ---- */
  const heroBgs = document.querySelectorAll('.hero-bg');
  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    if (scrollY < window.innerHeight) {
      heroBgs.forEach(bg => {
        bg.style.transform = `translateY(${scrollY * 0.25}px) scale(1)`;
      });
    }
  }, { passive: true });

  /* ---- Catalog Filter & Search ---- */
  const filterTabs = document.querySelectorAll('.filter-tab');
  const catalogCards = document.querySelectorAll('.catalog-card');
  const searchInput = document.getElementById('catalog-search-input');

  function filterCatalog() {
    const activeTab = document.querySelector('.filter-tab.active');
    const selectedCategory = activeTab ? activeTab.getAttribute('data-filter') : 'all';
    const query = searchInput ? searchInput.value.toLowerCase().trim() : '';

    catalogCards.forEach(card => {
      const category = card.getAttribute('data-category');
      const name = (card.getAttribute('data-name') || '').toLowerCase();
      const text = card.textContent.toLowerCase();

      const matchCategory = selectedCategory === 'all' || category === selectedCategory;
      const matchSearch = query === '' || name.includes(query) || text.includes(query);

      if (matchCategory && matchSearch) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  if (filterTabs.length > 0) {
    filterTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        filterCatalog();
      });
    });

    if (searchInput) {
      searchInput.addEventListener('input', filterCatalog);
    }

    // Check URL parameters for ?category=...
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');
    if (categoryParam) {
      const targetTab = document.querySelector(`.filter-tab[data-filter="${categoryParam}"]`);
      if (targetTab) {
        filterTabs.forEach(t => t.classList.remove('active'));
        targetTab.classList.add('active');
        filterCatalog();
      }
    }
  }

})();

