@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>

                    <div class="card-body">
                        {{ __('Login to start') }}

                        <br />
                        <hr />

                        <a class="btn btn-primary mr-4" href="{{ route('login') }}">
                            {{ __('Enter as a user') }}
                        </a>
                        <a class="btn btn-secondary" href="{{ route('company.login') }}">
                            {{ __('Enter as a company') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
