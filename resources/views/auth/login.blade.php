@extends('layouts.app')

@section('title', 'Login')

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top">
<div class="container-fluid">
    <div class="navbar-wrapper">
        <div class="navbar-toggle d-inline">
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <a class="navbar-brand" href="javascript:void(0)">Login Page</a>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page ">
<div class="full-page login-page ">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content">
        <div class="container">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card card-login card-white">
                    <div class="card-header">
                        <h1 class="card-title text-warning">Log in</h1>
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"  class="btn btn-warning btn-lg btn-block mb-3">Get Started</button>
                        <div class="pull-left">
                            <h6>
                                <a href="{{ route('register') }}" class="link footer-link">Create Account</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="{{ route('password.request') }}" class="link footer-link">Forget your password?</a>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
