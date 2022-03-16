@extends('backend.auth.main')

@section('auth-title')
    Login
@endsection

@section('auth-content')


    <div class="card mb-0">
        <div class="card-body">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <img src="{{url('/img/logo.png')}}" width="50px" height="40px" alt="SUB"/>

                <h2 class="brand-text text-primary ms-1">SUB CAS</h2>
            </a>

            <h4 class="card-title mb-1">Welcome to Canteen Automation System! 👋</h4>
            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
            @include('backend.layouts.partials.alerts')
            <form method="POST" action="{{ route('dashboard.login.submit') }}">
                @csrf
                <div class="mb-1">
                    <label for="login-email" class="form-label">Email</label>

                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">Password</label>
                        <a href="">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">

                        <input type="password" class="form-control form-control-merge" placeholder="Password" id="password" name="password"
                               required autocomplete="current-password" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me" name="remember">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
            </form>

        </div>
    </div>
    <!-- /Login basic -->

@endsection
