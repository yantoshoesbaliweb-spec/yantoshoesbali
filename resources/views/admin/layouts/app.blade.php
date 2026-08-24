<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin Panel - Yanto Shoes Bali')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="icon" type="image/png" href="{{ asset('images/yanto-logo.png') }}" />
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
  <link rel="apple-touch-icon" href="{{ asset('images/yanto-logo.png') }}" />

  <!-- Google Fonts: Cormorant Garamond & Outfit -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- adminHMD Bootstrap & Vendors -->
  <link rel="stylesheet" href="{{ asset('adminhmd/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('adminhmd/vendors/bootstrap-icons/bootstrap-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('adminhmd/css/style.css') }}" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />

  @stack('styles')
</head>
<body>

  <div class="admin-shell">
    
    <!-- Mobile Sidebar Backdrop -->
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Wrapper -->
    <div class="admin-main d-flex flex-column min-vh-100">
      
      <!-- Header -->
      @include('admin.layouts.header')

      <!-- Main Content Container -->
      <main class="admin-content flex-grow-1 p-3 p-lg-4" id="main-content">
        @yield('content')
      </main>

      <!-- Footer -->
      @include('admin.layouts.footer')

    </div>

  </div>

  <!-- Scripts -->
  <script>
    window.adminHMDUser = {
      name: @json(Auth::user()->name ?? 'Admin Yanto'),
      workspace: @json('Role: ' . strtoupper(Auth::user()->role ?? 'admin')),
      avatar: @json(asset('images/yanto.jpeg'))
    };
  </script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('adminhmd/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="{{ asset('adminhmd/js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
