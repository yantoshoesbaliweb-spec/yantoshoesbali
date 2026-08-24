<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In - Yanto Shoes Bali Admin</title>
  
  <link rel="icon" type="image/png" href="{{ asset('images/yanto-logo.png') }}" />
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap & Icons -->
  <link rel="stylesheet" href="{{ asset('adminhmd/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('adminhmd/vendors/bootstrap-icons/bootstrap-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />

  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at top right, #391802 0%, #200d01 60%, #150800 100%);
      font-family: 'Outfit', sans-serif;
      padding: 24px 16px;
      color: #faf2e8;
    }

    .login-card {
      width: 100%;
      max-width: 440px;
      background: rgba(33, 14, 2, 0.85);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(219, 162, 76, 0.25);
      border-radius: 16px;
      box-shadow: 0 24px 60px rgba(0, 0, 0, 0.6);
      padding: 2.5rem;
    }

    .login-logo {
      width: 56px;
      height: 56px;
      border-radius: 12px;
      background: #391802;
      border: 1px solid #dba24c;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.25rem;
    }

    .login-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      color: #ffffff;
      margin-bottom: 0.25rem;
      text-align: center;
    }

    .login-subtitle {
      font-size: 0.82rem;
      color: #dba24c;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      text-align: center;
      margin-bottom: 2rem;
    }

    .form-floating > .form-control {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(219, 162, 76, 0.3);
      color: #ffffff;
      border-radius: 8px;
    }

    .form-floating > .form-control:focus {
      background: rgba(255, 255, 255, 0.1);
      border-color: #dba24c;
      box-shadow: 0 0 0 4px rgba(219, 162, 76, 0.25);
      color: #ffffff;
    }

    .form-floating > label {
      color: #c2aa96;
    }

    .btn-login {
      background: linear-gradient(135deg, #dba24c, #b27a29);
      color: #200d01;
      font-weight: 700;
      font-size: 0.92rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      border: none;
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      transition: all 0.2s ease;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #f3c77d, #dba24c);
      color: #150800;
      transform: translateY(-1px);
      box-shadow: 0 8px 24px rgba(219, 162, 76, 0.35);
    }

    .credentials-box {
      background: rgba(0, 0, 0, 0.3);
      border: 1px dashed rgba(219, 162, 76, 0.3);
      border-radius: 8px;
      padding: 0.85rem;
      font-size: 0.76rem;
      margin-top: 1.5rem;
      color: #d1d5db;
    }

    .cred-item {
      cursor: pointer;
      padding: 2px 6px;
      border-radius: 4px;
      transition: background 0.15s;
    }

    .cred-item:hover {
      background: rgba(219, 162, 76, 0.2);
      color: #dba24c;
    }
  </style>
</head>
<body>

  <div class="login-card">
    
    <div class="login-logo">
      <img src="{{ asset('images/yanto-logo.png') }}" alt="Logo" style="width: 38px; height: 38px; object-fit: contain;" />
    </div>

    <h1 class="login-title">YANTO SHOES BALI</h1>
    <p class="login-subtitle"> Admin Sign In</p>

    @if(session('success'))
    <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 mb-3" style="font-size: 0.82rem; background: rgba(34, 197, 94, 0.15); border-color: rgba(34, 197, 94, 0.4); color: #86efac;">
      <i class="bi bi-check-circle-fill"></i>
      <div>{{ session('success') }}</div>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 mb-3" style="font-size: 0.82rem; background: rgba(239, 68, 68, 0.15); border-color: rgba(239, 68, 68, 0.4); color: #fca5a5;">
      <i class="bi bi-exclamation-triangle-fill"></i>
      <div>{{ $errors->first() }}</div>
    </div>
    @endif

    <form action="{{ route('login.attempt') }}" method="POST">
      @csrf

      <!-- Email Input -->
      <div class="form-floating mb-3">
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus />
        <label for="email"><i class="bi bi-envelope me-2"></i>Email / Username</label>
      </div>

      <!-- Password Input -->
      <div class="form-floating mb-3 position-relative">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required />
        <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
        <button type="button" class="btn btn-sm text-muted position-absolute end-0 top-50 translate-middle-y me-2 border-0 bg-transparent" id="togglePassword" aria-label="Toggle password visibility">
          <i class="bi bi-eye text-light" id="toggleIcon"></i>
        </button>
      </div>

      <!-- Remember Me Checkbox -->
      <div class="d-flex align-items-center justify-content-between mb-4" style="font-size: 0.82rem;">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" style="background-color: rgba(255,255,255,0.1); border-color: rgba(219,162,76,0.4);" />
          <label class="form-check-label text-muted" for="remember">Remember me</label>
        </div>
        <a href="{{ route('visitor.home') }}" class="text-decoration-none" style="color: #dba24c;">&larr; Live Site</a>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-login">
        <span>Sign In</span>
        <i class="bi bi-arrow-right ms-2"></i>
      </button>

      <!-- Quick Test Credentials Reference -->
      {{-- <div class="credentials-box">
        <div class="fw-bold mb-1 text-warning"><i class="bi bi-key me-1"></i>Seed Accounts (Click to autofill):</div>
        <div class="d-flex flex-column gap-1">
          <div class="cred-item d-flex justify-content-between" onclick="fillCred('admin@admin', 'admin')">
            <span><strong>admin@admin</strong> (Role: admin)</span>
            <span class="text-muted">pwd: admin</span>
          </div>
          <div class="cred-item d-flex justify-content-between" onclick="fillCred('store@admin', 'store')">
            <span><strong>store@admin</strong> (Role: store)</span>
            <span class="text-muted">pwd: store</span>
          </div>
          <div class="cred-item d-flex justify-content-between" onclick="fillCred('joshua@admin', 'joshuaNUG24')">
            <span><strong>joshua@admin</strong> (Role: admin)</span>
            <span class="text-muted">pwd: joshuaNUG24</span>
          </div>
        </div>
      </div> --}}

    </form>

  </div>

  <script>
    // Toggle Password Visibility
    const toggleBtn = document.getElementById('togglePassword');
    const pwdInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    toggleBtn.addEventListener('click', function() {
      const type = pwdInput.getAttribute('type') === 'password' ? 'text' : 'password';
      pwdInput.setAttribute('type', type);
      toggleIcon.className = type === 'password' ? 'bi bi-eye text-light' : 'bi bi-eye-slash text-warning';
    });

    // Helper autofill for testing
    function fillCred(email, pwd) {
      document.getElementById('email').value = email;
      document.getElementById('password').value = pwd;
    }
  </script>

</body>
</html>
