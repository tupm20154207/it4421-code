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
          <p class="card-category">Thông tin các tài khoản hiện đang hoạt động bình thường</p>
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
              <?php $__currentLoopData = $functional_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="<?php echo e($user->id); ?>">
                  <td><?php echo e($user->fullname); ?></td>
                  <td><?php echo e($user->username); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user->phone); ?></td>
                  <td>
                    <div class="form-group">
                      <select class="form-control">
                        <option value="customer" <?php echo e($user->role === 'customer' ? 'selected' : ''); ?>>Khách hàng</option>
                        <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Quản trị viên</option>
                        <option value="order_manager" <?php echo e($user->role === 'order_manager' ? 'selected' : ''); ?>>QL đơn hàng</option>
                        <option value="restaurant_manager" <?php echo e($user->role === 'restaurant_manager' ? 'selected' : ''); ?>>QL cửa hàng</option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="row justify-content-left">
                      <div class="col-lg-4 text-center">
                        <span data-toggle="tooltip" data-placement="bottom" title="Khóa tài khoản">
                          <a href="#" class="text-info lock-user"><i class="fa fa-lock fa-lg"></i></a>
                        </span>
                      </div>
                      <div class="col-lg-4 text-center">
                        <a href="#" class="text-danger delete-user" data-toggle="tooltip" data-placement="bottom"
                           title="Xóa tài khoản"><i class="fa fa-user-times fa-lg"></i></a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
              <?php $__currentLoopData = $locked_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="<?php echo e($user->id); ?>">
                  <td><?php echo e($user->fullname); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user->phone); ?></td>
                  <td><?php echo e($user->lock->release_date); ?></td>
                  <td><?php echo e($user->lock->message); ?></td>
                  <td>
                    <div class="row justify-content-left">
                      <div class="col-lg-4 text-center">
                        <a href="#" class="text-success unlock-user" data-toggle="tooltip" data-placement="bottom"
                           title="Mở khóa tài khoản"><i
                              class="fa fa-lock-open fa-lg"></i></a>
                      </div>
                      <div class="col-lg-4 text-center">
                        <a href="#" class="text-danger delete-user" data-toggle="tooltip" data-placement="bottom"
                           title="Xóa tài khoản"><i
                              class="fa fa-user-times fa-lg"></i></a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <form action="<?php echo e(route('admin.lock')); ?>" method="post" class="w-100">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="row d-flex justify-content-center">
                      <div class="col-10">
                        <input type="hidden" name="id">
                        <div class="input-group mt-3 mb-5">
                          <div class="form-group label-floating w-100">
                            <label for="reason" class="control-label">Lý do khóa tài khoản: </label>
                            <textarea id="reason" name="reason" class="form-control" rows="3" required autofocus></textarea>
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
                           <div class="input-group">
                             <div class="input-group-prepend">
                              <span class="input-group-text pl-0">
                                <i class="fa fa-calendar-alt text-primary"></i>
                              </span>
                             </div>
                             <input type="text" name="release_date" class="form-control datetimepicker">
                           </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" value="Xác nhận">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function () {
      $('.table-datatable').DataTable({
        "language": {
          "decimal": "",
          "emptyTable": "Không có dữ liệu",
          "info": "Trang _PAGE_ trên tổng số _PAGES_ trang",
          "infoEmpty": "Trang 0 trên tổng số 0 trang",
          "infoFiltered": "(Lọc từ _MAX_ bản ghi)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Số dòng hiển thị trên bảng: _MENU_",
          "loadingRecords": "Đang tải...",
          "processing": "Đang xử lý...",
          "search": "Tìm kiếm:",
          "zeroRecords": "Không thấy kết quả",
          "paginate": {
            "first": "Trang đầu",
            "last": "Trang cuối",
            "next": "Trang tiếp",
            "previous": "Trang trước"
          },
          "aria": {
            "sortAscending": ": Sắp xếp cột theo chiều tăng dần",
            "sortDescending": ": Sắp xếp cột theo chiều giảm dần"
          }
        }
      });

      $(document).on('change', 'input[type="radio"][name="lock_period"]', function() {
        if (this.value === 'permanent') {
          $('#release_date').removeAttr('required').hide('slide');
        } else {
          $('#release_date').show('slide').attr('required', 'required');
        }
      });

      $(document).on('change', 'select', function () {
        $.post('<?php echo e(route("admin.update_role")); ?>',
          {
            id: $(this).parents("tr").attr('id'),
            role: $(this).val()
          });
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

      $(document).on('click', '.lock-user', function () {
        let modal = $("#lock_modal");
        modal.find("input[type='hidden']").attr('value', $(this).parents("tr").attr('id'));
        modal.modal();
      });

      $(document).on('click', '.delete-user', function () {
        if (confirm('Xác nhận xóa tài khoản này?') === true){
          $.post('<?php echo e(route("admin.delete")); ?>',  { id: $(this).parents("tr").attr('id') });
          location.reload(true);
        }
      });

      $(document).on('click', '.unlock-user', function () {
        if (confirm('Xác nhận mở khóa tài khoản này?') === true){
          $.post('<?php echo e(route("admin.unlock")); ?>',  { id: $(this).parents("tr").attr('id') });
          location.reload(true);
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>