

<div class="container">
  <div class="row my-5  ">
    <div class="card" id="progress">
      <div class="card-header card-header-primary text-uppercase text-lg-center" style="width: 150px;">Trạng thái</div>
      <div class="card-body px-0">
        <div class="row py-5">
          <div class="container" style="z-index: 99;">
            @isset($active)
              <ul class="steps-bar" style="padding-left: 0;">
                <li class="active created">Tạo đơn hàng<br><small>{{ $active->created_at }}</small></li>
                @if($active->state === 'cancelled')
                  <li class="cancelled">Đã hủy<br><small>{{ $active->updated_at }}</small></li>
                @else
                  <li class="{{ $active->state != 'pending' ? 'active' : ''}} delivering">Giao hàng<br>
                    <small>
                      {{ $active->state != 'pending' ? $active->delivered_at : ''}}
                    </small>
                  </li>
                  <li class="{{ $active->state === 'finished' ? 'active' : ''}} finished">Hoàn tất<br><small>
                      {{ $active->state === 'finished' ? $active->delivery_time : ''}}
                    </small></li>
                @endif
              </ul>
            @else
              <div class="w-100 text-center text-gray">Không có dữ liệu để hiển thị</div>
            @endisset
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <form action="{{ route('cart.order_cancel') }}" method="post" onsubmit="return confirm('Xác nhận hủy đơn hàng?')">
            @csrf
            <input type="hidden" name="id" value="{{ $active->id }}">
            <input type="submit" class="btn btn-danger" value="Hủy đơn hàng" {{ ($active->state === 'finished' || $active->state === 'cancelled') ? 'disabled' : '' }}>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-5">
    <div class="card my-5" id="cart">
      <div class="card-header card-header-primary text-uppercase text-lg-center" style="width: 150px;">Giỏ hàng</div>
      <div class="card-body">
        @isset($active)
          <table class="table table-hover" style="width: 100%">
            <thead>
            <tr class="text-gray">
              <th style="width: 25%">Tên sản phẩm</th>
              <th style="width: 20%">Yêu cầu</th>
              <th style="width: 20%" class="text-right">Số lượng</th>
              <th style="width: 15%" class="text-right">Đơn giá</th>
              <th style="width: 20%" class="text-right">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($active->cart_items as $item)
              <tr class="cart-item">
                <td>{{ $item->name }}</td>
                <td>{{ $item->requirement }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right text-danger">{{ $item->price }}</td>
                <td class="text-right text-danger">{{ $item->subtotal }}</td>
              </tr>
            @endforeach
            <tr>
              <td colspan="4" class="text-gray"><b>Tổng tiền</b></td>
              <td class="text-right cart-price cart-total text-danger">{{ $active->total }}</td>
              <td></td>
            </tr>
            </tbody>
          </table>
        @else
          <div class="w-100 text-center text-gray">Không có dữ liệu để hiển thị</div>
        @endisset
      </div>
    </div>
  </div>
</div>