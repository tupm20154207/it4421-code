@extends('layouts.app')

@section('title', 'Giới thiệu')
@section('page_js')
@endsection
@section('page_css')
@endsection
@section('navbar_class', 'navbar-dark bg-primary')
@section('cover', '')
@section('content')
  <button class="btn btn-danger" onclick="showNotification('aaa', 'danger')"></button>
@endsection