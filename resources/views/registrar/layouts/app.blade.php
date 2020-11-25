@extends('layouts.master')

@section('title', 'Registrar Module')

@section('bodyClass', 'hold-transition sidebar-mini bg-light layout-fixed layout-navbar-fixed')

@section('content')
    <div class="wrapper" id="app">
        @include('registrar.includes.header')
        @include('registrar.includes.sidebar')
        @yield('mainContent')
        @include('includes.footer')
    </div>{{-- ./wrapper --}}
@endsection