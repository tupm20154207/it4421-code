<input type="hidden" name="id" value="{{ $order->id }}">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-body p-0">
          <div class="container">
            <div class="row align-items-center justify-content-center py-3">
              <div class="col-sm-12">
                <span class="text-primary">Tài khoản:</span> {{ $order->user->username }}
              </div>
            </div>
            <div class="row align-items-center justify-content-center py-3">
              <div class="col-sm-12">
                <span class="text-primary">Thời điểm khởi tạo:<br></span> {{ $order->created_at }}
              </div>
            </div>
            <div class="row align-items-center justify-content-center py-3">
              <div class="col-sm-12">
                <span class="text-primary">Trạng thái:</span>
                <span class="order-badge order-{{ $order->state }}">
                  @switch($order->state)
                    @case('pending')
                      Đang chờ
                    @break
                    @case('delivering')
                      Đang giao
                    @break
                    @case('finished')
                      Hoàn tất
                    @break
                    @default
                      Đã hủy
                  @endswitch
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-sm-12">
      <div class="card">
        <div class="card-header-primary text-uppercase text-center">Thông tin giao hàng</div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row py-3">
              <div class="col-sm-5 text-primary">Tên người nhận:</div>
              <div class="col-sm-7">{{ $order->receiver }}</div>
            </div>
            <div class="row py-3">
              <div class="col-sm-5 text-primary">SĐT người nhận:</div>
              <div class="col-sm-7">{{ $order->phonenumber }}</div>
            </div>
            <div class="row py-3">
              <div class="col-sm-5 text-primary">Địa chỉ giao hàng:</div>
              <div class="col-sm-7">{{ $order->delivery_address }}</div>
            </div>
            <div class="row py-3">
              <div class="col-sm-5 text-primary">Thời gian giao hàng:</div>
              <div class="col-sm-7">{{ $order->delivery_time }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header-rose text-uppercase text-center" style="width: 120px">Giỏ hàng</div>
        <div class="card-body" style="max-height: 320px;">
          <table class="table" style="width: 100%">
            <colgroup>
              <col style="width: 40%">
              <col style="width: 10%">
              <col style="width: 30%">
              <col style="width: 20%">
            </colgroup>
            <thead>
            <tr>
              <th class="text-primary">Tên sản phẩm</th>
              <th class="text-primary">#</th>
              <th class="text-primary">Yêu cầu</th>
              <th class="text-primary text-right">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->cart_items as $item)
              <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->requirement }}</td>
                <td class="text-right">{{ $item->subtotal }}</td>
              </tr>
            @endforeach
              <tr>
                <td colspan="3" class="text-success"><b>Tổng tiền</b></td>
                <td class="text-right">{{ $order->total }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>