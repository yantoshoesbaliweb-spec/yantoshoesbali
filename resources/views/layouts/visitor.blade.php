<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  {{-- SEO Meta Tags (Title, Description, Keywords, Canonical) --}}
  {!! \App\Helpers\SeoHelper::renderMeta() !!}

  {{-- Fallback title if SEO helper didn't set one --}}
  @if(empty(\App\Helpers\SeoHelper::renderMeta()))
  <title>@yield('title', 'Yanto Shoes Bali - Handcrafted Leather Boots, Made in Bali')</title>
  <meta name="description" content="@yield('meta_description', 'Yanto Shoes Bali - Premium handcrafted genuine leather cowboy boots. Made to order. Retail & Wholesale. Legian | Canggu | Uluwatu.')" />
  @endif

  {{-- Open Graph --}}
  {!! \App\Helpers\SeoHelper::renderOpenGraph() !!}

  {{-- Twitter Card --}}
  {!! \App\Helpers\SeoHelper::renderTwitterCard() !!}

  <link rel="icon" type="image/png" href="{{ asset('images/yanto-logo.png') }}" />
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
  <link rel="apple-touch-icon" href="{{ asset('images/yanto-logo.png') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Outfit:wght@200;300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/visitor.css') }}" />
  @stack('styles')
</head>
<body>

  @yield('content')

  <!-- WhatsApp Float Button -->
  @php $contact = \App\Models\Content::getByKey('contact'); @endphp
  <a href="https://wa.me/{{ $contact['whatsapp'] ?? '6281353055475' }}?text={{ urlencode($contact['whatsapp_message'] ?? 'Hi Yanto Shoes Bali, I would like to ask about your products') }}" target="_blank" class="whatsapp-float" id="wa-float" aria-label="Chat on WhatsApp">
    <svg viewBox="0 0 24 24" fill="white" width="28" height="28"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.557 4.116 1.532 5.845L.054 23.5l5.835-1.533A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.854 0-3.592-.5-5.093-1.373l-.362-.215-3.756.985.985-3.721-.234-.381A9.95 9.95 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
    <span class="wa-tooltip">Chat with us!</span>
  </a>

  {{-- JSON-LD Structured Data --}}
  {!! \App\Helpers\SeoHelper::renderJsonLd() !!}

  <script src="{{ asset('js/visitor.js') }}"></script>
  @stack('scripts')
</body>
</html>
