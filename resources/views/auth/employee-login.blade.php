@extends('layouts.master')

@section('title', 'Employee | Login')

@section('bodyClass', 'hold-transition login-page')

@section('content')
    <div class="login-box" id="app">
        <div class="login-logo text-dark">
            <a href="/">
                <img src="images/app/apple-touch-icon.png" width="120" height="120" class="d-inline-block align-top" alt="">
            </a>
            <br>
            Employee | Login
        </div>{{-- /.login-logo --}}

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Log in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" required autocomplete="off" v-focus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>{{-- /.col --}}
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                        </div>{{-- /.col --}}
                    </div>
                </form>{{-- ./form --}}
            </div>{{-- /.login-card-body --}}
        </div>{{-- /.card --}}
    </div>{{-- /.login-box --}}
@endsection