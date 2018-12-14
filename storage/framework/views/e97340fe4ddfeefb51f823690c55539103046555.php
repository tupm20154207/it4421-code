<?php $__env->startSection('title', 'Quản lý cửa hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav_title', 'Quản lý loại sản phẩm'); ?>
<?php $__env->startSection('sidebar_nav'); ?>
  <li class="nav-item ">
    <a class="nav-link" href="<?php echo e(route('sale')); ?>">
      <i class="material-icons">trending_up</i>
      <p>Doanh số</p>
    </a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo e(route('category')); ?>">
      <i class="material-icons">view_module</i>
      <p>Loại sản phẩm</p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('product')); ?>">
      <i class="material-icons">local_dining</i>
      <p>Thực đơn</p>
    </a>
  </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="row my-5">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-header card-header-success">
            <div class="d-flex">
              <div class="mr-auto">
                <h4 class="card-title "><?php echo e($category->name); ?></h4>
              </div>
              <div>
                <a href="#" id="<?php echo e($category->id); ?>" data-toggle="modal" data-target="#edit_modal" class="text-white"><i class="fa fa-edit fa-lg"></i></a>
              </div>
            </div>
            <p class="card-category"><?php echo e($category->description); ?></p>
          </div>
          <div class="card-body" style="height: 300px;">
            <div class="table-responsive mh-100">
              <table class="table table-hover">
                <thead class=" text-primary">
                <tr>
                  <th>Tên sản phẩm</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($product->name); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <a href="#" id="toggle_add_modal" data-toggle="modal" data-target="#add_modal"><i class="material-icons">add_box</i> Thêm một loại sản phẩm</a>
        </div>
      </div>
    </div>
  </div>

  <div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo e(route('category.add')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="modal-header">
            <h4 class="modal-title" id="order_title">
              Thêm loại sản phẩm
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body pb-0">
              <div class="card">
                <div class="card-body">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-sm-10 my-3 ">
                        <div class="input-group">
                          <div class="form-group w-100">
                            <label for="name" class="control-label">Loại sản phẩm: </label>
                            <input type="text" id="name" name="name" class="form-control" required autofocus>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-10 my-3">
                        <div class="input-group">
                          <div class="form-group w-100">
                            <label for="description" class="control-label">Mô tả: </label>
                            <textarea id="description" name="description" class="form-control" rows="2" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer py-0">
            <input type="submit" class="btn btn-primary ml-auto" name="button_save" value="Thêm">
            <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="edit_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo e(route('category.update')); ?>" method="post">
          <?php echo csrf_field(); ?>
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">
            Thông tin loại sản phẩm
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body pb-0">
            <input type="hidden" name="id">
            <div class="card">
              <div class="card-body">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-sm-10 my-3">
                      <div class="input-group">
                        <div class="form-group w-100">
                          <label for="name" class="control-label">Loại sản phẩm: </label>
                          <input type="text" id="name" name="name" class="form-control" required autofocus>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10 my-3">
                      <div class="input-group">
                        <div class="form-group w-100">
                          <label for="description" class="control-label">Mô tả: </label>
                          <textarea id="description" name="description" class="form-control" rows="2" required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer py-0">
            <div class="mr-auto">
              <a class="btn btn-danger text-white" id="category_delete">Xóa</a>
            </div>
            <div>
              <input type="submit" id="edit_submit" class="btn btn-primary" disabled value="Lưu thay đổi" onsubmit="return confirm('Xác nhận lưu thay đổi?');">
            </div>
            <div>
              <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function () {

      $(document).on('click', 'a[data-target="#edit_modal"]', function(){
        let id = $(this).attr('id');
        $('#edit_modal').find('input[name="id"]').val(id);
        $.post('<?php echo e(route("category.details")); ?>',
          {
            id: id
          },
          function (data) {
            $('#edit_modal').find('input[name="name"]').val(data.name);
            $('#edit_modal').find('textarea[name="description"]').text(data.description);
          });
      });

      $(document).on('input', '#edit_modal :input', function() {
        $('#edit_submit').removeAttr('disabled');
      });

      $(document).on('click', '#category_delete', function () {
        if(confirm('Xác nhận xóa loại sản phẩm?')){
          $.post('<?php echo e(route("category.delete")); ?>',
            {
              id: $('#edit_modal').find('input[name="id"]').val()
            },
          ).done(function () {
            location.reload();
            showNotification('Xóa loại sản phẩm thành công.', 'danger');
          }).fail(function () {
            alert('Vui lòng làm trống danh sách sản phẩm trước khi xóa loại sản phẩm!');
          });
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>