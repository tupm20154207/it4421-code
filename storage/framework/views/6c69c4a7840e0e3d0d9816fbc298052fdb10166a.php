<?php $__env->startSection('title', 'Giao hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/payment_page.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar_class', 'navbar-dark bg-dark'); ?>
<?php $__env->startSection('cover', ''); ?>
<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8" style="z-index: 3;">
        <div class="wizard-container">
          <div class="card wizard-card">
            <form action="#" method="post">
              <div class="wizard-header">
                <div class="wizard-title">Đặt hàng</div>
              </div>
              <div>
                <ul class="nav nav-pills justify-content-center">
                  <li class="nav-item"><a class="nav-link active" href="#delivery" data-toggle="tab">Giao hàng</a></li>
                  <li class="nav-item"><a class="nav-link" href="#payment" data-toggle="tab">Thanh toán</a></li>
                  <li class="nav-item"><a class="nav-link" href="#finished" data-toggle="tab">Hoàn tất</a></li>
                </ul>
              </div>
              <div class="tab-content tab-space">
                <div class="tab-pane active" id="delivery">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="info-text">Hãy cho chúng tôi biết cách thức giao hàng đến cho bạn</h4>
                    </div>
                  </div>
                  <div class="row mx-2">
                    <div class="col-md-6 col-sm-12">
                      <div class="input-group mb-3 w-100">
                        <span class="input-group-addon">
                          <i class="material-icons">person</i>
                        </span>
                        <div class="form-group label-floating w-100">
                          <label for="rname" class="control-label">Tên người nhận</label>
                          <input id="rname" name="name" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="input-group mb-3 w-100">
                        <span class="input-group-addon">
                          <i class="material-icons">person</i>
                        </span>
                        <div class="form-group label-floating w-100">
                          <label for="rtel" class="control-label">SĐT người nhận</label>
                          <input id="rtel" name="name" type="tel" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="input-group mb-3 w-100">
                        <span class="input-group-addon">
                          <i class="material-icons">person</i>
                        </span>
                        <div class="form-group label-floating w-100">
                          <label for="radd" class="control-label">Địa chỉ giao hàng</label>
                          <input id="radd" name="name" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="input-group mb-3 w-100">
                        <span class="input-group-addon">
                          <i class="material-icons">person</i>
                        </span>
                        <div class="form-group label-floating w-100">
                          <label for="rtime" class="control-label">Thời gian giao hàng</label>
                          <input id="rtime" name="name" type="tel" class="form-control datetimepicker">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="payment"></div>
                <div class="tab-pane" id="finished"></div>
              </div>
              <div class="row d-flex justify-content-around wizard-footer">
                <div class="col-6">
                  <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                </div>
                <div class="col-6">
                  <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                  <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
          </div>
        </div> <!-- wizard container -->
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $('.datetimepicker').datetimepicker({
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>