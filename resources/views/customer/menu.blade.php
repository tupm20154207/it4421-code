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
    <hr>
    {{-- Categories --}}
    <div class="row justify-content-center">
      <div class="col-md-10">
        <ul class="nav nav-pills mb-3 justify-content-center align-items-center" id="pills-tab" role="tablist">

          @foreach($categories as $category)
            <li class="nav-item">
              <a class="nav-link {{ $category->name == $active_category ? 'active':''}}" name="{{ $category->name }}" id="pills-{{$category->name}}-tab" href="/menu/{{ $category->name }}" role="tab"
                 aria-controls="pills-{{$category->name}}" aria-selected="true">{{$category->name}}</a>
            </li>
          @endforeach

          <li class="nav-item ml-3">
            <form action="{{ route('menu.search') }}" method="GET" class="navbar-form mb-0" id="search_form">
              @csrf
              <div class="input-group" style="width: 150px">
                <input type="text" name="query" class="form-control mw-100 p-0" value="" placeholder="Tìm kiếm...">
                <button href="#search" type="submit" class="btn btn-white btn-round btn-just-icon m-0">
                  <i class="material-icons md-primary p-0">search</i>
                </button>
              </div>
            </form>
          </li>

        </ul>
      </div>
    </div>
    {{-- Items per category --}}
    <div class="row" id="item_grid">
      {!! $item_grid !!}
    </div>
  </div>
  <hr>

  <div class="d-flex justify-content-center my-5">
    <a class="btn btn-primary btn-lg text-white" id="show_cart">Xem giỏ hàng<i
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
          <div class="container" id="details_modal_content">
            {{-- Content --}}
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary mr-2" name="btn_confirm">Xác nhận</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Cart modal--}}
  <div id="cart_modal" class="modal fade" role="dialog"></div>
