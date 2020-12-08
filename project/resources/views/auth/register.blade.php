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
            <form class="card card-md" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="card-body">
                    <h2 class="card-title text-center mb-4">{{ __('Register as user') }}</h2>
                    <div class="mb-3">
                        <label for="first_name" value="{{ old('first_name') }}"
                            class="form-label">{{ __('First name') }}</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            autocomplete="first_name" name="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="last_name" value="{{ old('last_name') }}"
                            class="form-label">{{ __('Last name') }}</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            autocomplete="last_name" name="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birthday" value="{{ old('birthday') }}" class="form-label">{{ __('Birthday') }}</label>
                        <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                            autocomplete="birthday" autofocus>

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" autocomplete="new-password" autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password" autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" required />
                            <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms
                                    and policy</a>.</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
                    </div>
                </div>

                <div class="hr-text">or</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col"><a href="#" class="btn btn-white w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                                {{ __('Register with LinkedIn') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="text-center text-muted mt">
                {{ __('Already have an account?') }} <a href="{{ url('login') }}" tabindex="-1">{{ __('Login as a user') }}</a>
            </div>
            <div class="text-center text-muted mt">
                {{ __('Not a user?') }} <a href="{{ url('/company/register') }}"
                    tabindex="-1">{{ __('Register as a company') }}</a>
            </div>
        </div>
    </div>
@endsection
