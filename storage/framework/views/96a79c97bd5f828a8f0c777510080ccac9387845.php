<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(config('app.name', 'Yummy')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
  
  <script src="<?php echo e(asset('assets/js/core/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/core/bootstrap-material-design.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/plugins/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/bootstrap-datetimepicker.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/plugins/nouislider.min.js')); ?>" type="text/javascript"></script>
  <script async defer src="<?php echo e(asset('https://buttons.github.io/buttons.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/material-kit.js?v=2.0.4')); ?>" type="text/javascript"></script>

  <?php echo $__env->yieldContent('page_js'); ?>

  
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('https://use.fontawesome.com/releases/v5.5.0/css/all.css')); ?>" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="<?php echo e(asset('assets/css/material-kit.css?v=2.0.4')); ?>" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <?php echo $__env->yieldContent('page_css'); ?>

</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg rounded-0 <?php echo $__env->yieldContent('navbar_class'); ?>">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <?php echo e(config('app.name', 'Yummy')); ?>

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
          <li class="nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/')); ?>" class="nav-link">Trang chủ</a>
          </li>
          <li class="nav-item <?php echo e(Request::is('about') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/about')); ?>" class="nav-link">Giới thiệu</a>
          </li>
          <li class="nav-item <?php echo e(Request::is('menu') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/menu')); ?>" class="nav-link">Thực đơn</a>
          </li>
          <li class="nav-item <?php echo e(Request::is('contact') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/contact')); ?>" class="nav-link">Liên hệ</a>
          </li>
          <!-- Authentication Links -->
          <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Đăng nhập')); ?></a>
            </li>
            <li class="nav-item">
              <?php if(Route::has('register')): ?>
                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Đăng ký')); ?></a>
              <?php endif; ?>
            </li>
          <?php else: ?>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false" v-pre>
                <span><i class="fa fa-user-circle fa-lg text-capitalize"></i></span>
                <?php echo e(Auth::user()->fullname); ?>

                <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <?php echo e(__('Đăng xuất')); ?>

                </a>
                <a class="dropdown-item" href="/info">
                  <?php echo e(__('Thông tin cá nhân')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
                </form>
              </div>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <?php echo $__env->yieldContent('cover'); ?>
</header>

<main>
  <?php echo $__env->yieldContent('content'); ?>
</main>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<?php echo $__env->yieldContent('custom_script'); ?>
</body>
</html>
