<?php $__env->startSection('title', 'Liên hệ'); ?>
<?php $__env->startSection('page_js'); ?>
  <script type="text/javascript" src="<?php echo e(asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar_class', 'navbar-dark bg-primary'); ?>
<?php $__env->startSection('cover', ''); ?>
<?php $__env->startSection('content'); ?>
  <div id="accordion">

    <div class="card">
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum..
        </div>
      </div>
    </div>
    <div>
      <a class="btn btn-primary text-center mb-0" id="click_link" data-toggle="collapse" data-target="#collapseOne">CART</a>
    </div>
    <div>
      <a class="btn btn-primary text-center mb-0" id="click_button" data-toggle="collapse" data-target="#collapseTwo">ORDER</a>
    </div>
    <div class="card">
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum..
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function(){
      $("#click_link").hide();
      $("#click_button").click(function(){
        $(this).hide();
        $("#click_link").show();
      });
      $("#click_link").click(function(){
        $(this).hide();
        $("#click_button").show();
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>