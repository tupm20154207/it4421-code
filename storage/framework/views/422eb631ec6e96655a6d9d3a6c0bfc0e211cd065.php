<?php $__env->startSection('title', 'Giao hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar_class', 'stylish-color'); ?>
<?php $__env->startSection('cover', ''); ?>
<?php $__env->startSection('content'); ?>
  <div class="container mt-2 pt-3">
    <div class="row justify-content-center">
      <h2>Vui lòng nhập các thông tin phục vụ giao hàng</h2>
    </div>
    <div class="row d-flex justify-content-center mt-3">
      <form action="#" method="post">
        <div class="form-group form-inline">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group form-inline">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="row"></div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>