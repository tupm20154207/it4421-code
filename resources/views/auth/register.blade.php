@extends('layouts.app')

@section('navbar_class', 'navbar-dark bg-dark')
@section('content')
  <div class="container pt-5 mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card">
          <div class="card-header card-header-primary text-uppercase text-lg-center">{{ __('Đăng ký tài khoản') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}" placeholder="Họ và tên..." required autofocus>
                    @if ($errors->has('fullname'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fullname') }}</strong>
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
                        <i class="material-icons">account_circle</i>
                      </span>
                    </div>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Tài khoản..." required>
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
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock</i>
                      </span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Nhập lại mật khẩu..." required>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">phone</i>
                      </span>
                    </div>
                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại..." required>
                    @if ($errors->has('phone'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
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
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email..." required>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-group row d-flex justify-content-center mb-0">
                <div>
                  <button type="submit" class="btn btn-primary">
                    {{ __('Đăng ký') }}
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
