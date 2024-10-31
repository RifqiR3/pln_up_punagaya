<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>

    <link
      rel="icon"
      href="{{ asset('image/pln_title.png') }}"
      type="image/png"
    />
    
    <link rel="stylesheet" href="{{ url('/assets/compiled/css/app.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/compiled/css/app-dark.css') }}" />
    <link rel="stylesheet" href=" {{ url('/assets/compiled/css/auth.css') }} " />
  </head>

  <body>
    <script src="{{ url('assets/static/js/initTheme.js') }}"></script>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
              <a href="#"
                ><img class="w-100 h-100" src="{{ url('/image/punagaya.png') }}" alt="Logo"
              /></a>
            </div>
            <h1 class="auth-title">Registrasi.</h1>
            <p class="auth-subtitle mb-5">
              Buat akun anda di sini, <br> Mohon tunggu hingga admin mengkorfimasi akun anda, setelah akun dibuat.
            </p>

            <form action="{{ route('doRegist') }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- Nama --}}
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  class="form-control form-control-xl @error('nama') is-invalid @enderror"
                  placeholder="Nama"
                  name="nama"
                  value="{{ old('nama') }}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            
              {{-- Email --}}
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="email"
                  class="form-control form-control-xl @error('email') is-invalid @enderror"
                  placeholder="Email"
                  name="email"
                  value="{{ old('email') }}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            
              {{-- Password --}}
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl @error('password') is-invalid @enderror"
                  placeholder="Password"
                  name="password"
                  value="{{ old('password') }}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            
              {{-- Konfirmasi Password --}}
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror"
                  placeholder="Konfirmasi Password"
                  name="password_confirmation"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
                @error('password_confirmation')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            
              <button class="btn btn-primary btn-block btn-lg" type="submit">Daftar</button>
            </form>
            
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-bold">Login</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right">
            <div class="d-flex justify-content-center align-items-end" style="height: 100%">
                <img class="w-100 h-50" src="{{ url('/image/cityilustration.png') }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
