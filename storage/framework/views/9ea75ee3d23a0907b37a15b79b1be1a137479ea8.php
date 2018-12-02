<?php $__env->startSection('title', 'Quản lý cửa hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav_title', 'Quản lý bán hàng'); ?>
<?php $__env->startSection('sidebar_nav'); ?>
  <li class="nav-item active ">
    <a class="nav-link" href="/restaurant_manager/">
      <i class="material-icons">trending_up</i>
      <p>Doanh số</p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/restaurant_manager/categories">
      <i class="material-icons">view_module</i>
      <p>Loại sản phẩm</p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/restaurant_manager/products">
      <i class="material-icons">local_dining</i>
      <p>Thực đơn</p>
    </a>
  </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>Dữ liệu thống kê</section>
  <div class="row my-5">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">content_copy</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Số đơn hàng</span><br>(trong ngày)</p>
          <h3 class="card-title">435</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-warning">timeline</i>
            <a href="#pablo" class="text-warning ml-1">Thống kê gần đây...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">store</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Doanh thu</span><br>(trong ngày)</p>
          <h3 class="card-title">12.453<br><small><small>(ngàn đồng)</small></small></h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-success">timeline</i>
            <a href="#pablo" class="text-success ml-1">Thống kê gần đây...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">fastfood</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Số món ăn bán ra</span><br>(trong ngày)</p>
          <h3 class="card-title">752</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-info">assessment</i>
            <a href="#pablo" class="text-info ml-1">Thống kê gần đây...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-rose card-header-icon">
          <div class="card-icon">
            <i class="material-icons">favorite</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Lượt thích sản phẩm</span></p>
          <h3 class="card-title">123
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-rose">assessment</i>
            <a href="#pablo" class="text-rose ml-1">Chi tiết...</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-5 chart-placeholder" style="display: none;"></div>
  <section>Dữ liệu chi tiết</section>
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Danh sách đơn hàng</h4>
          <p class="card-category">Thông tin các đơn hàng đã được gửi tới hệ thống</p>
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