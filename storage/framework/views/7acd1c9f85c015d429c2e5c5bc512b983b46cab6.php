<?php $__env->startSection('navbar_class', 'navbar-dark bg-primary'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container pt-5 mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card">
          <div class="card-header card-header-primary text-uppercase text-lg-center"><?php echo e(__('Đăng ký tài khoản')); ?></div>

          <div class="card-body">
            <form method="POST" action="<?php echo e(route('register')); ?>">
              <?php echo csrf_field(); ?>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input id="fullname" type="text" class="form-control<?php echo e($errors->has('fullname') ? ' is-invalid' : ''); ?>" name="fullname" value="<?php echo e(old('fullname')); ?>" placeholder="Họ và tên..." required autofocus>
                    <?php if($errors->has('fullname')): ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('fullname')); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">account_circle</i>
                      </span>
                    </div>
                    <input id="username" type="text" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" placeholder="Tài khoản..." required>
                    <?php if($errors->has('username')): ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock</i>
                      </span>
                    </div>
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Mật khẩu..." required>
                    <?php if($errors->has('password')): ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock</i>
                      </span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Nhập lại mật khẩu..." required>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">phone</i>
                      </span>
                    </div>
                    <input id="phone" type="tel" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="Số điện thoại..." required>
                    <?php if($errors->has('phone')): ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('phone')); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email..." required>
                    <?php if($errors->has('email')): ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                      </span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row d-flex justify-content-center mb-0">
                <div>
                  <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Đăng ký')); ?>

                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>