@endsection
@section('custom_script')
  <script type="text/javascript">
    $(document).ready(function () {

      // Bắt sự kiện 'click' trên nút 'Thêm vào giỏ hàng'
      $(document).on('click', "#item_grid .btn-details", function () {
        let details_modal = $("#details_modal");
        let id = $(this).parent().attr("id");
        $.post("{{ route('item.show') }}",
          {
            id: id
          },
          function(data){
            $('#details_modal_content').html(data.info);
            details_modal.modal();
          });
      });

      // Bắt sự kiện trên nút xác nhận thêm sản phẩm vào giỏ hàng
      $(document).on('click', "#details_modal button[name='btn_confirm']", function () {
        let details_modal = $("#details_modal");
        let id = details_modal.find('input[name="id"]').val();
        let quantity = details_modal.find("#item_quantity").val();
        let requirement = details_modal.find("#item_requirement").val();
        details_modal.modal("hide");
        $.post("{{ route('item.add') }}",
          {
            id: id,
            quantity: quantity,
            requirement: requirement
          });
        showNotification('Thêm sản phẩm vào giỏ hàng thành công', 'success');
      });

      // Bắt sự kiện 'click' nút 'Thích'
      $(document).on('click', ".item-like", function () {
        let like_btn = $(this);
        if ($(this).hasClass("clicked")) {
          $(this).removeClass("clicked");
          $.post("{{ route('item.unlike') }}",
            {
              id: $(this).parent().attr("id")
            },
            function (data) {
              like_btn.html("<i class=\"material-icons\">favorite_border</i> &times; "+data.likes);
            });
        }
        else {
          $(this).addClass("clicked");
          $.post("{{ route('item.like') }}",
            {
              id: $(this).parent().attr("id")
            },
            function (data) {
              like_btn.html("<i class=\"material-icons\">favorite</i> &times; "+data.likes);
            });
        }
      });

      // Bắt sự kiện 'click' cho nút 'Xem giỏ hàng'
      $(document).on('click', "#show_cart", function () {
        let cart_modal = $("#cart_modal");
        $.post("{{ route('cart.show') }}",
          {},
          function(data){
            cart_modal.html(data.cart).modal();
            $(".datetimepicker").datetimepicker({
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
            $("#confirm_change").hide();
            $("#cart_toggle").hide();
          });
      });

      // Bắt sự kiện 'click' cho nút 'Đặt hàng' trong giỏ hàng
      $(document).on('click', "#cart_modal #order_toggle", function () {
        let cart_modal = $("#cart_modal");
        if (cart_modal.find("#confirm_change").is(":visible")){
          $("#confirm_change").click();
        }
        $(this).hide();
        cart_modal.find("#confirm_change").hide();
        cart_modal.find("#cart_toggle").show();
        cart_modal.find("#order_title").text('Thông tin giao hàng');
      });

      // Bắt sự kiện click nút 'Quay lại giỏ hàng'
      $(document).on('click', "#cart_modal #cart_toggle", function () {
        let cart_modal = $("#cart_modal");
        $(this).hide();
        cart_modal.find("#order_toggle").show();
        cart_modal.find("#order_title").text('Giỏ hàng');
      });

      // Bắt sự kiện click nút xóa một sản phẩm trong giỏ hàng
      $(document).on('click', "#cart_modal .item-delete", function () {
        let cart_modal = $("#cart_modal");
        let subtotal = Number.parseFloat($(this).parent().siblings('.item-subtotal').text());
        let total = Number.parseFloat(cart_modal.find(".cart-total").text());
        cart_modal.find(".cart-total").text(total - subtotal);
        $(this).parent().parent().remove();
        if (cart_modal.find("table tbody tr[class='cart-item']").length === 0){
          cart_modal.find("#order_toggle").prop('disabled', true);
        }
        cart_modal.find("#confirm_change").show();
      });

      // Bắt sự kiện thay đổi trong mục 'Yêu cầu' cho sản phẩm
      $(document).on('keyup', "#cart_modal textarea", function () {
        $("#cart_modal").find("#confirm_change").show();
      });

      // Bắt sự kiện giảm số lượng sản phẩm trong giỏ hàng
      $(document).on('click', "#cart_modal a[data-type='minus']", function () {
        let cart_modal = $("#cart_modal");
        let qty = $(this).siblings('.item-qty');
        let old_val = Number.parseInt(qty.text());
        if (old_val > 1){
          let new_val = old_val - 1;
          let price = Number.parseFloat($(this).parent().siblings(".item-price").text());
          let old_total = Number.parseFloat(cart_modal.find(".cart-total").text());

          qty.text(new_val);
          $(this).parent().siblings(".item-subtotal").text(new_val * price);
          cart_modal.find(".cart-total").text(old_total - price);
          cart_modal.find("#confirm_change").show();
        }
      });

      // Bắt sự kiện tăng số lượng sản phẩm trong giỏ hàng
      $(document).on('click', "#cart_modal a[data-type='plus']", function () {
        let cart_modal = $("#cart_modal");
        let qty = $(this).siblings('.item-qty');
        let old_val = Number.parseInt(qty.text());
        if (old_val < 99){
          let new_val = old_val + 1;
          let price = Number.parseFloat($(this).parent().siblings(".item-price").text());
          let old_total = Number.parseFloat(cart_modal.find(".cart-total").text());

          qty.text(new_val);
          $(this).parent().siblings(".item-subtotal").text(new_val * price);
          cart_modal.find(".cart-total").text(old_total + price);
          cart_modal.find("#confirm_change").show();
        }
      });

      // Bắt sự kiện xác nhận thay đổi trong giỏ hàng
      $(document).on('click', "#cart_modal #confirm_change", function () {
        let cart_modal = $("#cart_modal");
        let rows = [];
        cart_modal.find("table tbody tr[class='cart-item']").each(function () {
          let row = {
            id: $(this).attr('id'),
            requirement: $(this).find('textarea').val(),
            qty: $(this).find('.item-qty').text(),
          };
          rows.push(row);
        });
        console.log(rows);
        $.post('{{ route("cart.save") }}', {data: rows});
        $(this).hide();
      });

      // Nhấn Esc để thoát modal
      $(document).keydown(function(event) {
        if (event.keyCode === 27) {
          $('.modal').modal('hide');
        }
      });

      // Thông báo yêu cầu đăng nhập
      function login_required(){
        alert('Bạn cần đăng nhập để tiếp tục thực hiện chức năng này');
      }

    });
  </script>
@endsection