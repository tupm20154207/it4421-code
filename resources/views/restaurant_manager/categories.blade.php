@extends('layouts.admin')

@section('title', 'Quản lý cửa hàng')
@section('page_js')
@endsection
@section('page_css')
@endsection
@section('nav_title', 'Quản lý loại sản phẩm')
@section('sidebar_nav')
  <li class="nav-item">
    <a class="nav-link" href="/restaurant_manager/">
      <i class="material-icons">trending_up</i>
      <p>Doanh số</p>
    </a>
  </li>
  <li class="nav-item active">
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
@endsection
@section('content')
  <div class="row my-5">
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-header card-header-success">
          <div class="d-flex">
            <div class="mr-auto">
              <h4 class="card-title ">Bữa sáng</h4>
            </div>
            <div>
              <a href="#" data-toggle="modal" data-target="#edit_modal" class="text-white"><i class="fa fa-edit fa-lg"></i></a>
            </div>
          </div>
          <p class="card-category">Các món ăn được phục vụ trong bữa sáng.</p>
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
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
              </tr>
              <tr>
                <td>Dakota Rice</td>
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
          <a href="#" data-toggle="modal" data-target="#add_modal"><i class="material-icons">add_box</i> Thêm một loại sản phẩm</a>
        </div>
      </div>
    </div>
  </div>

  <div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">
            Thêm loại sản phẩm
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="card">
              <div class="card-body">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="form-group w-100">
                          <label for="name" class="control-label">Loại sản phẩm: </label>
                          <input type="text" id="name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="form-group w-100">
                          <label for="description" class="control-label">Mô tả: </label>
                          <textarea id="description" class="form-control" rows="2"></textarea>
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
          <div class="ml-auto">
            <button type="submit" class="btn btn-primary" name="button_save">Thêm</button>
          </div>
          <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
        </div>
      </div>
    </div>
  </div>
  <div id="edit_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">
            Thông tin loại sản phẩm
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="card">
              <div class="card-body">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="form-group w-100">
                          <label for="name" class="control-label">Loại sản phẩm: </label>
                          <input type="text" id="name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="form-group w-100">
                          <label for="description" class="control-label">Mô tả: </label>
                          <textarea id="description" class="form-control" rows="2"></textarea>
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
          <div class="ml-auto">
            <button type="submit" class="btn btn-primary" name="button_save" disabled>Lưu thay đổi</button>
          </div>
          <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom_script')
  <script>
    $(document).ready(function () {
      $('#details_modal input').change(function() {
        $('button[name="button_save"]').removeAttr('disabled');
      });
    });
  </script>
@endsection