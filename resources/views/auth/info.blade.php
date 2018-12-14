@extends('layouts.app')

@section('title', 'Thông tin')
@section('page_js')
@endsection
@section('page_css')
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('cover', '')
@section('content')

  <div class="container pt-5 mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card">
          <form method="POST" action="{{ route('info.update') }}">
            @csrf
            <div class="card-header card-header-primary text-uppercase text-center">
              Thông tin cá nhân
            </div>
            <div class="card-body">
              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="name" class="control-label">Tên người dùng: </label>
                      <input type="text" id="name" name="name" class="form-control"
                             value="{{ Auth::user()->fullname }}" required>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="username" class="control-label">Tên tài khoản: </label>
                      <input type="text" id="username" name="username" class="form-control"
                             value="{{ Auth::user()->username }}" required>
                      @if ($errors->has('username'))
                        <small class="text-danger">{{ $errors->first('username') }}</small><br>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="email" class="control-label"> Địa chỉ email: </label>
                      <input type="text" id="email" name="email" class="form-control"
                             value="{{ Auth::user()->email }}" required>
                      @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small><br>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="phone" class="control-label"> Số điện thoại: </label>
                      <input type="text" id="phone" name="phone" class="form-control"
                             value="{{ Auth::user()->phone }}" required>
                      @if ($errors->has('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small><br>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer justify-content-center">
              <input type="submit" class="btn btn-primary" value="Cập nhật thông tin" disabled>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('custom_script')
  <script>
    $(document).ready(function () {
      $(document).on('input', 'input[type="text"]', function () {
        $('input[type="submit"]').removeAttr('disabled');
      });
    });
  </script>
@endsection