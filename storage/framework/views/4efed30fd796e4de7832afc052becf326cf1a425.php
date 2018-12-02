<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/cover_page.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar_class', 'navbar-transparent fixed-top'); ?>
<?php $__env->startSection('cover'); ?>
  <div id="cover_image" class="view">
    <div class="mask rgba-black-strong"></div>
    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="brand text-center" >Welcome</h1>
          <hr>
          <h3 class="title text-center">Come and eat well with our delicious &amp; healthy foods.</h3>
          <p><a href="<?php echo e(url('/menu')); ?>" class="btn btn-lg btn-outline-warning">
              Xem thực đơn
            </a></p>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>