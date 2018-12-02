<?php $__env->startSection('title', 'Administrator'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
  <link href="<?php echo e(asset('assets/css/datetimepicker.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav_title', 'Tài khoản'); ?>
<?php $__env->startSection('sidebar_nav'); ?>
  <li class="nav-item active  ">
    <a class="nav-link" href="#">
      <i class="material-icons">group</i>
      <p>Tài khoản</p>
    </a>
  </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Tài khoản hoạt động</h4>
          <p class="card-category"> Thông tin các tài khoản hiện đang hoạt động bình thường</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-datatable">
              <thead class=" text-primary">
              <tr>
                <th>Tên người dùng</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Loại tài khoản</th>
                <th>Thao tác</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Dakota Rice</td>
                <td>dakrice</td>
                <td>foo@bar.example.com</td>
                <td>+0122121221</td>
                <td>
                  <div class="form-group">
                    <select class="form-control">
                      <option value="customer" selected>Khách hàng</option>
                      <option value="admin">Quản trị viên</option>
                      <option value="order_manager">QL đơn hàng</option>
                      <option value="restaurant_manager">QL cửa hàng</option>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="row justify-content-left">
                    <div class="col-lg-4 text-center">
                      <span data-toggle="tooltip" data-placement="bottom" title="Khóa tài khoản">
                    <a href="#" class="text-info" data-toggle="modal" data-target="#lock_modal"><i
                          class="fa fa-lock fa-lg"></i></a>
                  </span>
                    </div>
                    <div class="col-lg-4 text-center">
                      <a href="#" class="text-danger" data-toggle="tooltip" data-placement="bottom"
                         title="Xóa tài khoản" onclick="confirm('Xác nhận xóa tài khoản này?')"><i
                            class="fa fa-user-times fa-lg"></i></a>
                    </div>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title ">Tài khoản đã khóa</h4>
          <p class="card-category">Danh sách các tài khoản đã bị khóa</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-datatable">
              <thead class=" text-danger">
              <tr>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thời hạn khóa</th>
                <th>Lý do</th>
                <th>Thao tác</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Dakota Rice</td>
                <td>dakrice</td>
                <td>foo@bar.example.com</td>
                <td>+0122121221</td>
                <td>
                  Spam đặt hàng
                </td>
                <td>
                  <div class="row justify-content-left">
                    <div class="col-lg-4 text-center">
                      <a href="#" class="text-success" data-toggle="tooltip" data-placement="bottom"
                         title="Mở khóa tài khoản" onclick="confirm('Xác nhận mở khóa tài khoản này?')"><i
                            class="fa fa-lock-open fa-lg"></i></a>
                    </div>
                    <div class="col-lg-4 text-center">
                      <a href="#" class="text-danger" data-toggle="tooltip" data-placement="bottom"
                         title="Xóa tài khoản" onclick="confirm('Xác nhận xóa tài khoản này?')"><i
                            class="fa fa-user-times fa-lg"></i></a>
                    </div>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="lock_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">Khóa tài khoản</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <form action="#" class="w-100">

                    <div class="input-group mt-3 mb-5 w-100">
                      <div class="form-group label-floating w-100">
                        <label for="reason" class="control-label">Lý do khóa tài khoản: </label>
                        <textarea id="reason" class="form-control" rows="2"></textarea>
                      </div>
                    </div>

                    <div class="form-check form-check-radio">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="lock_period" id="permanent"
                               value="permanent">
                        Khóa vĩnh viễn
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>

                    <div class="form-check form-check-radio">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="lock_period" id="temporary" value="temporary" checked>
                        Khóa tạm thời
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>

                    <div class="input-group mt-0 mb-3 w-100" id="release_date">
                      <div class="form-group label-floating w-75">
                        <input type="text" class="form-control datetimepicker">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function () {
      $('input[type=radio][name=lock_period]').change(function () {
        if (this.value === 'permanent') {
          $('#release_date').hide('slide');
        } else {
          $('#release_date').show('slide');
        }
      });
      $('.datetimepicker').datetimepicker({
        icons: {
          time: "fa fa-clock",
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
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>