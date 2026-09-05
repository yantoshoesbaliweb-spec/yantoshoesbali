@extends('layouts.visitor')

@section('title', 'Yanto Shoes Bali - Handcrafted Genuine Leather Cowboy Boots, Made in Bali')
@section('meta_description', 'Discover handcrafted genuine leather cowboy boots made in Bali since 1990. Custom made to order in 7 days, retail and wholesale. Legian, Canggu, Uluwatu.')

@section('content')

  <!-- Announcement Bar -->
  <div class="announcement-bar" id="announcement-bar">
    <button class="ann-prev" id="ann-prev" aria-label="Previous">&#8249;</button>
    <div class="ann-messages">
      <span class="ann-msg active">FOLLOW US @YANTOSHOES_BALI &nbsp;&#x2022;&nbsp; BEST COWBOY BOOTS IN BALI</span>
      <span class="ann-msg">FREE CONSULTATION &#x2022; CUSTOM MADE TO ORDER IN 7 DAYS</span>
      <span class="ann-msg">LEGIAN &nbsp;|&nbsp; CANGGU &nbsp;|&nbsp; ULUWATU &#x2022; OPEN DAILY 10AM - 6PM</span>
      <span class="ann-msg">WORLDWIDE EXPRESS SHIPPING AVAILABLE ON ALL ORDERS</span>
    </div>
    <button class="ann-next" id="ann-next" aria-label="Next">&#8250;</button>
  </div>

  <!-- Navigation -->
  <nav class="navbar" id="navbar">
    <a href="{{ route('visitor.home') }}" class="nav-logo">
      <img src="{{ asset('images/yanto-logo.png') }}" alt="Yanto Shoes Bali Logo" class="logo-img" />
      <span class="logo-text">YANTO SHOES BALI</span>
    </a>

    <div class="nav-links">
      <a href="{{ route('visitor.home') }}" class="nav-link">Home</a>
      <a href="#about" class="nav-link">Our Story</a>
      <a href="{{ route('visitor.catalog') }}" class="nav-link">Catalog</a>
      <a href="#custom" class="nav-link">Custom Order</a>
      <a href="#stores" class="nav-link">Stores</a>
      <a href="#testimonials" class="nav-link">Reviews</a>
    </div>

    <div class="nav-right">
      <a href="{{ $contact['facebook'] ?? 'https://facebook.com/yantoshoesbali' }}" target="_blank" class="nav-icon" aria-label="Facebook">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
      </a>
      <a href="{{ $contact['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/' }}" target="_blank" class="nav-icon" aria-label="Instagram">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
      </a>
      <a href="{{ $contact['tiktok'] ?? 'https://www.tiktok.com/@yantoshoesbali' }}" target="_blank" class="nav-icon" aria-label="TikTok">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
      </a>
      <a href="https://wa.me/{{ $contact['whatsapp'] ?? '6281353055475' }}" target="_blank" class="nav-icon" aria-label="WhatsApp">
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
    <a href="#about" class="mobile-nav-link">Our Story</a>
    <a href="{{ route('visitor.catalog') }}" class="mobile-nav-link">Catalog</a>
    <a href="#custom" class="mobile-nav-link">Custom Order</a>
    <a href="#stores" class="mobile-nav-link">Stores &amp; Maps</a>
    <a href="#testimonials" class="mobile-nav-link">Testimonials</a>
    <div class="mobile-nav-socials">
      <a href="{{ $contact['facebook'] ?? 'https://facebook.com/yantoshoesbali' }}" target="_blank">Facebook</a>
      <a href="{{ $contact['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/' }}" target="_blank">Instagram</a>
      <a href="{{ $contact['tiktok'] ?? 'https://www.tiktok.com/@yantoshoesbali' }}" target="_blank">TikTok</a>
      <a href="https://wa.me/{{ $contact['whatsapp'] ?? '6281353055475' }}" target="_blank">WhatsApp</a>
    </div>
  </div>

  <!-- Hero Slider -->
  <section class="hero" id="hero">
    <div class="hero-slides">
      @php
        $slides = $headerContent['slides'] ?? [
          [
            'subtitle' => 'Handcrafted in Bali • Genuine Leather',
            'title' => 'Authentic Cowboy Boots',
            'title_highlight' => 'Made in Bali Since 1990',
            'description' => 'Experience master Balinese artisan craftsmanship. 100% genuine full-grain leather, custom fitted to your measurements in just 7 days.',
            'btn_primary_text' => 'Order Custom Boots',
            'btn_primary_link' => 'https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20order%20custom%20cowboy%20boots',
            'btn_secondary_text' => 'Explore Catalog',
            'btn_secondary_link' => '#catalog',
            'image' => 'images/hero_boots.png'
          ],
          [
            'subtitle' => 'Artisan Heritage • 35+ Years Mastery',
            'title' => 'Bespoke Western Boots',
            'title_highlight' => 'Tailored in 7 Days',
            'description' => 'From custom flame embroidery to classic roper styles, our Bali craftsmen bring your dream footwear to life with premium leathers.',
            'btn_primary_text' => 'Custom Order Boots',
            'btn_primary_link' => '#custom',
            'btn_secondary_text' => 'View All Boots',
            'btn_secondary_link' => '#catalog',
            'image' => 'images/craftsmanship.png'
          ],
          [
            'subtitle' => 'Visit Our Stores • Bali Outlets',
            'title' => 'Legian • Canggu • Uluwatu',
            'title_highlight' => 'Experience the Leather',
            'description' => 'Step into any of our 3 Bali locations for in-person fittings, custom leather selection, and off-the-shelf purchases.',
            'btn_primary_text' => 'Find Store Locations',
            'btn_primary_link' => '#stores',
            'btn_secondary_text' => 'WhatsApp Us',
            'btn_secondary_link' => 'https://wa.me/6281353055475',
            'image' => 'images/collection.png'
          ]
        ];
      @endphp

      @foreach($slides as $idx => $slide)
      <div class="hero-slide {{ $idx === 0 ? 'active' : '' }}" id="slide-{{ $idx + 1 }}">
        <img src="{{ asset($slide['image'] ?? 'images/hero_boots.png') }}" alt="{{ $slide['title'] ?? 'Yanto Shoes Bali' }}" class="hero-bg" />
        <div class="hero-overlay"></div>
        <div class="hero-content">
          <p class="hero-eyebrow">{{ $slide['subtitle'] ?? '' }}</p>
          <h1 class="hero-title">{!! $slide['title'] ?? '' !!}@if(!empty($slide['title_highlight']))<br/><em>{!! $slide['title_highlight'] !!}</em>@endif</h1>
          <p class="hero-subtitle">{{ $slide['description'] ?? '' }}</p>
          <div class="hero-actions">
            @if(!empty($slide['btn_primary_text']))
            <a href="{{ $slide['btn_primary_link'] ?? '#' }}" class="btn btn-primary">{{ $slide['btn_primary_text'] }}</a>
            @endif
            @if(!empty($slide['btn_secondary_text']))
            <a href="{{ $slide['btn_secondary_link'] ?? '#' }}" class="btn btn-ghost">{{ $slide['btn_secondary_text'] }}</a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="hero-dots">
      @foreach($slides as $idx => $slide)
      <button class="hero-dot {{ $idx === 0 ? 'active' : '' }}" data-slide="{{ $idx }}" aria-label="Slide {{ $idx + 1 }}"></button>
      @endforeach
    </div>

    <div class="scroll-indicator">
      <span>Scroll</span>
      <div class="scroll-line"></div>
    </div>
  </section>

  <!-- Brand Strip -->
  <div class="brand-strip">
    <div class="strip-track">
      <div class="strip-content">
        @php
          $marquee = $headerContent['marquee'] ?? [
            '100% GENUINE LEATHER',
            'CUSTOM MADE IN 7 DAYS',
            'BALI MASTER ARTISANS',
            'RETAIL & WHOLESALE',
            'WORLDWIDE SHIPPING',
            'LEGIAN • CANGGU • ULUWATU',
            'ESTABLISHED 1990'
          ];
        @endphp
        @foreach($marquee as $item)
          <span>{{ $item }}</span>
          <span class="strip-dot">&#x2022;</span>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Story Narrative Section (Standalone Section directly after Hero Slider) -->
  <section class="story-narrative-section" id="about">
    <div class="container">
      <div class="story-narrative-grid">
        
        <!-- Story Image with Badge -->
        <div class="story-narrative-media reveal">
          <div class="story-image-wrap">
            <img src="{{ asset($storyContent['image'] ?? 'images/yanto-header.jpeg') }}" alt="Mr. Yanto - Master Craftsman of Yanto Shoes Bali" class="story-img" />
            <div class="story-image-badge">
              <span class="badge-year">{{ $storyContent['badge_year'] ?? 'Est. 1990' }}</span>
              <span class="badge-sub">{{ $storyContent['badge_sub'] ?? 'Bali Heritage' }}</span>
            </div>
          </div>
        </div>

        <!-- Story Content: The Authentic Story -->
        <div class="story-narrative-content reveal reveal-delay-1">
          <p class="section-eyebrow">{{ $storyContent['eyebrow'] ?? 'YANTO SHOES BALI' }}</p>
          <h2 class="story-title">{{ $storyContent['title'] ?? 'A Legacy of Craftsmanship' }}<br/><em>{{ $storyContent['title_highlight'] ?? 'Since 1990' }}</em></h2>
          
          <div class="story-paragraph-wrap">
            @if(!empty($storyContent['lead_text']))
            <p class="story-lead-text">
              {!! $storyContent['lead_text'] !!}
            </p>
            @endif

            @php
              $paragraphs = $storyContent['paragraphs'] ?? [
                'In 1987, Mr Yanto began his journey as a Leather Shoes craftsman in Bali. That same year, he was entrusted with producing thousands of pairs of Hells shoes made from sponge material for an Asian company. This experience became an important foundation in developing his skills, craftsmanship and distinctive character.',
                'In 1990, after three years of refining his craft, Mr Yanto established his own brand, Yanto Shoes Bali, first opening its doors on Jl Legian, Bali.',
                'What began as a small business built by hand and driven by dedication has continued to grow while staying true to its original character: authentic, distinctive and timeless cowboy-inspired footwear.',
                'More than just footwear, every pair of Yanto Shoes Bali carries decades of experience, skill and dedication to craftsmanship.',
                'Today, Yanto Shoes Bali has three locations across Bali — Legian, Canggu and Uluwatu — along with its own production workshop.'
              ];
            @endphp
            @foreach($paragraphs as $p)
            <p class="story-body-text">
              {!! $p !!}
            </p>
            @endforeach

            <div class="story-values-box">
              <p class="story-values-intro">{{ $storyContent['values_intro'] ?? 'After more than three decades, the values established by Mr Yanto remain at the heart of the brand:' }}</p>
              <div class="story-values-list">
                @php
                  $values = $storyContent['values_items'] ?? [
                    'Crafted with Experience.',
                    'Built with Character.',
                    'Crafted by Skilled Hands.'
                  ];
                @endphp
                @foreach($values as $val)
                <div class="story-value-item">
                  <span class="story-val-bullet">&#x25CF;</span>
                  <span>{{ $val }}</span>
                </div>
                @endforeach
              </div>
              <p class="story-tagline">{!! $storyContent['tagline'] ?? '<strong>Yanto Shoes Bali</strong> &mdash; <em>A Legacy of Cowboy Craftsmanship.</em>' !!}</p>
            </div>
          </div>

          <!-- Highlight Badges -->
          <div class="story-pills-row">
            @php
              $pills = $storyContent['pills'] ?? [
                ['num' => '35+', 'text' => 'Years Mastery'],
                ['num' => '3', 'text' => 'Bali Store Outlets'],
                ['num' => '100%', 'text' => 'Genuine Leather'],
                ['num' => 'Workshop', 'text' => 'Own Production']
              ];
            @endphp
            @foreach($pills as $pill)
            <div class="story-pill">
              <span class="story-pill-num">{{ $pill['num'] }}</span>
              <span class="story-pill-text">{{ $pill['text'] }}</span>
            </div>
            @endforeach
          </div>

          <div class="story-cta-row">
            <a href="#custom" class="btn btn-primary">Custom Order Boots</a>
            <a href="#stores" class="btn btn-ghost-dark">Visit Our Stores</a>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- Catalog Section (Featured Collection) -->
  <section class="collection" id="catalog">
    <div class="container">
      <div class="section-header">
        <p class="section-eyebrow">Catalog Preview</p>
        <h2 class="section-title">Handcrafted Boots Catalog</h2>
        <p class="section-desc">Explore our signature handcrafted genuine leather boots. Each pair is built for comfort, character, and durability.</p>
      </div>

      <div class="products-grid">
        <div class="product-card" id="prod-1">
          <div class="product-img-wrap">
            <img src="{{ asset('images/product_tan.png') }}" alt="Classic Tan Cowboy Boots" class="product-img" loading="lazy" />
            <div class="product-overlay">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20am%20interested%20in%20the%20Classic%20Tan%20Cowboy%20Boots" target="_blank" class="product-cta">Order via WhatsApp</a>
            </div>
            <span class="product-badge">Bestseller</span>
          </div>
          <div class="product-info">
            <p class="product-category">Classic Series</p>
            <h3 class="product-name">Classic Tan Cowboy Boots</h3>
            <p class="product-detail">Genuine Cowhide &#x2022; Traditional Western Stitching</p>
            <p class="product-price">Made to Order / In-Store Stock</p>
          </div>
        </div>

        <div class="product-card" id="prod-2">
          <div class="product-img-wrap">
            <img src="{{ asset('images/product_black.png') }}" alt="Midnight Black Cowboy Boots" class="product-img" loading="lazy" />
            <div class="product-overlay">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20am%20interested%20in%20the%20Midnight%20Black%20Cowboy%20Boots" target="_blank" class="product-cta">Order via WhatsApp</a>
            </div>
            <span class="product-badge">Popular</span>
          </div>
          <div class="product-info">
            <p class="product-category">Premium Series</p>
            <h3 class="product-name">Midnight Black Cowboy Boots</h3>
            <p class="product-detail">Full-Grain Leather &#x2022; Handcrafted Sole</p>
            <p class="product-price">Made to Order / In-Store Stock</p>
          </div>
        </div>

        <div class="product-card" id="prod-3">
          <div class="product-img-wrap">
            <img src="{{ asset('images/product_cream.png') }}" alt="Ivory Dream Floral Boots" class="product-img" loading="lazy" />
            <div class="product-overlay">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20am%20interested%20in%20the%20Ivory%20Dream%20Floral%20Boots" target="_blank" class="product-cta">Order via WhatsApp</a>
            </div>
            <span class="product-badge new">New Edition</span>
          </div>
          <div class="product-info">
            <p class="product-category">Bohemian Series</p>
            <h3 class="product-name">Ivory Dream Floral Boots</h3>
            <p class="product-detail">Genuine Soft Leather &#x2022; Delicate Floral Motif</p>
            <p class="product-price">Made to Order / In-Store Stock</p>
          </div>
        </div>

        <div class="product-card" id="prod-4">
          <div class="product-img-wrap">
            <img src="{{ asset('images/product_red.png') }}" alt="Scarlet Flame Cowboy Boots" class="product-img" loading="lazy" />
            <div class="product-overlay">
              <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20am%20interested%20in%20the%20Scarlet%20Flame%20Cowboy%20Boots" target="_blank" class="product-cta">Order via WhatsApp</a>
            </div>
            <span class="product-badge">Bold Edition</span>
          </div>
          <div class="product-info">
            <p class="product-category">Bold Series</p>
            <h3 class="product-name">Scarlet Flame Cowboy Boots</h3>
            <p class="product-detail">Crimson Burnished Leather &#x2022; Statement Flame Cut</p>
            <p class="product-price">Made to Order / In-Store Stock</p>
          </div>
        </div>
      </div>

      <!-- View All Catalog CTA Button -->
      <div class="catalog-action-wrap">
        <a href="{{ route('visitor.catalog') }}" class="btn btn-primary btn-catalog-explore">
          <span>View Full Boot Catalog</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
      </div>

    </div>
  </section>

  <!-- Fine Leather Guide Section -->
  <section class="leather-guide-section" id="leather-guide">
    <div class="container">
      <div class="leather-guide-header">
        <p class="section-eyebrow">The Connoisseur's Guide to</p>
        <h2 class="leather-guide-title">Fine <em>Leather</em></h2>
        <p class="leather-guide-subtitle">Premium Varieties Explained</p>
      </div>

      <div class="leather-grid">
        @foreach($leathers as $idx => $leather)
        <div class="leather-card" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
          <div class="leather-card-image">
            <img src="{{ $leather->image_url }}" alt="{{ $leather->name }}" onerror="this.onerror=null;this.src='{{ asset('images/leather_calfskin.jpg') }}';" loading="lazy" />
          </div>
          <h3 class="leather-card-name">{{ $leather->name }}</h3>
          <ul class="leather-card-traits">
            @foreach($leather->traits_list as $trait)
              <li>{{ $trait }}</li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Boot Toe Profiles Guide Section -->
  <section class="toe-shapes-section" id="toe-shapes">
    <div class="container">
      <div class="toe-shapes-header">
        <h2 class="toe-shapes-title">Boot <em>Profiles</em></h2>
      </div>

      <!-- 6 Toe Shapes Grid (Flush, No Gap) -->
      <div class="toe-grid">
        @foreach($shoeToes as $idx => $toe)
        <div class="toe-card">
          <div class="toe-card-badge">{{ sprintf('%02d', $idx + 1) }}</div>
          <div class="toe-card-media">
            <img src="{{ $toe->image_url }}" alt="{{ $toe->name }} Cowboy Boots" onerror="this.onerror=null;this.src='{{ asset('images/toe_square_custom.jpg') }}';" loading="lazy" />
          </div>
          <div class="toe-card-body">
            <h3 class="toe-name">{{ $toe->name }}</h3>
            @if($toe->description)
              <div class="toe-desc">{{ $toe->description }}</div>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Bespoke Custom Order (Vision) -->
  <section class="custom-section" id="custom">
    <div class="custom-grid">
      <div class="custom-image">
        <img src="{{ asset($visionContent['image'] ?? 'images/craftsmanship.png') }}" alt="Custom Order Yanto Shoes Bali - Bespoke Leather Boots" />
        <div class="custom-img-overlay"></div>
      </div>
      <div class="custom-content">
        <p class="section-eyebrow">{{ $visionContent['eyebrow'] ?? 'Bespoke Custom Orders' }}</p>
        <h2 class="custom-title">{{ $visionContent['title'] ?? 'Your Vision,' }}<br/><em>{{ $visionContent['title_highlight'] ?? 'Our Craftsmanship' }}</em></h2>
        <p class="custom-desc">
          {{ $visionContent['description'] ?? 'Looking for a specific heel height, exotic leather finish, or unique custom embroidery? Let our master artisans create your dream boots tailored to your exact measurements in just 7 days.' }}
        </p>
        <ul class="custom-features">
          @php
            $features = $visionContent['features'] ?? [
              ['title' => 'Free Consultation:', 'desc' => 'Send us your reference photos, drawings, or ideas.'],
              ['title' => 'Premium Leather Selection:', 'desc' => 'Choose from cowhide, suede, burnished leather, and more.'],
              ['title' => 'Handmade in 7 Days:', 'desc' => 'Expertly shaped, welted, and finished by Balinese artisans.'],
              ['title' => 'Global Delivery:', 'desc' => 'In-store pickup across Bali or worldwide door-to-door courier.']
            ];
          @endphp
          @foreach($features as $feat)
          <li>
            <span class="feature-icon">&#x2713;</span>
            <span><strong>{{ $feat['title'] }}</strong> {{ $feat['desc'] }}</span>
          </li>
          @endforeach
        </ul>
        <div>
          <a href="{{ $visionContent['cta_link'] ?? 'https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20consult%20about%20a%20custom%20order' }}" target="_blank" class="btn btn-primary">{{ $visionContent['cta_text'] ?? 'Start Custom Consultation' }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Store Locations with Google Maps (Dynamic from Admin) -->
  <section class="stores-section" id="stores">
    <div class="container">
      <div class="section-header">
        <p class="section-eyebrow">{{ $storesContent['eyebrow'] ?? 'Visit Our Stores' }}</p>
        <h2 class="section-title">{{ $storesContent['title'] ?? 'Our Bali Store Locations' }}</h2>
        <p class="section-desc">{{ $storesContent['description'] ?? 'Experience our boots firsthand. Visit any of our three stores across Bali for fittings, custom sizing, and instant purchases.' }}</p>
      </div>

      <div class="stores-grid-enhanced">
        @php
          $storeItems = $storesContent['items'] ?? [
            ['name' => 'Legian Flagship', 'badge' => 'Flagship Outlet', 'address' => 'Jl. Legian No. 388, Kuta, Badung, Bali 80361', 'hours' => '10:00 AM – 6:00 PM (Mon – Sun)', 'map_embed' => 'https://maps.google.com/maps?q=Yanto+Shoes+3+Uluwatu-Pecatu,+Bali&hl=en&z=16&output=embed', 'map_link' => 'https://maps.app.goo.gl/qH3JJZtfXYbTJqXw7?g_st=aw', 'whatsapp_text' => 'Hi Yanto Shoes Legian, I am planning to visit your store'],
            ['name' => 'Canggu Store', 'badge' => 'Canggu Hub', 'address' => 'Jl. Pantai Batu Bolong No. 56, Canggu, Bali 80351', 'hours' => '10:00 AM – 6:00 PM (Mon – Sun)', 'map_embed' => 'https://maps.google.com/maps?q=Yanto+Shoes+2,+Jl.+Pantai+Batu+Bolong+No.11a,+Canggu,+Bali&hl=en&z=16&output=embed', 'map_link' => 'https://maps.app.goo.gl/v36RDnMZDLeoEkcd9?g_st=aw', 'whatsapp_text' => 'Hi Yanto Shoes Canggu, I am planning to visit your store'],
            ['name' => 'Uluwatu Store', 'badge' => 'Clifftop Outlet', 'address' => 'Jl. Labuansait No. 12, Pecatu, Uluwatu, Bali 80361', 'hours' => '10:00 AM – 6:00 PM (Mon – Sun)', 'map_embed' => 'https://maps.google.com/maps?q=yanto+shoes,+Jl.+Werkudara+No.20,+Legian,+Bali&hl=en&z=16&output=embed', 'map_link' => 'https://maps.app.goo.gl/rWzUWYkMv3h5L53R8?g_st=aw', 'whatsapp_text' => 'Hi Yanto Shoes Uluwatu, I am planning to visit your store'],
          ];
          $storeDelays = ['reveal', 'reveal reveal-delay-1', 'reveal reveal-delay-2'];
          $waNumber = $contact['whatsapp'] ?? '6281353055475';
        @endphp

        @foreach($storeItems as $sIdx => $store)
        <div class="store-card-enhanced {{ $storeDelays[$sIdx % 3] }}" id="store-{{ Str::slug($store['name'] ?? 'store-' . $sIdx) }}">
          <div class="store-map-wrapper">
            <iframe 
              title="Yanto Shoes Bali - {{ $store['name'] ?? '' }} Map"
              src="{{ $store['map_embed'] ?? '' }}" 
              class="store-map-frame" 
              loading="lazy" 
              allowfullscreen>
            </iframe>
            <span class="store-badge-flag">{{ $store['badge'] ?? '' }}</span>
          </div>
          <div class="store-body">
            <div class="store-header-row">
              <h3 class="store-title">{{ $store['name'] ?? '' }}</h3>
              <span class="store-status open">&#x25CF; Open Daily</span>
            </div>
            <p class="store-location-text">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              {{ $store['address'] ?? '' }}
            </p>
            <p class="store-time-text">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              {{ $store['hours'] ?? '10:00 AM – 6:00 PM (Mon – Sun)' }}
            </p>
            <div class="store-btn-group">
              <a href="{{ $store['map_link'] ?? '#' }}" target="_blank" class="btn-store-action btn-store-dir">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
                Get Directions
              </a>
              <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($store['whatsapp_text'] ?? 'Hi Yanto Shoes, I am planning to visit your store') }}" target="_blank" class="btn-store-action btn-store-wa">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                Contact Store
              </a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- Testimonials Section (Dynamic from Admin) -->
  <section class="testimonials-section" id="testimonials">
    <div class="container">
      <div class="section-header">
        <p class="section-eyebrow">{{ $testimonies['eyebrow'] ?? 'Client Reviews' }}</p>
        <h2 class="section-title">{{ $testimonies['title'] ?? 'Loved by Boot Lovers' }} <em>{{ $testimonies['title_highlight'] ?? 'Worldwide' }}</em></h2>
        <p class="section-desc">{{ $testimonies['description'] ?? 'From Bali vacationers to international collectors, see what our clients say about their bespoke boots.' }}</p>
      </div>

      <div class="testimonials-grid">
        @php
          $testimonyItems = $testimonies['items'] ?? [
            ['author' => 'Sarah Jenkins', 'origin' => 'Sydney, Australia \u{1F1E6}\u{1F1FA}', 'product' => 'Custom Tan Classic Cowboy Boots', 'stars' => 5, 'avatar' => 'images/reviewer_sarah.jpg', 'text' => 'I ordered a custom pair of cowboy boots while visiting Canggu. The leather quality is extraordinary and the fit is perfection. Picked them up within 6 days before my flight back home. Truly world-class craftsmanship!'],
            ['author' => "Marcus O'Connor", 'origin' => 'London, United Kingdom \u{1F1EC}\u{1F1E7}', 'product' => 'Midnight Black Flame Boots', 'stars' => 5, 'avatar' => 'images/reviewer_marcus.jpg', 'text' => 'Hands down the most comfortable leather boots in my collection. Mr. Yanto took my measurements personally at the Legian store. The attention to detail on the welt and stitching is incredible.'],
            ['author' => 'Emma Laurent', 'origin' => 'Los Angeles, USA \u{1F1FA}\u{1F1F8}', 'product' => 'Ivory Dream Floral Embroidered Boots', 'stars' => 5, 'avatar' => 'images/reviewer_emma.jpg', 'text' => 'Found Yanto Shoes on Instagram and ordered online from California via WhatsApp. The team sent photo updates throughout production and shipped via DHL. They arrived quickly and look even better in real life!'],
            ['author' => 'Lukas Meyer', 'origin' => 'Munich, Germany \u{1F1E9}\u{1F1EA}', 'product' => 'Scarlet Flame Cowboy Boots', 'stars' => 5, 'avatar' => 'images/reviewer_lukas.jpg', 'text' => 'The quality of genuine leather is instantly recognizable. Sturdy, breathable, and molds to your foot effortlessly. I bought one pair in Uluwatu and immediately ordered another custom pair before leaving Bali.'],
            ['author' => 'Chloe & Victor', 'origin' => 'Amsterdam, Netherlands \u{1F1F3}\u{1F1F1}', 'product' => 'Bespoke Wedding Western Pair', 'stars' => 5, 'avatar' => 'images/reviewer_couple.jpg', 'text' => 'We ordered matching cowboy boots for our wedding in Bali. The artisans custom engraved our initials on the pull-straps. An unforgettable memory and footwear we will cherish forever.'],
            ['author' => 'David Fontaine', 'origin' => 'Paris, France \u{1F1EB}\u{1F1F7}', 'product' => 'Classic Tan Low-Cut Boot', 'stars' => 5, 'avatar' => 'images/reviewer_david.jpg', 'text' => 'Yanto Shoes is a true Bali hidden gem. The price-to-quality ratio for genuine handmade full-grain boots is unbeatable anywhere in the world. Cannot recommend them enough!'],
          ];
          $delayClasses = ['reveal', 'reveal reveal-delay-1', 'reveal reveal-delay-2'];
        @endphp

        @foreach($testimonyItems as $idx => $review)
        <div class="testimonial-card {{ $delayClasses[$idx % 3] }}">
          <div class="testimonial-stars">
            @for($s = 0; $s < ($review['stars'] ?? 5); $s++)<span>★</span>@endfor
          </div>
          <p class="testimonial-text">
            &ldquo;{{ $review['text'] ?? '' }}&rdquo;
          </p>
          <div class="testimonial-meta">
            <div class="testimonial-avatar">
              <img src="{{ asset($review['avatar'] ?? 'images/yanto-logo.png') }}" alt="{{ $review['author'] ?? '' }}" class="testimonial-avatar-img" />
            </div>
            <div class="testimonial-info">
              <h4 class="testimonial-author">{{ $review['author'] ?? '' }}</h4>
              <p class="testimonial-origin">{{ $review['origin'] ?? '' }}</p>
              <span class="testimonial-product">{{ $review['product'] ?? '' }}</span>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- Follow Us / Social Section (Dynamic from Admin) -->
  <section class="socials-section" id="socials">
    <div class="container">
      <div class="socials-inner reveal">
        <p class="section-eyebrow">Connect &amp; Follow</p>
        <h2 class="section-title">Follow Our Journey</h2>
        <p class="section-desc">Join our growing community on Facebook, Instagram, and TikTok for the newest handcrafted boot releases, artisan workshop stories, and Western styling inspirations.</p>

        <!-- Social Buttons (Dynamic from Contact) -->
        <div class="social-follow-buttons">
          <a href="{{ $contact['facebook'] ?? 'https://facebook.com/yantoshoesbali' }}" target="_blank" class="social-btn facebook" aria-label="Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            <span>Facebook</span>
          </a>

          <a href="{{ $contact['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/' }}" target="_blank" class="social-btn instagram" aria-label="Instagram">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            <span>Instagram</span>
          </a>

          <a href="{{ $contact['tiktok'] ?? 'https://www.tiktok.com/@yantoshoesbali' }}" target="_blank" class="social-btn tiktok" aria-label="TikTok">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
            <span>TikTok</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="cta-banner">
    <div class="cta-bg">
      <img src="{{ asset('images/hero_boots.png') }}" alt="Yanto Shoes Bali - Handcrafted Cowboy Boots" />
      <div class="cta-overlay"></div>
    </div>
    <div class="cta-content">
      <p class="section-eyebrow light">Get In Touch</p>
      <h2 class="cta-title">Ready to Own Your<br/><em>Dream Boots?</em></h2>
      <p class="cta-desc">Consult directly with our master artisan team. Free sizing advice, bespoke sketches, and worldwide shipping.</p>
      <div class="cta-actions">
        <a href="https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20consult%20about%20your%20boots" target="_blank" class="btn btn-primary">Chat on WhatsApp</a>
        <a href="{{ route('visitor.catalog') }}" class="btn btn-ghost">Browse Full Catalog</a>
      </div>
    </div>
  </section>

  <!-- Footer (Dynamic Contact from Admin) -->
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
            <a href="{{ $contact['facebook'] ?? 'https://facebook.com/yantoshoesbali' }}" target="_blank" class="social-link" aria-label="Facebook">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <a href="{{ $contact['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/' }}" target="_blank" class="social-link" aria-label="Instagram">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="{{ $contact['tiktok'] ?? 'https://www.tiktok.com/@yantoshoesbali' }}" target="_blank" class="social-link" aria-label="TikTok">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
            </a>
            <a href="https://wa.me/{{ $contact['whatsapp'] ?? '6281353055475' }}" target="_blank" class="social-link" aria-label="WhatsApp">
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
            <li><a href="#about">Our Heritage</a></li>
            <li><a href="#custom">Custom Order Process</a></li>
            <li><a href="#stores">Bali Store Maps</a></li>
            <li><a href="#testimonials">Customer Reviews</a></li>
            <li><a href="{{ $contact['facebook'] ?? 'https://facebook.com/yantoshoesbali' }}" target="_blank">Facebook Page</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Contact &amp; Stores</h4>
          <ul>
            <li><a href="https://wa.me/{{ $contact['whatsapp'] ?? '6281353055475' }}">{{ $contact['phone'] ?? '+62 813 5305 5475' }}</a></li>
            <li><a href="{{ $contact['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/' }}" target="_blank">{{ $contact['instagram_handle'] ?? '@yantoshoes_bali' }}</a></li>
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
