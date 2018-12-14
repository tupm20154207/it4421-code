<div class="container">
  <div class="row justify-content-lg-around justify-content-md-center">
    @foreach($products as $product)
    <div class="card col-lg-5 col-md-10 my-3">
      <div class="card-body px-0">
        <div class="media">
          <img class="d-flex mr-3 item-image" src="{{ asset($product->url) }}"
               alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="item-heading">{{ $product->name }}</h5>
            <div class="item-description mb-1">
              {{ $product->description }}
            </div>
            <div class="item-price mb-1">{{ $product->price }}</div>
            <div class="row" id="{{ $product->id }}">
              @if(Auth::check())
                <button class="btn btn-primary btn-md mr-3 btn-details">Thêm vào giỏ hàng</button>

                @if(Auth::user()->likes()->where('product_id', $product->id)->first() != null)
                  <a class="btn btn-outline-danger btn-md text-rose btn-like item-like clicked">
                    <i class="material-icons">favorite</i> &times; {{ $product->likes()->count() }}
                  </a>
                @else
                  <a class="btn btn-outline-danger btn-md text-rose btn-like item-like">
                    <i class="material-icons">favorite_border</i> &times; {{ $product->likes()->count() }}
                  </a>
                @endif

              @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-md mr-3" onclick="login_required()">Thêm vào giỏ hàng</a>
                <a href="{{ route('login') }}" class="btn btn-outline-danger btn-md text-rose btn-like" onclick="login_required()"><i class="material-icons">favorite_border</i> &times; {{ $product->likes()->count() }}</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="row justify-content-center">
    <div class="mt-3">
      {!! $products->links()  !!}
    </div>
  </div>
</div>

