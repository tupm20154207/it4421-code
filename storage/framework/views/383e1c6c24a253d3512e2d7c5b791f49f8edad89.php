<?php $__env->startSection('navbar_class', 'navbar-dark bg-primary'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container pt-5 mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card">
          <div class="card-header card-header-primary text-uppercase text-lg-center"><?php echo e(__('Đăng nhập')); ?></div>

          <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
              <?php echo csrf_field(); ?>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">account_circle</i>
                      </span>
                    </div>
                    <input id="username" type="text" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" placeholder="Tài khoản..." required autofocus>
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
                  <div class="form-check pl-4">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                      <?php echo e(__('Lưu mật khẩu')); ?>

                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                  </div>
                </div>
              </div>

              <div class="form-group row d-flex justify-content-center mb-0">
                <div>
                  <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Đăng nhập')); ?>

                  </button>
                </div>
              </div>
              <div class="row d-flex justify-content-center align-items-center mt-2">
                Chưa có tài khoản?
                <div class="ml-2">
                  <a href="/register" class="btn btn-white">
                    <?php echo e(__('Đăng ký')); ?>

                  </a>
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