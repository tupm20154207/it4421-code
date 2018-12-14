<?php $__env->startSection('title', 'Quản lý cửa hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav_title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('sidebar_nav'); ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('sale')); ?>">
      <i class="material-icons">trending_up</i>
      <p>Doanh số</p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('category')); ?>">
      <i class="material-icons">view_module</i>
      <p>Loại sản phẩm</p>
    </a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo e(route('product')); ?>">
      <i class="material-icons">local_dining</i>
      <p>Thực đơn</p>
    </a>
  </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Danh mục sản phẩm</h4>
          <p class="card-category"> Thông tin các món ăn hiện đang được bày bán trên hệ thống</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-datatable">
              <thead class=" text-primary">
              <tr>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Giá bán<br>(nghìn đồng)</th>
                <th>Thao tác</th>
              </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="<?php echo e($product->id); ?>">
                  <td><?php echo e($product->name); ?></td>
                  <td><?php echo e($product->category != NULL ? $product->category->name : ''); ?></td>
                  <td><?php echo e($product->price); ?></td>
                  <td>
                    <a href="#" class="text-success" data-toggle="modal" data-target="#modal_details"><i
                          class="fa fa-info-circle fa-lg"></i> Xem chi tiết ...</a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <a href="#" data-toggle="modal" data-target="#modal_add"><i class="material-icons">add_box</i> Thêm một sản phẩm</a>
        </div>
      </div>
    </div>
  </div>

  
  <div id="modal_details" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="<?php echo e(route('product.update')); ?>" method="post" onsubmit="return confirm('Xác nhận lưu thay đổi?');" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id">
          <div class="modal-header">
            <h4 class="modal-title" id="order_title">
              Chi tiết sản phẩm
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body pb-0">
            <div class="container" id="modal_details_content">
              
            </div>
          </div>
          <div class="modal-footer">
            <div class="mr-auto">
              <a id="product_delete" class="btn btn-danger text-white">Xóa sản phẩm</a>
            </div>
            <div>
              <input type="submit" class="btn btn-primary" id="btn_save" value="Lưu thay đổi" disabled >
            </div>
            <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <div id="modal_add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="<?php echo e(route('product.add')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="modal-header">
            <h4 class="modal-title" id="order_title">
              Thêm sản phẩm
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body pb-0">
            <div class="container">
              <?php echo $add_form_content; ?>

            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <input type="submit" class="btn btn-primary" name="button_save" value="Thêm sản phẩm">
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    function readURL(input, target) {
      if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
          $(target).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

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

      $(document).on('change', 'input[type="file"]', function () {
        readURL(this, '#preview')
      });

      $(document).on('click', 'a[data-target="#modal_details"]', function () {
        let id = $(this).parents('tr').attr('id');
        $('#btn_save').attr('disabled', 'disabled');
        $('#modal_details').find('input[name="id"]').val(id);
        $.post('<?php echo e(route('product.details')); ?>',
          {
            id: id
          },
        function (data) {
          $('#modal_details_content').html(data.content);
        })
      });

      $(document).on('change', '#modal_details :input', function() {
        $('#btn_save').removeAttr('disabled');
      });
      
      $(document).on('click', '#product_delete', function () {
        if(confirm('Xác nhận xóa sản phẩm?')){
          $.post('<?php echo e(route("product.delete")); ?>',
            {
              id: $('#modal_details').find('input[name="id"]').val()
            },
            function () {
              $('#modal_details').modal("hide");
              location.reload()
            })
        }
      });
    });

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>