@extends('layouts.visitor')

@section('title', 'Boot Catalog - Yanto Shoes Bali | Handcrafted Genuine Leather Boots')
@section('meta_description', 'Browse our complete catalog of handcrafted genuine leather cowboy boots, ankle boots, and bespoke footwear made in Bali. Order online or visit our Bali stores.')

@section('content')

  <!-- Announcement Bar -->
  <div class="announcement-bar" id="announcement-bar">
    <button class="ann-prev" id="ann-prev" aria-label="Previous">&#8249;</button>
    <div class="ann-messages">
      <span class="ann-msg active">FREE SIZING CONSULTATION &#x2022; CUSTOM MADE IN 7 DAYS</span>
      <span class="ann-msg">WORLDWIDE EXPRESS SHIPPING ON ALL CATALOG ORDERS</span>
      <span class="ann-msg">VISIT OUR BALI STORES: LEGIAN &bull; CANGGU &bull; ULUWATU</span>
    </div>
    <button class="ann-next" id="ann-next" aria-label="Next">&#8250;</button>
  </div>

  <!-- Navigation -->
  <nav class="navbar scrolled" id="navbar">
    <a href="{{ route('visitor.home') }}" class="nav-logo">
      <img src="{{ asset('images/yanto-logo.png') }}" alt="Yanto Shoes Bali Logo" class="logo-img" />
      <span class="logo-text">YANTO SHOES BALI</span>
    </a>

    <div class="nav-links">
      <a href="{{ route('visitor.home') }}" class="nav-link">Home</a>
      <a href="{{ route('visitor.home') }}#about" class="nav-link">Our Story</a>
      <a href="{{ route('visitor.catalog') }}" class="nav-link active">Catalog</a>
      <a href="{{ route('visitor.home') }}#custom" class="nav-link">Custom Order</a>
      <a href="{{ route('visitor.home') }}#stores" class="nav-link">Stores</a>
      <a href="{{ route('visitor.home') }}#testimonials" class="nav-link">Reviews</a>
    </div>

    <div class="nav-right">
      <a href="https://facebook.com/yantoshoesbali" target="_blank" class="nav-icon" aria-label="Facebook">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
      </a>
      <a href="https://www.instagram.com/yantoshoes_bali/" target="_blank" class="nav-icon" aria-label="Instagram">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
      </a>
      <a href="https://www.tiktok.com/@yantoshoesbali" target="_blank" class="nav-icon" aria-label="TikTok">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
      </a>
      <a href="https://wa.me/6281353055475" target="_blank" class="nav-icon" aria-label="WhatsApp">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
      </a>
    </div>

    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </nav>

  <!-- Mobile Nav -->
  <div class="mobile-nav" id="mobile-nav">
    <a href="{{ route('visitor.home') }}" class="mobile-nav-link">Home</a>
    <a href="{{ route('visitor.home') }}#about" class="mobile-nav-link">Our Story</a>
    <a href="{{ route('visitor.catalog') }}" class="mobile-nav-link active">Catalog</a>
    <a href="{{ route('visitor.home') }}#custom" class="mobile-nav-link">Custom Order</a>
    <a href="{{ route('visitor.home') }}#stores" class="mobile-nav-link">Stores &amp; Maps</a>
    <a href="{{ route('visitor.home') }}#testimonials" class="mobile-nav-link">Testimonials</a>
    <div class="mobile-nav-socials">
      <a href="https://facebook.com/yantoshoesbali" target="_blank">Facebook</a>
      <a href="https://www.instagram.com/yantoshoes_bali/" target="_blank">Instagram</a>
      <a href="https://www.tiktok.com/@yantoshoesbali" target="_blank">TikTok</a>
      <a href="https://wa.me/6281353055475" target="_blank">WhatsApp</a>
    </div>
  </div>

  <!-- Catalog Hero Header -->
  <header class="catalog-hero-header">
    <div class="catalog-hero-bg">
      <img src="{{ asset('images/hero_boots.png') }}" alt="Yanto Shoes Bali Catalog" />
      <div class="catalog-hero-overlay"></div>
    </div>
    <div class="container catalog-hero-content">
      <div class="catalog-breadcrumb">
        <a href="{{ route('visitor.home') }}">Home</a>
        <span>/</span>
        <span class="current">Boot Catalog</span>
      </div>
      <p class="section-eyebrow">Handcrafted Leather Footwear</p>
      <h1 class="catalog-page-title">The Complete Boot <em>Catalog</em></h1>
      <p class="catalog-page-subtitle">
        Every pair is individually handcrafted in Bali from 100% genuine full-grain leather. Choose from our curated catalog designs or request bespoke customizations.
      </p>
      <div class="catalog-hero-badges">
        <span class="badge-pill">&#x2713; 100% Genuine Leather</span>
        <span class="badge-pill">&#x2713; Custom Sizing (EU 35 – 46)</span>
        <span class="badge-pill">&#x2713; 7-Day Turnaround</span>
        <span class="badge-pill">&#x2713; Worldwide Shipping</span>
      </div>
    </div>
  </header>

  <!-- Catalog Main Content -->
  <main class="catalog-main-section">
    <div class="container">

      <!-- Interactive Filter Bar -->
      <div class="catalog-toolbar">
        <div class="catalog-filter-tabs" id="catalog-filter-tabs">
          <button class="filter-tab active" data-filter="all">All Styles <span class="tab-count">(12)</span></button>
          <button class="filter-tab" data-filter="classic">Classic Series <span class="tab-count">(3)</span></button>
          <button class="filter-tab" data-filter="premium">Premium Series <span class="tab-count">(3)</span></button>
          <button class="filter-tab" data-filter="bohemian">Bohemian Series <span class="tab-count">(3)</span></button>
          <button class="filter-tab" data-filter="bold">Bold Series <span class="tab-count">(3)</span></button>
        </div>

        <div class="catalog-search-wrap">
          <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input type="text" id="catalog-search-input" class="catalog-search-input" placeholder="Search by model, leather, or style..." />
        </div>
      </div>

      <!-- Products Grid (12 Items) -->
      <div class="catalog-products-grid" id="catalog-grid">

        <!-- 1. Classic Tan -->
        <div class="catalog-card" data-category="classic" data-name="Classic Tan Cowboy Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_tan.png') }}" alt="Classic Tan Cowboy Boots" loading="lazy" />
            <span class="card-badge bestseller">Bestseller</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Classic%20Tan%20Cowboy%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Classic Series</span>
            <h3 class="catalog-boot-name">Classic Tan Cowboy Boots</h3>
            <p class="catalog-boot-specs">Genuine Tan Cowhide &bull; Traditional Western Stitching &bull; 4.5cm Cuban Heel</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Made to Order / In Stock</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Classic%20Tan%20Cowboy%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 2. Midnight Black -->
        <div class="catalog-card" data-category="premium" data-name="Midnight Black Cowboy Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_black.png') }}" alt="Midnight Black Cowboy Boots" loading="lazy" />
            <span class="card-badge popular">Popular</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Midnight%20Black%20Cowboy%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Premium Series</span>
            <h3 class="catalog-boot-name">Midnight Black Cowboy Boots</h3>
            <p class="catalog-boot-specs">Full-Grain Leather &bull; Silver Buckle Accent &bull; Goodyear Welted Sole</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Made to Order / In Stock</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Midnight%20Black%20Cowboy%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 3. Ivory Dream -->
        <div class="catalog-card" data-category="bohemian" data-name="Ivory Dream Floral Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_cream.png') }}" alt="Ivory Dream Floral Boots" loading="lazy" />
            <span class="card-badge new">New Edition</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Ivory%20Dream%20Floral%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Bohemian Series</span>
            <h3 class="catalog-boot-name">Ivory Dream Floral Boots</h3>
            <p class="catalog-boot-specs">Ultra-Soft Ivory Cowhide &bull; Embroidered Floral Motif &bull; Pointed Toe</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Made to Order / In Stock</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Ivory%20Dream%20Floral%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 4. Scarlet Flame -->
        <div class="catalog-card" data-category="bold" data-name="Scarlet Flame Cowboy Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_red.png') }}" alt="Scarlet Flame Cowboy Boots" loading="lazy" />
            <span class="card-badge bold">Signature</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Scarlet%20Flame%20Cowboy%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Bold Series</span>
            <h3 class="catalog-boot-name">Scarlet Flame Cowboy Boots</h3>
            <p class="catalog-boot-specs">Crimson Burnished Leather &bull; Signature Flame Inlay &bull; Leather Heel</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Made to Order / In Stock</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Scarlet%20Flame%20Cowboy%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 5. Vintage Havana -->
        <div class="catalog-card" data-category="classic" data-name="Vintage Havana Brown Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/hero_boots.png') }}" alt="Vintage Havana Brown Boots" loading="lazy" />
            <span class="card-badge">Classic</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Vintage%20Havana%20Brown%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Classic Series</span>
            <h3 class="catalog-boot-name">Vintage Havana Brown Boots</h3>
            <p class="catalog-boot-specs">Distressed Havana Leather &bull; Double Pull Straps &bull; Ergonomic Insole</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Vintage%20Havana%20Brown%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 6. Obsidian Night Rider -->
        <div class="catalog-card" data-category="premium" data-name="Obsidian Night Rider Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/collection.png') }}" alt="Obsidian Night Rider Boots" loading="lazy" />
            <span class="card-badge">Premium</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Obsidian%20Night%20Rider%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Premium Series</span>
            <h3 class="catalog-boot-name">Obsidian Night Rider Boots</h3>
            <p class="catalog-boot-specs">Matte Calfskin Leather &bull; Reinforced Heel Counter &bull; Sleek Black Welt</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Obsidian%20Night%20Rider%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 7. Desert Sand Suede -->
        <div class="catalog-card" data-category="bohemian" data-name="Desert Sand Suede Western">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_cream.png') }}" alt="Desert Sand Suede Western" loading="lazy" />
            <span class="card-badge">Bohemian</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Desert%20Sand%20Suede%20Western" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Bohemian Series</span>
            <h3 class="catalog-boot-name">Desert Sand Suede Western</h3>
            <p class="catalog-boot-specs">Velvety Suede Leather &bull; Feather Cut Inlay &bull; Comfort Cushioned Footbed</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Desert%20Sand%20Suede%20Western" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 8. Royal Cognac Heritage -->
        <div class="catalog-card" data-category="bold" data-name="Royal Cognac Heritage Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_tan.png') }}" alt="Royal Cognac Heritage Boots" loading="lazy" />
            <span class="card-badge">Bold Edition</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Royal%20Cognac%20Heritage%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Bold Series</span>
            <h3 class="catalog-boot-name">Royal Cognac Heritage Boots</h3>
            <p class="catalog-boot-specs">Antique Cognac Cowhide &bull; Hand-Burnished Patina &bull; Wingtip Toe Detailing</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Royal%20Cognac%20Heritage%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 9. Dusty Rose Boho -->
        <div class="catalog-card" data-category="bohemian" data-name="Dusty Rose Boho Western">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_red.png') }}" alt="Dusty Rose Boho Western" loading="lazy" />
            <span class="card-badge">Bohemian</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Dusty%20Rose%20Boho%20Western" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Bohemian Series</span>
            <h3 class="catalog-boot-name">Dusty Rose Boho Western</h3>
            <p class="catalog-boot-specs">Hand-Dyed Rose Leather &bull; Contrast Ivory Stitch &bull; Mid-Calf Silhouette</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Dusty%20Rose%20Boho%20Western" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 10. Rustic Chestnut -->
        <div class="catalog-card" data-category="classic" data-name="Rustic Chestnut Work Western">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_tan.png') }}" alt="Rustic Chestnut Work Western" loading="lazy" />
            <span class="card-badge">Classic</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Rustic%20Chestnut%20Work%20Western" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Classic Series</span>
            <h3 class="catalog-boot-name">Rustic Chestnut Work Western</h3>
            <p class="catalog-boot-specs">Oiled Pull-Up Leather &bull; Weatherproof Treatment &bull; Sturdy Rubber Lug Sole</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Rustic%20Chestnut%20Work%20Western" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 11. Viper Ember -->
        <div class="catalog-card" data-category="bold" data-name="Viper Ember Textured Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/product_black.png') }}" alt="Viper Ember Textured Boots" loading="lazy" />
            <span class="card-badge bold">Limited</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Viper%20Ember%20Textured%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Bold Series</span>
            <h3 class="catalog-boot-name">Viper Ember Textured Boots</h3>
            <p class="catalog-boot-specs">Embossed Texture Cowhide &bull; Snip Toe Silhouette &bull; Antiqued Brass Rivets</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Viper%20Ember%20Textured%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

        <!-- 12. Platinum Eclipse -->
        <div class="catalog-card" data-category="premium" data-name="Platinum Eclipse Dress Boots">
          <div class="catalog-card-media">
            <img src="{{ asset('images/craftsmanship.png') }}" alt="Platinum Eclipse Dress Boots" loading="lazy" />
            <span class="card-badge">Premium</span>
            <div class="catalog-card-hover">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20the%20Platinum%20Eclipse%20Dress%20Boots" target="_blank" class="btn-card-order">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Order via WhatsApp
              </a>
            </div>
          </div>
          <div class="catalog-card-body">
            <span class="catalog-series-tag">Premium Series</span>
            <h3 class="catalog-boot-name">Platinum Eclipse Dress Boots</h3>
            <p class="catalog-boot-specs">Hand-Polished Black Calfskin &bull; Tonal Minimalist Stitch &bull; Beveled Leather Waist</p>
            <div class="catalog-card-footer">
              <span class="boot-availability">Custom Made in 7 Days</span>
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20inquire%20price%20for%20Platinum%20Eclipse%20Dress%20Boots" target="_blank" class="catalog-inquire-link">Inquire &rarr;</a>
            </div>
          </div>
        </div>

      </div>

      <!-- Custom Banner in Catalog -->
      <div class="catalog-custom-banner">
        <div class="custom-banner-content">
          <p class="section-eyebrow">Have a Custom Idea in Mind?</p>
          <h2 class="custom-banner-title">Bring Your Own Design <em>to Life</em></h2>
          <p class="custom-banner-desc">
            Send us a reference photo, sketch, or color idea via WhatsApp. We will help you select the exact leather and craft your personalized pair in 7 days.
          </p>
          <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20have%20a%20custom%20boot%20design%20I%20would%20like%20to%20discuss" target="_blank" class="btn btn-primary">
            Chat with Master Artisan
          </a>
        </div>
      </div>

      <!-- FAQ Section -->
      <div class="catalog-faq-section">
        <div class="section-header">
          <p class="section-eyebrow">Frequently Asked Questions</p>
          <h2 class="section-title">Ordering &amp; Sizing Guide</h2>
        </div>

        <div class="faq-grid">
          <div class="faq-item">
            <h4 class="faq-question">How does custom ordering work?</h4>
            <p class="faq-answer">Simply send us a message on WhatsApp with your preferred design from our catalog or your custom reference photos. We will guide you through taking your foot measurements, choose leather colors and heel types, and craft your pair in 7 days.</p>
          </div>
          <div class="faq-item">
            <h4 class="faq-question">What sizes do you offer?</h4>
            <p class="faq-answer">We offer all standard international shoe sizes from EU 35 to EU 46 (US Women 5-11, US Men 6-13), as well as custom bespoke sizing for wide feet, high insteps, or tailored calf widths.</p>
          </div>
          <div class="faq-item">
            <h4 class="faq-question">Do you ship worldwide?</h4>
            <p class="faq-answer">Yes! We regularly ship worldwide to Australia, the United States, the UK, Europe, and Asia using trusted express couriers (DHL / FedEx) with full tracking provided.</p>
          </div>
          <div class="faq-item">
            <h4 class="faq-question">Can I visit and try on boots in Bali?</h4>
            <p class="faq-answer">Absolutely. We have three stores in Legian, Canggu, and Uluwatu open daily from 10:00 AM to 6:00 PM with hundreds of ready-to-wear boots in stock.</p>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="footer-logo">
            <img src="{{ asset('images/yanto-logo.png') }}" alt="Yanto Shoes Bali Logo" class="footer-logo-img" />
            <span>YANTO SHOES BALI</span>
          </div>
          <p class="footer-tagline">Handcrafted Genuine Leather Cowboy Boots.<br/>Made with Pride in Bali, Indonesia Since 1990.</p>
          <div class="footer-socials">
            <a href="https://facebook.com/yantoshoesbali" target="_blank" class="social-link" aria-label="Facebook">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <a href="https://www.instagram.com/yantoshoes_bali/" target="_blank" class="social-link" aria-label="Instagram">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="https://www.tiktok.com/@yantoshoesbali" target="_blank" class="social-link" aria-label="TikTok">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
            </a>
            <a href="https://wa.me/6281353055475" target="_blank" class="social-link" aria-label="WhatsApp">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
            </a>
          </div>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Catalog &amp; Series</h4>
          <ul>
            <li><a href="{{ route('visitor.catalog') }}?category=all">All Boots Catalog</a></li>
            <li><a href="{{ route('visitor.catalog') }}?category=classic">Classic Series</a></li>
            <li><a href="{{ route('visitor.catalog') }}?category=premium">Premium Series</a></li>
            <li><a href="{{ route('visitor.catalog') }}?category=bohemian">Bohemian Series</a></li>
            <li><a href="{{ route('visitor.catalog') }}?category=bold">Bold Series</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Quick Links</h4>
          <ul>
            <li><a href="{{ route('visitor.home') }}#about">Our Heritage</a></li>
            <li><a href="{{ route('visitor.home') }}#custom">Custom Order Process</a></li>
            <li><a href="{{ route('visitor.home') }}#stores">Bali Store Maps</a></li>
            <li><a href="{{ route('visitor.home') }}#testimonials">Customer Reviews</a></li>
            <li><a href="https://facebook.com/yantoshoesbali" target="_blank">Facebook Page</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Contact &amp; Stores</h4>
          <ul>
            <li><a href="https://wa.me/6281353055475">+62 813 5305 5475</a></li>
            <li><a href="https://www.instagram.com/yantoshoes_bali/" target="_blank">@yantoshoes_bali</a></li>
            <li><span>Legian &#x2022; Canggu &#x2022; Uluwatu</span></li>
            <li><span>Open Daily: 10:00 AM – 6:00 PM</span></li>
            <li><span>Worldwide Express Delivery</span></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Yanto Shoes Bali. All rights reserved.</p>
        <p>Handcrafted Genuine Leather Footwear &bull; Bali, Indonesia</p>
      </div>
    </div>
  </footer>

@endsection
