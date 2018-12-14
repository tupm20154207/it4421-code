@extends('layouts.app')

@section('title', 'Lịch sử')
@section('page_js')
@endsection
@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/order_page.css') }}">
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('cover', '')
@section('content')
  <div class="container-fluid">
    <div class="row d-flex justify-content-around">
      <div class="col-md-8 content_wrapper">
        {!! $order_details !!}
      </div>
      <div class="col-md-3">
        <div class="container">
          <div class="row my-5">
            <div class="card">
              <div class="card-header card-header-primary text-uppercase text-lg-center">Lịch sử mua hàng</div>
              <div class="card-body">
                <div class="container-fluid px-0">
                  <ul class="nav">
                    @foreach($orders as $order)
                      <li class="nav-item {{ $loop->first ? 'active '.($order->state === 'finished' ? 'finished' : ($order->state === 'cancelled' ? 'cancelled' : 'processing')) : ''}}">
                        <a href="#" class="nav-link mx-0" id="{{ $order->id }}">
                          <div class="row d-flex justify-content-center">
                            <div class="mr-2"><i class="material-icons mr-0">{{ $order->state === 'finished' ? 'check' : ($order->state === 'cancelled' ? 'clear' : ($order->state === 'pending' ? 'hourglass_empty' : 'local_shipping'))}}</i></div>
                            <div class="ml-2" style="height: 30px; line-height: 30px; font-size: 15px;">{{ $order->updated_at }}</div>
                          </div>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
                <div>{{ $orders->links() }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom_script')
  <script>
    $(document).ready(function () {
      $(document).on('click', 'a.nav-link', function (){
        let order_item = $(this);
        let id = order_item.attr('id');
        $.post('{{ route("history.order") }}', {id: id}, function (data) {
          $('li.nav-item.active').attr('class', 'nav-item');
          order_item.parent().attr('class', 'nav-item active');
          order_item.parent().addClass(data.class);
          $('div.content_wrapper').html(data.content);
        });
      });
    });
  </script>
@endsection
