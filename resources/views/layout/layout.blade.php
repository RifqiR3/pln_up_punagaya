<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <link
      rel="icon"
      href="{{ asset('image/pln_title.png') }}"
      type="image/png"
    />

    <link rel="stylesheet" href="{{ url('/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/compiled/css/table-datatable.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/extensions/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/compiled/css/app.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/compiled/css/app-dark.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/compiled/css/iconly.css') }}" />
  </head>

  <body>
    <script src="{{ url('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
      <div id="sidebar">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
              <div class="logo">
                <a href="{{ route('dashboard.submit') }}"
                  ><img
                    src="/image/punagaya.png"
                    alt="Logo"
                    srcset=""
                    class="w-100 h-100"
                /></a>
              </div>
            </div>
          </div>
          @php
            use App\Helpers\NavigationHelper;
            $menuItems = NavigationHelper::getMenuItems();
          @endphp
          <div class="sidebar-menu">
            <ul class="menu">
              @foreach($menuItems as $item)
                @if($item['type'] === 'title' && NavigationHelper::userHasAccess($item))
                    <li class="sidebar-title">{{ $item['title'] }}</li>
                @elseif($item['type'] === 'item' && NavigationHelper::userHasAccess($item))
                    <li class="sidebar-item {{ NavigationHelper::isActive($item['route']) }}">
                      <a href="{{ route($item['route']) }}" class="sidebar-link">
                        <i class="{{ $item['icon'] }}"></i>
                        <span>{{ $item['title'] }}</span>
                      </a>
                    </li>
                @endif
              @endforeach
            </ul>
          </div>
          <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
              <div class="logo">
                <a href="{{ route('dashboard.submit') }}"
                  ><img
                    src="/image/asa.png"
                    alt="Logo"
                    srcset=""
                    class="w-100 h-100"
                /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
        {{-- Content Here --}}
        @yield('content')
    </div>
    <script src="{{ url('/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ url('/assets/compiled/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ url('/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('/assets/static/js/pages/dashboard.js') }}"></script>
    
  </body>
</html>
