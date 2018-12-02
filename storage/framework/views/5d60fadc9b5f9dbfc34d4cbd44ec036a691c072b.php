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
                <th>Thời gian</th>
                <th>Trạng thái</th>
                <th>Tổng giá trị</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>123</td>
                <td>dakrice</td>
                <td>12/12/12</td>
                <td><span class="order-badge order-finished">Hoàn tất</span></td>
                <td>1,250.00</td>
                <td>
                  <a href="#" class="text-success" data-toggle="modal" data-target="#details_modal"><i
                        class="fa fa-info-circle fa-lg"></i> Xem chi tiết ...</a>
                </td>
              </tr>
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
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">
            Chi tiết đơn hàng
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body pb-0">
          <form action="#">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-4 py-lg-3 py-sm-1">
                            <span class="text-primary mb-2">Tài khoản đặt hàng:</span>
                            <span><br>dakrice</span>
                          </div>
                          <div class="col-md-4 py-lg-3 py-sm-1">
                            <span class="text-primary mb-2">Thời điểm tạo đơn hàng:</span>
                            <span><br>12/12/2018 12:58 PM</span>
                          </div>
                          <div class="col-md-4 py-lg-3 py-sm-1">
                            <span class="text-primary mb-2">Trạng thái đơn hàng:</span>
                            <span class="order-badge order-finished"><br>Hoàn tất</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-body" style="max-height: 320px;">
                      <table class="table" style="width: 100%">
                        <colgroup>
                          <col style="width: 40%">
                          <col style="width: 30%">
                          <col style="width: 30%">
                        </colgroup>
                        <thead>
                        <tr>
                          <th class="text-primary" style="font-size: 15px;">Tên sản phẩm</th>
                          <th class="text-primary text-right" style="font-size: 15px;">Số lượng</th>
                          <th  class="text-primary text-right" style="font-size: 15px;">Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Gói mì hảo hảo</td>
                          <td class="text-right">3</td>
                          <td class="text-right">$15</td>
                        </tr>
                        <tr>
                          <td colspan="2" class="text-success"><b>Tổng tiền</b></td>
                          <td class="text-right">$555</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="container-fluid">
                        <div class="row py-3">
                          <div class="col-sm-6 text-primary">Tên người nhận:</div>
                          <div class="col-sm-6">tu pham</div>
                        </div>
                        <div class="row py-3">
                          <div class="col-sm-6 text-primary">SĐT người nhận:</div>
                          <div class="col-sm-6">012123123</div>
                        </div>
                        <div class="row py-3">
                          <div class="col-sm-6 text-primary">Địa chỉ giao hàng:</div>
                          <div class="col-sm-6">01 Đại Cồ Việt</div>
                        </div>
                        <div class="row py-3">
                          <div class="col-sm-6 text-primary">Thời gian giao hàng:</div>
                          <div class="col-sm-6">12/12/2018 12:12 PM</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function () {

    });

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>