@extends('layouts.master')

@section('title', 'Principal Module')

@section('bodyClass', 'hold-transition sidebar-mini bg-light layout-fixed layout-navbar-fixed')

@section('content')
    <div class="wrapper" id="app">
        @include('principal.includes.header')
        @include('principal.includes.sidebar')
        @yield('mainContent')
        @include('includes.footer')
    </div>{{-- ./wrapper --}}
@endsection