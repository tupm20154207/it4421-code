@extends('layouts.app')

@section('title', 'Đổi mật khẩu')
@section('page_js')
@endsection
@section('page_css')
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('cover', '')
@section('content')

  <div class="container pt-5 mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 col-sm-10">
        <div class="card">
          <div class="card-header card-header-danger text-uppercase text-center">
            Đổi mật khẩu
          </div>
          <form method="POST" action="{{ route('password.update_') }}">
            @csrf
            <div class="card-body">

              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="old_password" class="control-label">Mật khẩu hiện tại: </label>
                      <input type="password" id="old_password" name="old_password" class="form-control" required>
                      @if ($errors->has('old_password'))
                          <small class="text-danger">{{ $errors->first('old_password') }}</small>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="new_password" class="control-label">Mật khẩu mới: </label>
                      <input type="password" id="new_password" name="new_password" class="form-control" required>
                      @if ($errors->has('new_password'))
                        @foreach($errors->get('new_password') as $error)
                          <small class="text-danger">{{ $error }}</small><br>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-center mt-3">
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="form-group w-100">
                      <label for="new_password_confirmation" class="control-label">Nhập lại mật khẩu mới: </label>
                      <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                             class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer justify-content-center">
              <input type="submit" class="btn btn-danger" value="Đổi mật khẩu" disabled>
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
      $(document).on('input', 'input[type="password"]', function () {
        $('input[type="submit"]').removeAttr('disabled');
      });
    });
  </script>
@endsection