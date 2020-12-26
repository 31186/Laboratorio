@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="flex-fill d-flex flex-column justify-content-center py-4">
        <div class="container-tight py-6">
            <div class="text-center mb-4">
                <a href="."><img src="{{ asset('img/logo.png') }}" height="36" alt=""></a>
            </div>

            <form class="card card-md" method="POST" action="{{ route('company.login') }}">
                @csrf

                <div class="card-body">
                    <h2 class="card-title text-center mb-4">{{ __('Login as a company') }}</h2>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check" for="remember">
                            <input type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }} />
                            <span class="form-check-label">{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                {{-- <div class="hr-text">or</div> --}}

                {{-- <div class="card-body">
                    <div class="row">
                        <div class="col"><a href="#" class="btn btn-white w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                                {{ __('Login with LinkedIn') }}
                            </a>
                        </div>
                    </div>
                </div> --}}
            </form>
            <div class="text-center text-muted mt">
                {{ __('Not a company?') }}
                <br />
                <a href="{{ url('login') }}" tabindex="-1">{{ __('Login as a user') }}</a>
            </div>
            <div class="text-center text-muted mt">
                {{ __("Don't have an account yet?") }}
                <br />
                <a href="{{ url('register') }}" tabindex="-1">{{ __('Register as a user') }}</a>
                <br />
                <a href="{{ url('company/register') }}" tabindex="-1">{{ __('Register as a company') }}</a>
            </div>
        </div>
    </div>
@endsection
