@extends('layouts.app')

@section('navbar_class', 'navbar-dark bg-dark')
@section('content')
  <div class="container pt-5 mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card">
          <div class="card-header card-header-primary text-uppercase text-lg-center">{{ __('Đăng nhập') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">account_circle</i>
                      </span>
                    </div>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Tài khoản..." required autofocus>
                    @if ($errors->has('username'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock</i>
                      </span>
                    </div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mật khẩu..." required>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="form-check pl-4">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      {{ __('Lưu mật khẩu') }}
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                  </div>
                </div>
              </div>

              <div class="form-group row d-flex justify-content-center mb-0">
                <div>
                  <button type="submit" class="btn btn-primary">
                    {{ __('Đăng nhập') }}
                  </button>
                </div>
              </div>
              <div class="row d-flex justify-content-center align-items-center mt-2">
                Chưa có tài khoản?
                <div class="ml-2">
                  <a href="/register" class="btn btn-white">
                    {{ __('Đăng ký') }}
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
