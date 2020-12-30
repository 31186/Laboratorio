@extends('layouts.app-profile')
@include('company.sidebar')

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
                                        {{ $newInterview->first_name . ' ' . $newInterview->last_name }}
                                    </h3>
                                    <div class="card-actions">
                                        <a class="btn btn-secondary btn-pill w-10 mr-3 mb-1 float-right" data-toggle="modal"
                                            data-target="#editInterview-{{ $newInterview->id }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <form method="POST" name="deleteInterview"
                                            action="{{ route('interviews.destroy', $newInterview->id) }}">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <input type="submit" class="btn btn-danger btn-pill w-10 mr-3 float-right"
                                                value="{{ __('Delete') }}">
                                        </form>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editInterview-{{ $newInterview->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editInterview" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <form method="POST" name="editInterview"
                                                        action="{{ route('interviews.update', $newInterview->id) }}">
                                                        @csrf
                                                        {{ method_field('PATCH') }}

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editInterview">
                                                                {{ __('Edit interview') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Schedule') }}</label>
                                                                <input type="hidden" name="interview_status" value="new">
                                                                <input type="datetime-local" required class="form-control"
                                                                    name="schedule" value="{{ $newInterview->schedule }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('Discard') }}</button>
                                                            <button type="submit" name="updateInterview"
                                                                class="btn btn-success">{{ __('Save Changes') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                        {{ $acceptedInterview->first_name . ' ' . $acceptedInterview->first_name }}
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
                                        {{ $rejectedInterview->first_name . ' ' . $rejectedInterview->first_name }}
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
