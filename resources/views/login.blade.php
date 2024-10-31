<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    
    <link
      rel="icon"
      href="{{ asset('image/pln_title.png') }}"
      type="image/png"
    />

    <link rel="stylesheet" href="{{ url('/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
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
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">
              Silahkan Login.
            </p>

            <form action="{{ route('doLogin') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="email"
                  class="form-control form-control-xl"
                  placeholder="Email"
                  name="email"
                />
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  placeholder="Password"
                  name="password"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Log in
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-bold">Daftar</a>.
              </p>
              {{-- <p>
                <a class="font-bold" href="auth-forgot-password.html"
                  >Forgot password?</a
                >
              </p> --}}
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

  <script src="{{ url('/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ url('/assets/static/js/pages/sweetalert2.js') }}"></script>

  @if (session()->has('error'))
    <script>
        Swal.fire({
          toast: true,
          position: "top-middle",
          icon: "error",
          title: "{{ session()->get('error') }}",
          showConfirmButton: false,
          timer: 2500
        })
    </script>
  @endif

  @if (session()->has('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{session()->get('success')}}",
            icon: "success"
        });
    </script>
  @endif
</html>
