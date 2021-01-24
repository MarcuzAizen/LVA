@extends('layouts.master')

@section('title', 'Enrollment Officer Module')

@section('bodyClass', 'hold-transition sidebar-mini bg-light layout-fixed layout-navbar-fixed')

@section('content')
    <div class="wrapper" id="app">
        @include('enrollment-officer.includes.header')
        @include('enrollment-officer.includes.sidebar')
        @yield('mainContent')
        @include('includes.footer')
    </div>{{-- ./wrapper --}}
@endsection