<?php $__env->startSection('title', 'Quản lý đơn hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav_title', 'Quản lý đơn hàng'); ?>
<?php $__env->startSection('sidebar_nav'); ?>
  <li class="nav-item active ">
    <a class="nav-link" href="#">
      <i class="material-icons">content_copy</i>
      <p>Đơn hàng</p>
    </a>
  </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Danh sách đơn hàng</h4>
          <p class="card-category">Các đơn hàng mới nhất được cập nhật trong hệ thống</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-datatable">
              <thead class=" text-primary">
              <tr>
                <th>Mã đơn hàng</th>
                <th>Tài khoản</th>
                <th>Cập nhật lúc</th>
                <th>Trạng thái</th>
                <th class="text-right">Tổng giá trị</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="details_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="#">
          <?php echo csrf_field(); ?>
          <div class="modal-header">
            <h4 class="modal-title" id="order_title">
              Chi tiết đơn hàng
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body pb-0" id="details_modal_content">
            
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-info" id="deliver_button">Giao hàng</a>
            <a href="#" class="btn btn-primary" id="finish_button">Hoàn tất</a>
            <a href="#" class="btn btn-danger" id="cancel_button">Hủy đơn hàng</a>
            <a class="btn btn-secondary close d-block" data-dismiss="modal">Đóng</a>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function () {
      let table = $('.table-datatable').DataTable({
        "ajax": "<?php echo route('order_manager.load_table'); ?>",
        "columnDefs": [
          {
            targets: [4],
            className: 'dt-right'
          },
          {
            targets: [5],
            className: 'dt-center'
          }
        ],
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
        },
        "ordering": false
      });

      setInterval( function () {
        table.ajax.reload();
      }, 5000 );

      $(document).on('click', 'a[data-target="#details_modal"]', function () {
        let id = $(this).parents('tr').find('td:first').text();
        $.post('<?php echo e(route('order_manager.details')); ?>',
          {
            id: id
          }, function (data) {
            $('#details_modal_content').html(data.content);
            switch(data.state) {
              case 'pending':
                $('#finish_button').hide();
                break;
              case 'delivering':
                $('#deliver_button').hide();
                break;
              default:
                $('#finish_button').hide();
                $('#deliver_button').hide();
                $('#cancel_button').hide();
            }
          })
      });

      $('#details_modal').on('hidden.bs.modal', function () {
        $('#finish_button').show();
        $('#deliver_button').show();
        $('#cancel_button').show();
      });

      $(document).on('click', '#deliver_button', function () {
        let id = $('#details_modal').find('input[name="id"]').val();
        if (confirm('Xác nhận giao hàng?')){
          $.post('<?php echo e(route("order_manager.deliver")); ?>', {id: id}, function () {
            $('#details_modal').modal("hide");
            table.ajax.reload();
            md.showNotification('Đang giao hàng cho đơn ' + id, 'info');
          });
        }
      });

      $(document).on('click', '#cancel_button', function () {
        let id = $('#details_modal').find('input[name="id"]').val();
        if (confirm('Xác nhận hủy đơn hàng?')){
          $.post('<?php echo e(route("order_manager.cancel")); ?>', {id: id}, function () {
            $('#details_modal').modal("hide");
            table.ajax.reload();
            md.showNotification('Đã hủy đơn hàng ' + id, 'danger');
          });
        }
      });

      $(document).on('click', '#finish_button', function () {
        let id = $('#details_modal').find('input[name="id"]').val();
        if (confirm('Xác nhận hoàn tất đơn hàng?')){
          $.post('<?php echo e(route("order_manager.finish")); ?>', {id: id}, function () {
            $('#details_modal').modal("hide");
            table.ajax.reload();
            md.showNotification('Đã hoàn tất đơn hàng ' + id, 'success');
          });
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>