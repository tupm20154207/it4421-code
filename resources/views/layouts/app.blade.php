<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Yummy') }} - @yield('title')</title>
  {{-- Scripts --}}
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <script async defer src="{{ asset('https://buttons.github.io/buttons.js') }}"></script>
  <script src="{{ asset('assets/js/material-kit.js?v=2.0.4') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
{{--  <script src="{{ asset('js/app.js') }}"></script>--}}
  @yield('page_js')

  {{-- CSS --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}" />
  <link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.5.0/css/all.css') }}" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="{{ asset('assets/css/material-kit.css?v=2.0.4') }}" rel="stylesheet" />
{{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  @yield('page_css')

</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg rounded-0 @yield('navbar_class')">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Yummy') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}" class="nav-link">Trang chủ</a>
          </li>
          <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
            <a href="{{ url('/about') }}" class="nav-link">Giới thiệu</a>
          </li>
          <li class="nav-item {{ Request::is('menu') ? 'active' : '' }}">
            <a href="{{ url('/menu') }}" class="nav-link">Thực đơn</a>
          </li>
          <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
            <a href="{{ url('/contact') }}" class="nav-link">Liên hệ</a>
          </li>
          <!-- Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
            </li>
            <li class="nav-item">
              @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
              @endif
            </li>
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false" v-pre>
                <span><i class="fa fa-user-circle fa-lg text-capitalize"></i></span>
                {{ Auth::user()->fullname }}
                <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Đăng xuất') }}
                </a>
                <a class="dropdown-item" href="{{ route('history') }}">
                  {{ __('Lịch sử mua hàng') }}
                </a>
                <a class="dropdown-item" href="{{ route('info') }}">
                  {{ __('Thông tin cá nhân') }}
                </a>
                <a class="dropdown-item" href="{{ route('password') }}">
                  {{ __('Đổi mật khẩu') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  @yield('cover')
</header>

<main>
  @yield('content')
</main>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function showNotification(message, color) {
    $.notify(message,
      {
        type: color,
        delay: 2000,
        timer: 1000,
        placement: {
          from: 'top',
          align: 'right'
        }
      },
      {
        animate: {
          enter: 'animated fadeInRight',
          exit: 'animated fadeOutRight'
        }
      }
    );
  }
</script>
@yield('custom_script')
</body>
</html>
