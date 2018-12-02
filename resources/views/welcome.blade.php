@extends('layouts.app')

@section('title', 'Trang chủ')
@section('page_js')
@endsection
@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/cover_page.css') }}">
@endsection
@section('navbar_class', 'navbar-transparent fixed-top')
@section('cover')
  <div id="cover_image" class="view">
    <div class="mask rgba-black-strong"></div>
    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="brand text-center" >Welcome</h1>
          <hr>
          <h3 class="title text-center">Come and eat well with our delicious &amp; healthy foods.</h3>
          <p><a href="{{ url('/menu') }}" class="btn btn-lg btn-outline-warning">
              Xem thực đơn
            </a></p>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
@endsection
@section('jquery')
@endsection