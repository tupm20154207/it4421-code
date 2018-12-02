@extends('layouts.app')

@section('title', 'Thực đơn')
@section('page_js')
@endsection
@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/menu_page.css') }}">
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('content')
  <div class="container mt-2 pt-3">
    {{-- Heading --}}
    <div class="row justify-content-center text-center mb-5">
      <h2 class="display-4">Delicious Menu</h2>
      <div class="row justify-content-center">
        <div class="col-md-7">
          <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
            there live the blind texts.</p>
        </div>
      </div>
    </div>
    {{-- Categories --}}
    <div class="row justify-content-center">
      <div class="col-md-10">
        <ul class="nav nav-pills mb-3 justify-content-center align-items-center" id="pills-tab" role="tablist">
          @foreach($categories as $category)
            <li class="nav-item">
              <a class="nav-link {{ $loop->first ? 'active':''}}" id="pills-{{$category->name}}-tab" data-toggle="pill" href="#pills-{{$category->name}}" role="tab"
                 aria-controls="pills-{{$category->name}}" aria-selected="true">{{$category->name}}</a>
            </li>
          @endforeach
          <li class="nav-item ml-3">
            <form class="navbar-form mb-0" id="search_form">
              <div class="input-group" style="width: 150px">
                <input type="text" name="query" class="form-control mw-100 p-0" value="" placeholder="Tìm kiếm...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon m-0">
                  <i class="material-icons md-primary p-0">search</i>
                </button>
              </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
    {{-- Items per category --}}
    <div class="row">
      <div class="tab-content pt-2 pl-1 w-100" id="pills-tabContent">
        @foreach ($categories as $category)
          <div class="tab-pane fade show {{ $loop->first ? 'active':''}}" id="pills-{{ $category->name }}" role="tabpanel"
               aria-labelledby="pills-{{ $category->name }}-tab">
            <div class="row justify-content-lg-around justify-content-md-center">
              @foreach($category->products as $product)
                <div class="card col-lg-5 col-md-10 my-3">
                  <div class="card-body">
                    <div class="media">
                      <img class="d-flex mr-3 item-image" src="{{ asset($product->url) }}"
                           alt="Generic placeholder image">
                      <div class="media-body">
                        <h5 class="item-heading">{{ $product->name }}</h5>
                        <div class="item-description mb-1">
                          {{ $product->description }}
                        </div>
                        <div class="item-price mb-1">{{ $product->price }}</div>
                        <div class="row">
                          @if(Auth::check())
                            <a href="#" class="btn btn-primary btn-md mr-3" data-toggle="modal" data-target="#details_modal">Thêm vào giỏ hàng</a>
                            <button class="btn btn-white btn-md text-rose btn-like">
                              @if(Auth::user()->likes()->where('product_id', $product->id)->first() != null)
                                <i class="material-icons clicked">favorite</i> Đã thích
                              @else
                                <i class="material-icons">favorite_border</i> Thích
                              @endif
                            </button>
                          @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-md mr-3" onclick="login_required()">Thêm vào giỏ hàng</a>
                            <a href="{{ route('login') }}" class="btn btn-white btn-md text-rose" onclick="login_required()"><i class="material-icons">favorite_border</i> Thích</a>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
        {{-- Search box--}}
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center my-5">
    <a class="btn btn-primary btn-lg text-white" data-toggle="modal" data-target="#cart_modal">Xem giỏ hàng<i
          class="material-icons ml-2">shopping_cart</i></a>
  </div>
  {{-- Details modal --}}
  <div id="details_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lựa chọn yêu cầu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <div class="item-heading">Name</div>
                  <div class="item-description">Thành phần: Xúc xích Peperoni, Thịt dăm bông, Xúc xích Ý, Thịt bò viên,
                    Thịt heo muối
                  </div>
                  <div>
                    <img src="https://dominos.vn/Data/Sites/1/Product/576/singapore.png" class="mw-100" alt="123">
                  </div>
                  <div class="text-center item-price">$123.00</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card">
                <div class="card-body row">
                  <div class="col-sm-4">
                    <div class="input-group">
                      <div class="form-group w-75">
                        <label for="n_items" class="control-label">Số lượng: </label>
                        <input id="n_items" class="form-control text-right" type="number" min="1" max="99" step="1"
                               value="1" onkeydown="return false;">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <div class="form-group w-100">
                        <label for="item_description" class="control-label">Yêu cầu bổ sung: </label>
                        <textarea id="item_description" class="form-control" rows="2"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary mr-2">Xác nhận</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Cart modal--}}
  <div id="cart_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="order_title">Giỏ hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div id="accordion">
              <div class="row collapse show" id="collapse_cart" data-parent="#accordion">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-hover" style="width: 100%">
                      <colgroup>
                        <col style="width: 30%">
                        <col style="width: 30%">
                        <col class="ml-auto" style="width: 15%">
                        <col class="text-right" style="width: 15%">
                        <col style="width: 10%">
                      </colgroup>
                      <thead>
                      <tr>
                        <th>Tên sản phẩm</th>
                        <th>Yêu cầu</th>
                        <th>Số lượng</th>
                        <th class="text-right">Thành tiền</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Gói</td>
                        <td>
                          <textarea class="form-control" rows="2"></textarea>
                        </td>
                        <td>
                          <input class="form-control text-right" type="number" min="1" max="99" step="1" value="1"
                                 onkeydown="return false;">
                        </td>
                        <td class="text-right cart-price">$5</td>
                        <td><a href="#" class="ml-2 item-delete"><i class="material-icons">clear</i></a></td>
                      </tr>
                      <tr>
                        <td>Gói</td>
                        <td>
                          <textarea class="form-control" rows="2"></textarea>
                        </td>
                        <td>
                          <input class="form-control text-right" type="number" min="1" max="99" step="1" value="1"
                                 onkeydown="return false;">
                        </td>
                        <td class="text-right cart-price">$5</td>
                        <td><a href="#" class="ml-2"><i class="material-icons">clear</i></a></td>
                      </tr>
                      <tr>
                        <td>Gói</td>
                        <td>
                          <textarea class="form-control" rows="2"></textarea>
                        </td>
                        <td>
                          <input class="form-control text-right" type="number" min="1" max="99" step="1" value="1"
                                 onkeydown="return false;">
                        </td>
                        <td class="text-right cart-price">$5</td>
                        <td><a href="#" class="ml-2"><i class="material-icons">clear</i></a></td>
                      </tr>
                      <tr>
                        <td colspan="3"><b>Tổng tiền</b></td>
                        <td class="text-right cart-price">$555</td>
                        <td></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <div><a class="btn btn-primary text-white" id="cart_toggle" data-toggle="collapse" data-target="#collapse_cart">Quay lại giỏ hàng</a></div>
                <div><a class="btn btn-primary text-white" id="order_toggle" data-toggle="collapse" data-target="#collapse_delivery">Đặt hàng</a></div>
              </div>
              <div class="row collapse" id="collapse_delivery" data-parent="#accordion">
                <div class="card">
                  <div class="card-body">
                    <div class="container">
                      <div class="row d-flex justify-content-center">

                        <div class="col-lg-8 col-md-10 col-sm-12">
                          <div class="input-group mt-3 mb-5 w-100">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">face</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Tên người nhận...">
                          </div>
                        </div>

                        <div class="col-lg-8 col-md-10 col-sm-12">
                          <div class="input-group mb-5 w-100">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">phone</i>
                              </span>
                            </div>
                            <input type="tel" class="form-control" placeholder="SĐT người nhận...">
                          </div>
                        </div>

                        <div class="col-lg-8 col-md-10 col-sm-12">
                          <div class="input-group mb-5 w-100">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">location_on</i>
                              </span>
                            </div>
                            <input type="tel" class="form-control" placeholder="Địa chỉ giao hàng...">
                          </div>
                        </div>

                        <div class="col-lg-8 col-md-10 col-sm-12">
                          <div class="input-group mb-4 w-100">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">calendar_today</i>
                              </span>
                            </div>
                            <input type="text" class="form-control datetimepicker" placeholder="Thời gian giao hàng...">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="row d-flex justify-content-end">
                  <div><a href="/menu/order" class="btn btn-primary text-white mr-2">Hoàn tất</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom_script')
  <script type="text/javascript">
    $(document).ready(function () {
      $("#cart_toggle").hide();
      $("#order_toggle").click(function () {
        $(this).hide();
        $("#cart_toggle").show();
        $("#order_title").text('Thông tin giao hàng');
      });
      $("#cart_toggle").click(function () {
        $(this).hide();
        $("#order_toggle").show();
        $("#order_title").text('Giỏ hàng');
      });
      $("a[data-target='#cart_modal']").click(function () {
        $("#collapse_cart").collapse("show");
        $("#cart_toggle").hide();
        $("#order_toggle").show();
        $("#order_title").text('Giỏ hàng');
      });
      $(".btn-like").click(function () {
          if ($(this).hasClass("clicked")) {
            $(this).html("<i class=\"material-icons\">favorite_border</i>Thích");
            $(this).removeClass("clicked");
          }
          else {
            $(this).html("<i class=\"material-icons\">favorite</i>Đã thích");
            $(this).addClass("clicked")
          }
        });
      $(".item-delete").click(function () {
        $(this).parent().parent().remove();
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
      $('#search_form').submit(function (event) {
        event.preventDefault();
        let query = $('input[name="query"]').val();
        $.post("{{ route('menu.search') }}",
          {
            query: query
          },
          function(data){
            console.log(data.content);

            $('[class^="pills-"]').removeClass('active');
            $('#pills-tabContent').append(data.content);
          });
      });
    });
    $(document).keydown(function(event) {
      if (event.keyCode === 27) {
        $('.modal').modal('hide');
      }
    });
    function login_required(){
      alert('Bạn cần đăng nhập để tiếp tục thực hiện chức năng này');
    }
  </script>
@endsection