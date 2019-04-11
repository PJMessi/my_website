{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends("auth.authLayout")
@section("content")
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="hero-static">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign Up Block -->
                        <div class="block block-themed block-fx-shadow mb-0">
                            <div class="block-header bg-success">
                                <h3 class="block-title">Create Account</h3>
                                <div class="block-options">
                                    <a class="btn-block-option" href="{{route('login')}}" data-toggle="tooltip" data-placement="left" title="Go back to my acount">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="mb-2">PJMessi's Website</h1>
                                    <p>Once you register, you will be automatically logged in with this account.</p>

                                    <!-- Sign Up Form -->
                                    <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt {{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" name="username" placeholder="{{ __('Username') }}" value="{{ old('username') }}" required autofocus>
                                                @if ($errors->has('username'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-lg form-control-alt {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="{{ __('Password') }}" required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn btn-block btn-success">
                                                    <i class="fa fa-fw fa-plus mr-1"></i> {{ __('Sign Up') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign Up Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign Up Block -->
                    </div>
                </div>
            </div>
            <div class="content content-full font-size-sm text-muted text-center">
                <strong>OneUI 4.1</strong> &copy; <span data-toggle="year-copy">2018</span>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->
@endsection