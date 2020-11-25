@extends('layouts.master')

@section('title', 'Teacher Module')

@section('bodyClass', 'hold-transition sidebar-mini bg-light layout-fixed layout-navbar-fixed')

@section('content')
    <div class="wrapper" id="app">
        @include('teacher.includes.header')
        @include('teacher.includes.sidebar')
        @yield('mainContent')
        @include('includes.footer')
    </div>{{-- ./wrapper --}}
@endsection