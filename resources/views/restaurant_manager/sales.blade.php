@extends('layouts.admin')

@section('title', 'Quản lý cửa hàng')
@section('page_js')
  <script src=" {{ asset('js/Chart.js') }}"></script>
@endsection
@section('page_css')
@endsection
@section('nav_title', 'Quản lý bán hàng')
@section('sidebar_nav')
  <li class="nav-item active ">
    <a class="nav-link" href="{{ route('sale') }}">
      <i class="material-icons">trending_up</i>
      <p>Doanh số</p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('category') }}">
      <i class="material-icons">view_module</i>
      <p>Loại sản phẩm</p>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('product') }}">
      <i class="material-icons">local_dining</i>
      <p>Thực đơn</p>
    </a>
  </li>
@endsection
@section('content')
  <section id="sats">Thống kê trong ngày</section>

  <div id="accordion">

  <div class="row mt-5 mb-3">
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">content_copy</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Số đơn hàng</span></p>
          <h3 class="card-title">{{ $today_stats['n_orders'] }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-warning">assessment</i>
            <a href="#stats" data-toggle="collapse" data-target="#chart1" class="text-warning ml-1">Thống kê gần đây...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">fastfood</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Số suất ăn bán ra</span></p>
          <h3 class="card-title">{{ $today_stats['n_portions'] }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-info">assessment</i>
            <a href="#stats" data-toggle="collapse" data-target="#chart2" class="text-info ml-1">Thống kê gần đây...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">store</i>
          </div>
          <p class="card-category"><span class="text-uppercase">Doanh thu</span></p>
          <h3 class="card-title">{{ $today_stats['income'] }}</h3>
          <p class="card-title">(ngàn đồng)</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-success">timeline</i>
            <a href="#stats" data-toggle="collapse" data-target="#chart3" class="text-success ml-1">Thống kê gần đây...</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-3 d-flex justify-content-center">

    <div class="col-lg-8 col-md-10 col-sm-12 collapse" data-parent="#accordion" id="chart1">
      <div class="card">
        <div class="card-body">
          <canvas id="chart1_canvas" width="300" height="175"></canvas>
        </div>
      </div>
    </div>

    <div class="col-lg-8 col-md-10 col-sm-12 collapse" data-parent="#accordion" id="chart2">
      <div class="card">
        <div class="card-body">
          <canvas id="chart2_canvas" width="300" height="175"></canvas>
        </div>
      </div>
    </div>

    <div class="col-lg-8 col-md-10 col-sm-12 collapse" data-parent="#accordion" id="chart3">
      <div class="card">
        <div class="card-body">
          <canvas id="chart3_canvas" width="300" height="175"></canvas>
        </div>
      </div>
    </div>
  </div>

  </div>

  <section id="section_details">Dữ liệu chi tiết</section>
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
              @foreach($orders as $order)
                <tr id="{{ $order->id }}">
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user->username }}</td>
                  <td>{{ $order->created_at }}</td>
                  <td><span class="order-badge order-{{ $order->state }}">{{ $order->state }}</span></td>
                  <td>{{ $order->total }}</td>
                  <td>
                    <a href="#section_details" class="text-success order-details"><i class="fa fa-info-circle fa-lg"></i> Xem chi tiết ...</a>
                  </td>
                </tr>
              @endforeach
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
          <div class="container" id="modal_content">
            {{-- Content here --}}
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-secondary close d-block" data-dismiss="modal">Hủy</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom_script')
  <script>
    let stats = @json($stats);
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
      let labels = Object.keys(stats);
      $(document).on('click', '.order-details', function () {
        $.post('{{ route("sale.details") }}',
          {
            id: $(this).parents('tr').attr('id')
          },
          function (data) {
            $('#modal_content').html(data.content);
            $('#details_modal').modal("show");
          });
      });
      // Khởi tạo chart 1
      $(document).on('show.bs.collapse', '#chart1', function () {
        let  ctx = $("#chart1_canvas");
        let data = [];
        for (i in stats){
          data.push(stats[i]['n_orders']);
        }
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Số đơn hàng hoàn tất',
              data: data,
              borderColor: '#fb8c00',
              backgroundColor: '#ffa726',
              borderWidth: 1,
            }]
          },
        });
      });
      // Khởi tạo chart 2
      $(document).on('show.bs.collapse', '#chart2', function () {
        let ctx = $("#chart2_canvas");
        let data = [];
        for (i in stats){
          data.push(stats[i]['n_portions']);
        }
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Số suất ăn bán ra',
              data: data,
              borderColor: '#00acc1',
              backgroundColor: '#26c6da',
              borderWidth: 1,
            }]
          },
        });
      });
      // Khởi tạo chart 3
      $(document).on('show.bs.collapse', '#chart3', function () {
        let ctx = $("#chart3_canvas");
        let data = [];
        for (i in stats){
          data.push(stats[i]['income']);
        }
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Doanh thu',
              data: data,
              borderColor: '#66bb6a',
              borderWidth: 2,
              lineTension: 0,
            }]
          },
        });
      });
    });
  </script>
@endsection