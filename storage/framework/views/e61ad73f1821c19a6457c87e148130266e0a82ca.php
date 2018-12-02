<?php $__env->startSection('title', 'Quản lý cửa hàng'); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nav_title', 'Quản lý sản phẩm'); ?>
<?php $__env->startSection('sidebar_nav'); ?>
  <li class="nav-item">
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
  <li class="nav-item active">
    <a class="nav-link" href="/restaurant_manager/products">
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
              <tr>
                <td>Dakota Rice</td>
                <td>dakrice</td>
                <td>55.3</td>
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
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <a href="#" data-toggle="modal" data-target="#add_modal"><i class="material-icons">add_box</i> Thêm một sản phẩm</a>
        </div>
      </div>
    </div>
  </div>

  <div id="details_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">
            Chi tiết sản phẩm
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body pb-0">
          <form action="#">
                <div class="container">
                  <div class="row">
                <div class="col-md-5 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div style="width: 480px; height: 200px; background-color: #757575;"></div>
                        </div>
                        <div class="row mt-3">
                          <span>Cập nhật hình ảnh: </span>
                          <input type="file" name="..." />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="container">
                        <div class="row d-flex justify-content-center">
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="form-group w-100">
                                <label for="name" class="control-label">Tên sản phẩm: </label>
                                <input type="text" id="name" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="form-group w-100">
                                <label for="description" class="control-label">Mô tả: </label>
                                <textarea id="description" class="form-control" rows="2"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="form-group w-50">
                                <label for="price" class="control-label">Giá bán (ngàn đồng): </label>
                                <input id="price" class="form-control text-right" type="number" min="1">
                              </div>
                            </div>
                          </div>
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
          <div class="mr-auto">
            <a href="#" class="btn btn-danger">Xóa sản phẩm</a>
          </div>
          <div>
            <button type="submit" class="btn btn-primary" name="button_save" disabled>Lưu thay đổi</button>
          </div>
          <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
        </div>
      </div>
    </div>
  </div>
  <div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">
            Thêm sản phẩm
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body pb-0">
          <form action="#">
                <div class="container">
                  <div class="row">
                <div class="col-md-5 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div style="width: 480px; height: 200px; background-color: #757575;"></div>
                        </div>
                        <div class="row mt-3">
                          <span>Chọn hình ảnh đại diện: </span>
                          <input type="file" name="..." />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="container">
                        <div class="row d-flex justify-content-center">
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="form-group w-100">
                                <label for="name" class="control-label">Tên sản phẩm: </label>
                                <input type="text" id="name" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="form-group w-100">
                                <label for="description" class="control-label">Mô tả: </label>
                                <textarea id="description" class="form-control" rows="2"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="form-group w-50">
                                <label for="price" class="control-label">Giá bán (nghìn đồng): </label>
                                <input id="price" class="form-control text-right" type="number" min="1">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-primary" name="button_save">Thêm sản phẩm</button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
  <script>
    $(document).ready(function () {
      $('#details_modal input').change(function() {
        $('button[name="button_save"]').removeAttr('disabled');
      });
    });

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>