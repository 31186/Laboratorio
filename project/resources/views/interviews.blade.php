@extends('layouts.app-profile')
@include('sidebar')

@section('content')

    <div class="page" id="main">
        <div class="content">
            <!-- Page title -->
            <div class="ml-3">
                <h1 class="text-xl mb-3">
                    {{ __('Interviews') }}
                </h1>
            </div>
            @if (count($newInterviews) !== 0)
                <div class="ml-3">
                    <h2 class="ml-3">{{ __('New') }}</h2>
                    @foreach ($newInterviews as $newInterview)
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $newInterview->company_name }}
                                    </h3>
                                    <div class="card-actions">
                                        <form method="POST" name="acceptInterview"
                                            action="{{ route('interviews.update', $newInterview->id) }}">
                                            @csrf
                                            {{ method_field('PATCH') }}

                                            <input type="submit" name="accept"
                                                class="btn btn-primary btn-pill w-10 mr-3 mb-1 float-right"
                                                value="{{ __('Accept') }}">
                                        </form>
                                        <form method="POST" name="declineInterview"
                                            action="{{ route('interviews.update', $newInterview->id) }}">
                                            @csrf
                                            {{ method_field('PATCH') }}

                                            <input type="submit" name="reject"
                                                class="btn btn-danger btn-pill w-10 mr-3 float-right"
                                                value="{{ __('Reject') }}">
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-5">{{ __('Shedule') }}:</dt>
                                        <dd class="col-7">{{ $newInterview->schedule }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (count($acceptedInterviews) !== 0)
                <div class="ml-3">
                    <h2 class="ml-3">{{ __('Accepted') }}</h2>
                    @foreach ($acceptedInterviews as $acceptedInterview)
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $acceptedInterview->company_name }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-5">{{ __('Shedule') }}:</dt>
                                        <dd class="col-7">{{ $acceptedInterview->schedule }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (count($rejectedInterviews) !== 0)
                <div class="ml-3">
                    <h2 class="ml-3">{{ __('Rejected') }}</h2>
                    @foreach ($rejectedInterviews as $rejectedInterview)
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $rejectedInterview->company_name }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-5">{{ __('Shedule') }}:</dt>
                                        <dd class="col-7">{{ $rejectedInterview->schedule }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
