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
  Contact
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