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
                      <col style="width: 25%">
                      <col style="width: 25%">
                      <col style="width: 15%">
                      <col style="width: 15%">
                      <col style="width: 15%">
                      <col style="width: 5%">
                    </colgroup>
                    <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Yêu cầu</th>
                      <th class="text-right">Số lượng</th>
                      <th class="text-right">Đơn giá</th>
                      <th class="text-right">Thành tiền</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                      <tr id="{{ $item->rowId }}" class="cart-item">
                        <td>{{ $item->name }}</td>
                        <td>
                          <textarea class="form-control" rows="2">{{ $item->options->requirement }}</textarea>
                        </td>
                        <td class="text-right">
                          <a class="text-danger" data-type="minus">
                            <span class="fa fa-minus-circle"></span>
                          </a>
                          <span class="text-right item-qty" style="width: 4ch;">{{ $item->qty }}</span>
                          <a class="text-success" data-type="plus">
                            <span class="fa fa-plus-circle"></span>
                          </a>
                        </td>
                        <td class="text-right cart-price item-price">{{ $item->price }}</td>
                        <td class="text-right cart-price item-subtotal">{{ $item->subtotal }}</td>
                        <td><a class="ml-2 item-delete text-primary"><i class="fa fa-times fa-lg"></i></a></td>
                      </tr>
                    @endforeach

                    <tr>
                      <td colspan="4"><b>Tổng tiền</b></td>
                      <td class="text-right cart-price cart-total">{{ $total }}</td>
                      <td></td>
                    </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <div><button class="btn btn-primary text-white" id="cart_toggle" data-toggle="collapse" data-target="#collapse_cart">Quay lại giỏ hàng</button></div>
            <div><button class="btn btn-primary text-white" id="order_toggle" data-toggle="collapse" data-target="#collapse_delivery" {{ $items->isEmpty() ? 'disabled' : '' }}>Đặt hàng</button></div>
            <div class="ml-3"><button class="btn btn-info" id="confirm_change">Lưu</button></div>
          </div>
          <div class="row collapse" id="collapse_delivery" data-parent="#accordion">
            <form action="{{ route('cart.order') }}" method="post" class="w-100 delivery-form mb-0">
              @csrf
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
                          <input type="text" class="form-control" name="name" placeholder="Tên người nhận..." required>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="input-group mb-5 w-100">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">phone</i>
                              </span>
                          </div>
                          <input type="tel" class="form-control" name="phone" placeholder="SĐT người nhận..." required>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="input-group mb-5 w-100">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">location_on</i>
                              </span>
                          </div>
                          <input type="tel" class="form-control" name="address" placeholder="Địa chỉ giao hàng..." required>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="input-group mb-4 w-100">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">calendar_today</i>
                              </span>
                          </div>
                          <input type="text" class="form-control datetimepicker" name="time" placeholder="Thời gian giao hàng..." required>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-end">
                <input class="btn btn-primary mr-2" type="submit" value="Hoàn tất">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>