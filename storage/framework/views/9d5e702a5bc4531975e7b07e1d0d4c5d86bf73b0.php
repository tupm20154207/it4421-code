<?php $__env->startSection('title', 'Giới thiệu'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar_class', 'navbar-dark bg-primary'); ?>
<?php $__env->startSection('cover', ''); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-4">
      <ul class="nav nav-pills nav-pills-rose flex-column">
        <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Options</a></li>
      </ul>
    </div>
    <div class="col-md-8">
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
          <br><br>
          Dramatically visualize customer directed convergence without revolutionary ROI.
        </div>
        <div class="tab-pane" id="tab2">
          Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
          <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
        </div>
        <div class="tab-pane" id="tab3">
          Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
          <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>