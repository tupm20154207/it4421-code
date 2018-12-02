@extends('layouts.app')

@section('title', 'Giới thiệu')
@section('page_js')
@endsection
@section('page_css')
  <style>
    .tab- *
  </style>
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('cover', '')
@section('content')
  <div class="row">
    <div class="col-md-4">
      <ul class="nav nav-pills nav-pills-rose flex-column">
        <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Options</a></li>
      </ul>
    </div>
    <div class="col-md-8">
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users
          after installed base benefits.
          <br><br>
          Dramatically visualize customer directed convergence without revolutionary ROI.
        </div>
        <div class="tab-pane" id="tab2">
          Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables
          for real-time schemas.
          <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
        </div>
        <div class="tab-pane" id="tab3">
          Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate
          one-to-one customer service with robust ideas.
          <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade show active">
    <div class="row justify-content-lg-around justify-content-md-center">
      <div class="card col-lg-5 col-md-10 my-3">
        <div class="card-body">
          <div class="media">
            <img class="d-flex mr-3 item-image" src="https://dominos.vn/Data/Sites/1/Product/579/meat.png"
                 alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="item-heading">MEAT LOVERS</h5>
              <div class="item-description mb-1">
                Xúc xích Peperoni, Thịt dăm bông, Xúc xích Ý, Thịt bò viên, Thịt heo muối
              </div>
              <div class="item-price mb-1">12</div>
              <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3" onclick="login_required()">Thêm vào
                  giỏ hàng</a>
                <button href="{{ route('login') }}" class="btn btn-white btn-md text-rose btn-like"
                        onclick="login_required()"><i class="material-icons">favorite_border</i> Thích
                </button>
              </div>
            </div>
          </div>
          <div class="card col-lg-5 col-md-10 my-3">
            <div class="card-body">
              <div class="media">
                <img class="d-flex mr-3 item-image" src="https://dominos.vn/Data/Sites/1/Product/578/1extra.png"
                     alt="Generic placeholder image">
                <div class="media-body">
                  <h5 class="item-heading">EXTRAVAGANZA</h5>
                  <div class="item-description mb-1">
                    Xúc xích kiểu Ý, Thịt bò viên, Xúc xích Pepperoni
                  </div>
                  <div class="item-price mb-1">33</div>
                  <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3" onclick="login_required()">Thêm
                      vào giỏ hàng</a>
                    <button href="{{ route('login') }}" class="btn btn-white btn-md text-rose btn-like"
                            onclick="login_required()"><i class="material-icons">favorite_border</i> Thích
                    </button>
                  </div>
                </div>
              </div>
              <div class="card col-lg-5 col-md-10 my-3">
                <div class="card-body">
                  <div class="media">
                    <img class="d-flex mr-3 item-image" src="https://dominos.vn/Data/Sites/1/Product/577/prime.png"
                         alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="item-heading">SINGAPORE SEAFOOD</h5>
                      <div class="item-description mb-1">
                        Tôm, Cua, Sốt Singpore
                      </div>
                      <div class="item-price mb-1">33</div>
                      <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3" onclick="login_required()">Thêm
                          vào giỏ hàng</a>
                        <button href="{{ route('login') }}" class="btn btn-white btn-md text-rose btn-like"
                                onclick="login_required()"><i class="material-icons">favorite_border</i> Thích
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card col-lg-5 col-md-10 my-3">
                    <div class="card-body">
                      <div class="media">
                        <img class="d-flex mr-3 item-image"
                             src="https://dominos.vn/Data/Sites/1/Product/576/singapore.png"
                             alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="item-heading">ALMOND CITRUS SEAFOOD</h5>
                          <div class="item-description mb-1">
                            Tôm, Sò điệp, Hạnh nhân
                          </div>
                          <div class="item-price mb-1">42</div>
                          <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                              onclick="login_required()">Thêm vào giỏ hàng</a>
                            <button href="{{ route('login') }}" class="btn btn-white btn-md text-rose btn-like"
                                    onclick="login_required()"><i class="material-icons">favorite_border</i> Thích
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="card col-lg-5 col-md-10 my-3">
                        <div class="card-body">
                          <div class="media">
                            <img class="d-flex mr-3 item-image"
                                 src="https://dominos.vn/Data/Sites/1/Product/575/almond.png"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                              <h5 class="item-heading">TUNA</h5>
                              <div class="item-description mb-1">
                                Cá Ngừ, Sốt Mayonnaise, Ớt chuông xanh, Hành tây
                              </div>
                              <div class="item-price mb-1">23</div>
                              <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                                  onclick="login_required()">Thêm vào giỏ hàng</a>
                                <button href="{{ route('login') }}" class="btn btn-white btn-md text-rose btn-like"
                                        onclick="login_required()"><i class="material-icons">favorite_border</i> Thích
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="card col-lg-5 col-md-10 my-3">
                            <div class="card-body">
                              <div class="media">
                                <img class="d-flex mr-3 item-image"
                                     src="https://dominos.vn/Data/Sites/1/Product/691/new-combo.png"
                                     alt="Generic placeholder image">
                                <div class="media-body">
                                  <h5 class="item-heading">HALF - HALF OCEAN MANIA & CHEESY CHICKEN BACON</h5>
                                  <div class="item-description mb-1">

                                  </div>
                                  <div class="item-price mb-1">12</div>
                                  <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                                      onclick="login_required()">Thêm vào giỏ hàng</a>
                                    <button href="{{ route('login') }}" class="btn btn-white btn-md text-rose btn-like"
                                            onclick="login_required()"><i class="material-icons">favorite_border</i>
                                      Thích
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="card col-lg-5 col-md-10 my-3">
                                <div class="card-body">
                                  <div class="media">
                                    <img class="d-flex mr-3 item-image"
                                         src="https://dominos.vn/Data/Sites/1/Product/581/1seafood-delight.png"
                                         alt="Generic placeholder image">
                                    <div class="media-body">
                                      <h5 class="item-heading">TERIYAKI CHICKEN</h5>
                                      <div class="item-description mb-1">
                                        Sốt Teriyaki, Gà, Nấm Mỡ
                                      </div>
                                      <div class="item-price mb-1">13</div>
                                      <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                                          onclick="login_required()">Thêm vào giỏ hàng</a>
                                        <button href="{{ route('login') }}"
                                                class="btn btn-white btn-md text-rose btn-like"
                                                onclick="login_required()"><i class="material-icons">favorite_border</i>
                                          Thích
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card col-lg-5 col-md-10 my-3">
                                    <div class="card-body">
                                      <div class="media">
                                        <img class="d-flex mr-3 item-image"
                                             src="https://dominos.vn/Data/Sites/1/Product/583/pepperoni.png"
                                             alt="Generic placeholder image">
                                        <div class="media-body">
                                          <h5 class="item-heading">PEPPERONI FEAST</h5>
                                          <div class="item-description mb-1">
                                            Sốt cà chua, Phô Mai Mozzarella, Xúc Xích Pepperoni
                                          </div>
                                          <div class="item-price mb-1">42</div>
                                          <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                                              onclick="login_required()">Thêm vào giỏ hàng</a>
                                            <button href="{{ route('login') }}"
                                                    class="btn btn-white btn-md text-rose btn-like"
                                                    onclick="login_required()"><i
                                                  class="material-icons">favorite_border</i> Thích
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card col-lg-5 col-md-10 my-3">
                                        <div class="card-body">
                                          <div class="media">
                                            <img class="d-flex mr-3 item-image"
                                                 src="https://dominos.vn/Data/Sites/1/Product/586/kid.png"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                              <h5 class="item-heading">KID MANIA</h5>
                                              <div class="item-description mb-1">
                                                Thịt heo muối, Bắp, Trứng cút

                                              </div>
                                              <div class="item-price mb-1">14</div>
                                              <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                                                  onclick="login_required()">Thêm vào giỏ hàng</a>
                                                <button href="{{ route('login') }}"
                                                        class="btn btn-white btn-md text-rose btn-like"
                                                        onclick="login_required()"><i class="material-icons">favorite_border</i>
                                                  Thích
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card col-lg-5 col-md-10 my-3">
                                            <div class="card-body">
                                              <div class="media">
                                                <img class="d-flex mr-3 item-image"
                                                     src="https://dominos.vn/Data/Sites/1/Product/584/vegie.png"
                                                     alt="Generic placeholder image">
                                                <div class="media-body">
                                                  <h5 class="item-heading">VEGGIE MANIA</h5>
                                                  <div class="item-description mb-1">
                                                    Nấm mỡ, Cà chua, Ô liu, Thơm
                                                  </div>
                                                  <div class="item-price mb-1">14</div>
                                                  <div class="row"><a href="/login" class="btn btn-primary btn-md mr-3"
                                                                      onclick="login_required()">Thêm vào giỏ hàng</a>
                                                    <button href="{{ route('login') }}"
                                                            class="btn btn-white btn-md text-rose btn-like"
                                                            onclick="login_required()"><i class="material-icons">favorite_border</i>
                                                      Thích
                                                    </button>
                                                  </div>
                                                </div>
                                              </div>
@endsection