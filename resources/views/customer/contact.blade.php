@extends('layouts.app')

@section('title', 'Liên hệ')
@section('page_js')
  <script type="text/javascript" src="{{ asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}"></script>
@endsection
@section('page_css')
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('cover', '')
@section('content')
  <div id="accordion">

    <div class="card">
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum..
        </div>
      </div>
    </div>
    <div>
      <a class="btn btn-primary text-center mb-0" id="click_link" data-toggle="collapse" data-target="#collapseOne">CART</a>
    </div>
    <div>
      <a class="btn btn-primary text-center mb-0" id="click_button" data-toggle="collapse" data-target="#collapseTwo">ORDER</a>
    </div>
    <div class="card">
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum..
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom_script')
  <script>
    $(document).ready(function(){
      $("#click_link").hide();
      $("#click_button").click(function(){
        $(this).hide();
        $("#click_link").show();
      });
      $("#click_link").click(function(){
        $(this).hide();
        $("#click_button").show();
      });
    });
  </script>
@endsection