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

  <!-- WhatsApp Custom Boot Order Modal -->
  <div class="wa-order-overlay" id="waOrderOverlay" style="display:none;">
    <div class="wa-order-modal" id="waOrderModal">
      <button type="button" class="wa-modal-close" id="waModalClose" aria-label="Close">&times;</button>

      <h3 class="wa-modal-title">Custom Boot Order</h3>
      <p class="wa-modal-subtitle">Fill in the details below and send your order via WhatsApp.</p>

      <form id="waOrderForm" class="wa-modal-form" novalidate>
        <input type="hidden" id="waProductName" value="" />

        <!-- Section: Client Details -->
        <div class="wa-section-label">Client Details</div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waCustomerName">Client Name <span class="wa-req">*</span></label>
            <input type="text" id="waCustomerName" placeholder="Your full name" required autocomplete="name" />
          </div>
          <div class="wa-field">
            <label>Gender <span class="wa-req">*</span></label>
            <div class="wa-pills">
              <label class="wa-pill"><input type="radio" name="waGender" value="Men" checked /><span>Men</span></label>
              <label class="wa-pill"><input type="radio" name="waGender" value="Woman" /><span>Woman</span></label>
            </div>
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waCustomerCountry">Country / Region <span class="wa-req">*</span></label>
            <input type="text" id="waCustomerCountry" placeholder="e.g. Australia, USA, Indonesia" required autocomplete="country-name" />
          </div>
          <div class="wa-field">
            <label for="waCustomerPhone">Phone / WhatsApp <span class="wa-req">*</span></label>
            <input type="tel" id="waCustomerPhone" placeholder="+61 4xx xxx xxx" required autocomplete="tel" />
          </div>
        </div>

        <div class="wa-field">
          <label for="waCustomerAddress">Delivery Address / Bali Hotel</label>
          <input type="text" id="waCustomerAddress" placeholder="Street address, city, postal code / Hotel name" />
        </div>

        <!-- Section: Boot Specs -->
        <div class="wa-section-label">Boot Specifications</div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waBootModel">Boot Model</label>
            <input type="text" id="waBootModel" />
          </div>
          <div class="wa-field">
            <label for="waHighBoot">High Boot / Shaft Height</label>
            <input type="text" id="waHighBoot" />
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waSkinTypes">Skin Type</label>
            <input type="text" id="waSkinTypes" />
          </div>
          <div class="wa-field">
            <label for="waColorTypes">Color Type</label>
            <input type="text" id="waColorTypes" />
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waToeCap">Toe Cap</label>
            <input type="text" id="waToeCap"/>
          </div>
          <div class="wa-field">
            <label for="waStitches">Stitches</label>
            <input type="text" id="waStitches" />
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waAccessoriesColor">Accessories Color</label>
            <input type="text" id="waAccessoriesColor" />
          </div>
          <div class="wa-field">
            <label>Zipper</label>
            <div class="wa-pills">
              <label class="wa-pill"><input type="radio" name="waZipper" value="No" checked /><span>No </span></label>
              <label class="wa-pill"><input type="radio" name="waZipper" value="Yes" /><span>Yes</span></label>
            </div>
          </div>
        </div>

        <div class="wa-row">
          <div class="wa-field">
            <label for="waHeightHeels">Height Heels</label>
            <input type="text" id="waHeightHeels" />
          </div>
          <div class="wa-field">
            <label for="waColorSole">Color Sole</label>
            <input type="text" id="waColorSole" />
          </div>
        </div>

        <!-- Section: Size & Measurements -->
        <div class="wa-section-label">Size &amp; Measurements</div>

        <div class="wa-field">
          <label for="waFootSize">Foot Size <span class="wa-req">*</span></label>
          <input type="text" id="waFootSize" required />
        </div>

        <!-- Measurement Guide Images -->
        <div class="wa-guide-row">
          <div class="wa-guide-thumb" onclick="openLightbox('{{ asset('images/foot_size_guide.png') }}', 'Foot Size Guide')" title="Click to enlarge">
            <img src="{{ asset('images/foot_size_guide.png') }}" alt="Foot Size Guide" loading="lazy" />
            <span>Foot Size Guide 🔍</span>
          </div>
          <div class="wa-guide-thumb" onclick="openLightbox('{{ asset('images/leg_measure_guide.png') }}', 'Leg Measurement Guide')" title="Click to enlarge">
            <img src="{{ asset('images/leg_measure_guide.png') }}" alt="Leg Measurement Guide" loading="lazy" />
            <span>Leg Measurement 🔍</span>
          </div>
        </div>

        <p class="wa-measure-note">8 leg measurement points (optional — you can also discuss on WhatsApp)</p>

        <div class="wa-measure-grid">
          <div class="wa-m-item">
            <label for="waLegFloorToKnee"><span class="wa-num">1</span> Floor to mid-knee</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegFloorToKnee" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegUnderKnee"><span class="wa-num">2</span> Under Knee</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegUnderKnee" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegFullCalf"><span class="wa-num">3</span> Full Calf</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegFullCalf" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegCalfHeight"><span class="wa-num">4</span> Calf Height</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegCalfHeight" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegAroundTen"><span class="wa-num">5</span> 10&quot; from ground</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegAroundTen" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegAroundAnkle"><span class="wa-num">6</span> Ankle</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegAroundAnkle" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegHeelAmount"><span class="wa-num">7</span> Heel Amount</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegHeelAmount" placeholder="cm" /><span>CM</span></div>
          </div>
          <div class="wa-m-item">
            <label for="waLegInstep"><span class="wa-num">8</span> Instep</label>
            <div class="wa-cm-input"><input type="number" step="0.5" id="waLegInstep" placeholder="cm" /><span>CM</span></div>
          </div>
        </div>

        <div class="wa-field" style="margin-top:10px;">
          <label for="waNotes">Additional Notes (Optional)</label>
          <textarea id="waNotes" placeholder="e.g. Initials embroidered, Vibram sole, etc." rows="2"></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" class="wa-submit-btn" id="waSubmitBtn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Send Order via WhatsApp
        </button>
      </form>
    </div>
  </div>

  <!-- Image Lightbox -->
  <div class="wa-lightbox-overlay" id="waLightboxOverlay" style="display:none;" onclick="closeLightbox()">
    <div class="wa-lightbox-box" onclick="event.stopPropagation()">
      <button type="button" class="wa-lb-close" onclick="closeLightbox()" aria-label="Close">&times;</button>
      <img src="" alt="Guide" id="waLightboxImg" />
      <div class="wa-lb-caption" id="waLightboxCaption"></div>
    </div>
  </div>

  <style>
    /* ===== Simple WhatsApp Order Modal ===== */
    .wa-order-overlay {
      position: fixed; inset: 0; z-index: 9999;
      background: rgba(0,0,0,0.7);
      backdrop-filter: blur(6px);
      display: flex; align-items: center; justify-content: center;
      padding: 16px;
      animation: waFadeIn .2s ease;
    }
    @keyframes waFadeIn { from{opacity:0} to{opacity:1} }

    .wa-order-modal {
      background: #1a1209;
      border: 1px solid rgba(219,162,76,0.25);
      border-radius: 14px;
      padding: 28px 24px 24px;
      max-width: 580px; width: 100%;
      max-height: 90vh; overflow-y: auto;
      position: relative;
      box-shadow: 0 20px 50px rgba(0,0,0,0.6);
      animation: waSlideUp .25s ease;
      scrollbar-width: thin;
      scrollbar-color: #dba24c #1a1209;
    }
    @keyframes waSlideUp { from{transform:translateY(16px);opacity:0} to{transform:translateY(0);opacity:1} }

    .wa-order-modal::-webkit-scrollbar { width: 6px; }
    .wa-order-modal::-webkit-scrollbar-track { background: #1a1209; }
    .wa-order-modal::-webkit-scrollbar-thumb { background: #dba24c; border-radius: 3px; }

    .wa-modal-close {
      position: absolute; top: 12px; right: 14px;
      background: none; border: none;
      color: #a89478; font-size: 1.5rem;
      cursor: pointer; line-height: 1;
      transition: color .2s;
    }
    .wa-modal-close:hover { color: #fff; }

    .wa-modal-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.3rem; font-weight: 700;
      color: #f5ead6; margin: 0 0 4px;
    }
    .wa-modal-subtitle {
      font-size: 0.82rem; color: #a89478;
      margin: 0 0 20px; line-height: 1.4;
    }

    /* Section Labels */
    .wa-section-label {
      font-size: 0.72rem; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: #dba24c; margin: 20px 0 12px;
      padding-bottom: 6px;
      border-bottom: 1px solid rgba(219,162,76,0.18);
    }
    .wa-section-label:first-of-type { margin-top: 0; }

    /* Form Layout */
    .wa-modal-form { display: flex; flex-direction: column; }

    .wa-row {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 12px; margin-bottom: 10px;
    }
    .wa-field { display: flex; flex-direction: column; gap: 5px; margin-bottom: 10px; }

    .wa-field label {
      font-size: 0.78rem; font-weight: 600;
      color: #c4ab82; text-transform: uppercase;
      letter-spacing: 0.02em;
    }
    .wa-req { color: #e57373; }

    .wa-field input,
    .wa-field textarea {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(219,162,76,0.2);
      border-radius: 8px;
      padding: 10px 12px;
      color: #f5ead6; font-size: 0.88rem;
      font-family: inherit; outline: none;
      transition: border-color .2s;
    }
    .wa-field input:focus,
    .wa-field textarea:focus {
      border-color: #dba24c;
    }
    .wa-field input::placeholder,
    .wa-field textarea::placeholder {
      color: rgba(196,171,130,0.35);
    }
    .wa-field textarea { resize: vertical; }

    /* Radio Pills */
    .wa-pills { display: flex; gap: 6px; }
    .wa-pill {
      flex: 1; position: relative;
      cursor: pointer; margin: 0 !important;
    }
    .wa-pill input { position: absolute; opacity: 0; width: 0; height: 0; }
    .wa-pill span {
      display: block; text-align: center;
      padding: 9px 10px;
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(219,162,76,0.2);
      border-radius: 8px;
      color: #c4ab82; font-weight: 600;
      font-size: 0.84rem; transition: all .2s;
      user-select: none;
    }
    .wa-pill:hover span { border-color: #dba24c; }
    .wa-pill input:checked + span {
      background: #dba24c; border-color: #dba24c;
      color: #170f07; font-weight: 700;
    }

    /* Guide Thumbnails */
    .wa-guide-row {
      display: flex; gap: 12px;
      margin: 10px 0 14px;
    }
    .wa-guide-thumb {
      flex: 1; background: #fff;
      border-radius: 8px; padding: 6px;
      cursor: pointer;
      display: flex; flex-direction: column;
      align-items: center; gap: 4px;
      transition: transform .2s, box-shadow .2s;
    }
    .wa-guide-thumb:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 14px rgba(219,162,76,0.25);
    }
    .wa-guide-thumb img {
      width: 100%; height: 80px;
      object-fit: contain; display: block;
    }
    .wa-guide-thumb span {
      font-size: 0.65rem; font-weight: 700;
      color: #170f07; background: #dba24c;
      padding: 2px 6px; border-radius: 4px;
      text-transform: uppercase;
    }

    /* Measurement Note */
    .wa-measure-note {
      font-size: 0.75rem; color: #a89478;
      margin: 0 0 10px; line-height: 1.3;
    }

    /* Measurement Grid */
    .wa-measure-grid {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 8px;
    }
    .wa-m-item { display: flex; flex-direction: column; gap: 3px; }
    .wa-m-item label {
      font-size: 0.72rem; font-weight: 600;
      color: #c4ab82; display: flex;
      align-items: center; gap: 5px;
    }
    .wa-num {
      display: inline-flex; align-items: center;
      justify-content: center;
      width: 16px; height: 16px;
      background: rgba(219,162,76,0.2);
      color: #dba24c; border-radius: 50%;
      font-size: 0.65rem; font-weight: 700;
      flex-shrink: 0;
    }
    .wa-cm-input {
      position: relative; display: flex; align-items: center;
    }
    .wa-cm-input input {
      width: 100%;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(219,162,76,0.18);
      border-radius: 7px;
      padding: 7px 28px 7px 10px;
      color: #f5ead6; font-size: 0.82rem;
      outline: none; transition: border-color .2s;
    }
    .wa-cm-input input:focus { border-color: #dba24c; }
    .wa-cm-input span {
      position: absolute; right: 8px;
      font-size: 0.65rem; font-weight: 700;
      color: #dba24c; pointer-events: none;
    }

    /* Submit Button */
    .wa-submit-btn {
      display: flex; align-items: center;
      justify-content: center; gap: 8px;
      width: 100%; margin-top: 20px;
      padding: 13px 20px; border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, #25D366, #128C7E);
      color: #fff; font-size: 0.95rem;
      font-weight: 700; cursor: pointer;
      transition: transform .15s, box-shadow .2s;
      font-family: inherit;
    }
    .wa-submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37,211,102,0.35);
    }

    /* Lightbox */
    .wa-lightbox-overlay {
      position: fixed; inset: 0; z-index: 100000;
      background: rgba(0,0,0,0.88);
      display: flex; align-items: center; justify-content: center;
      padding: 20px; animation: waFadeIn .2s ease;
    }
    .wa-lightbox-box {
      position: relative; background: #1a1209;
      border: 1px solid rgba(219,162,76,0.3);
      border-radius: 12px; padding: 14px;
      max-width: 90vw; max-height: 90vh;
      display: flex; flex-direction: column;
      align-items: center;
    }
    .wa-lightbox-box img {
      max-width: 100%; max-height: 75vh;
      object-fit: contain; background: #fff;
      border-radius: 8px; padding: 8px;
    }
    .wa-lb-caption {
      margin-top: 8px; font-size: 0.85rem;
      color: #dba24c; font-weight: 600;
    }
    .wa-lb-close {
      position: absolute; top: -12px; right: -12px;
      background: #c93b2b; color: #fff;
      border: 2px solid #fff; border-radius: 50%;
      width: 30px; height: 30px; font-size: 1.3rem;
      cursor: pointer; display: flex;
      align-items: center; justify-content: center;
      line-height: 1; transition: transform .2s;
    }
    .wa-lb-close:hover { transform: scale(1.15); }

    /* Responsive */
    @media (max-width: 600px) {
      .wa-order-modal { padding: 20px 16px; max-height: 94vh; }
      .wa-modal-title { font-size: 1.15rem; }
      .wa-row { grid-template-columns: 1fr; gap: 0; }
      .wa-measure-grid { grid-template-columns: 1fr; }
      .wa-guide-row { flex-direction: column; }
    }
  </style>

  <script>
    (function() {
      const waNumber = '{{ $contact["whatsapp"] ?? "6281353055475" }}';
      const overlay = document.getElementById('waOrderOverlay');
      const modal = document.getElementById('waOrderModal');
      const closeBtn = document.getElementById('waModalClose');
      const form = document.getElementById('waOrderForm');
      const productNameInput = document.getElementById('waProductName');
      const bootModelInput = document.getElementById('waBootModel');

      // Lightbox
      const lbOverlay = document.getElementById('waLightboxOverlay');
      const lbImg = document.getElementById('waLightboxImg');
      const lbCaption = document.getElementById('waLightboxCaption');

      window.openLightbox = function(src, caption) {
        lbImg.src = src;
        lbCaption.textContent = caption || '';
        lbOverlay.style.display = 'flex';
      };
      window.closeLightbox = function() {
        lbOverlay.style.display = 'none';
        lbImg.src = '';
      };

      // Open modal
      window.openWaOrderModal = function(productName) {
        productNameInput.value = productName || 'Custom Cowboy Boots';
        if (bootModelInput) bootModelInput.value = productName || 'Classic Cowboy Boots';
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(function() { document.getElementById('waCustomerName').focus(); }, 200);
      };

      // Close modal
      function closeModal() {
        overlay.style.display = 'none';
        document.body.style.overflow = '';
      }

      closeBtn.addEventListener('click', closeModal);
      overlay.addEventListener('click', function(e) { if (e.target === overlay) closeModal(); });
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          if (lbOverlay.style.display === 'flex') closeLightbox();
          else if (overlay.style.display === 'flex') closeModal();
        }
      });

      // Build WhatsApp message
      function buildMessage() {
        const v = id => (document.getElementById(id)?.value?.trim() || '');
        const name = v('waCustomerName') || '-';
        const gender = document.querySelector('input[name="waGender"]:checked')?.value || 'Men';
        const country = v('waCustomerCountry') || '-';
        const phone = v('waCustomerPhone') || '-';
        const address = v('waCustomerAddress');
        const model = v('waBootModel') || productNameInput.value || 'Custom Boots';

        let msg = `Hello Yanto Shoes Bali,\nI would like to place a Custom Boot Order:\n\n`;
        msg += `*CLIENT DETAILS:*\n`;
        msg += `• Name: ${name}\n• Gender: ${gender}\n• Country: ${country}\n• Phone/WA: ${phone}\n`;
        if (address) msg += `• Address: ${address}\n`;

        msg += `\n *BOOT SPECIFICATIONS:*\n`;
        msg += `• Model: ${model}\n`;

        const specs = [
          ['waHighBoot', 'High Boot / Shaft Height'],
          ['waSkinTypes', 'Skin Type'],
          ['waColorTypes', 'Color Type'],
          ['waToeCap', 'Toe Cap'],
          ['waStitches', 'Stitches'],
          ['waAccessoriesColor', 'Accessories Color'],
        ];
        specs.forEach(([id, label]) => { const val = v(id); if (val) msg += `• ${label}: ${val}\n`; });

        const zipper = document.querySelector('input[name="waZipper"]:checked')?.value || 'No';
        msg += `• Zipper: ${zipper}\n`;

        const heels = v('waHeightHeels'); if (heels) msg += `• Height Heels: ${heels}\n`;
        const sole = v('waColorSole'); if (sole) msg += `• Color Sole: ${sole}\n`;

        const footSize = v('waFootSize');
        if (footSize) msg += `\n *FOOT SIZE:* ${footSize}\n`;

        const mIds = [
          ['waLegFloorToKnee', 'Floor to mid-knee'],
          ['waLegUnderKnee', 'Under Knee'],
          ['waLegFullCalf', 'Full Calf'],
          ['waLegCalfHeight', 'Calf Height'],
          ['waLegAroundTen', '10" from ground'],
          ['waLegAroundAnkle', 'Ankle'],
          ['waLegHeelAmount', 'Heel Amount'],
          ['waLegInstep', 'Instep'],
        ];
        const mVals = mIds.map(([id, label], i) => {
          const val = v(id); return val ? `${i+1}. ${label}: ${val} cm` : null;
        }).filter(Boolean);

        if (mVals.length) {
          msg += `\n📏 *LEG MEASUREMENTS:*\n`;
          mVals.forEach(line => msg += `${line}\n`);
        }

        const notes = v('waNotes');
        if (notes) msg += `\n *Notes:* ${notes}\n`;

        return msg;
      }

      // Submit
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('waCustomerName').value.trim();
        const country = document.getElementById('waCustomerCountry').value.trim();
        const phone = document.getElementById('waCustomerPhone').value.trim();
        const footSize = document.getElementById('waFootSize').value.trim();

        if (!name) { alert('Please enter your name.'); document.getElementById('waCustomerName').focus(); return; }
        if (!country) { alert('Please enter your country.'); document.getElementById('waCustomerCountry').focus(); return; }
        if (!phone) { alert('Please enter your phone number.'); document.getElementById('waCustomerPhone').focus(); return; }
        if (!footSize) { alert('Please enter your foot size.'); document.getElementById('waFootSize').focus(); return; }

        const msg = buildMessage();
        window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(msg)}`, '_blank');
        closeModal();
      });

      // Attach click handlers to catalog cards
      document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.catalog-card').forEach(function(card) {
          const productName = card.getAttribute('data-name') || card.querySelector('.catalog-boot-name')?.textContent?.trim() || 'Product';
          card.style.cursor = 'pointer';
          card.addEventListener('click', function(e) {
            if (e.target.closest('a')) e.preventDefault();
            openWaOrderModal(productName);
          });

          const orderBtn = card.querySelector('.btn-card-order');
          if (orderBtn) {
            orderBtn.removeAttribute('href');
            orderBtn.removeAttribute('target');
            orderBtn.style.cursor = 'pointer';
            orderBtn.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); openWaOrderModal(productName); });
          }

          const inquireLink = card.querySelector('.catalog-inquire-link');
          if (inquireLink) {
            inquireLink.removeAttribute('href');
            inquireLink.removeAttribute('target');
            inquireLink.style.cursor = 'pointer';
            inquireLink.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); openWaOrderModal(productName); });
          }
        });
      });
    })();
  </script>

@endsection

