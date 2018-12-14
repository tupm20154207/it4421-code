<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body p-0">
        <div class="container">
          <div class="row">
            <div class="col-md-4 py-lg-3 py-sm-1">
              <span class="text-primary mb-2">Tài khoản đặt hàng:</span>
              <span><br>{{ $order->user->username }}</span>
            </div>
            <div class="col-md-4 py-lg-3 py-sm-1">
              <span class="text-primary mb-2">Thời điểm tạo đơn hàng:</span>
              <span><br>{{ $order->created_at }}</span>
            </div>
            <div class="col-md-4 py-lg-3 py-sm-1">
              <span class="text-primary mb-2">Trạng thái đơn hàng:</span>
              <span class="order-badge order-{{ $order->state }}"><br>{{ $order->state }}</span>
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
          @foreach($order->cart_items as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td class="text-right">{{ $item->price }}</td>
              <td class="text-right">{{ $item->subtotal }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="2" class="text-success"><b>Tổng tiền</b></td>
            <td class="text-right">{{ $order->total }}</td>
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
            <div class="col-sm-6">{{ $order->receiver }}</div>
          </div>
          <div class="row py-3">
            <div class="col-sm-6 text-primary">SĐT người nhận:</div>
            <div class="col-sm-6">{{ $order->phonenumber }}</div>
          </div>
          <div class="row py-3">
            <div class="col-sm-6 text-primary">Địa chỉ giao hàng:</div>
            <div class="col-sm-6">{{ $order->delivery_address }}</div>
          </div>
          <div class="row py-3">
            <div class="col-sm-6 text-primary">Thời gian giao hàng:</div>
            <div class="col-sm-6">{{ $order->delivery_time }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>