@extends('layouts.app-profile')
@include('sidebar')

@section('content')
    <div class="page" id="main">
        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="page-title">
                                {{ __('Search Companies') }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Search column --}}
                    <div class="col-3">
                        <form method="GET" action="{{ route('search') }}">
                            <div class="subheader mb-2">{{ __('Company type') }}</div>
                            <div class="mb-3">
                                <label class="form-check mb-1">
                                    @if ($selectedCompanyType == 1)
                                        <input type="radio" class="form-check-input" name="company_type" value="1" checked>
                                    @else
                                        <input type="radio" class="form-check-input" name="company_type" value="1">
                                    @endif
                                    <span class="form-check-label">{{ __('Business') }}</span>
                                </label>
                                <label class="form-check mb-1">
                                    @if ($selectedCompanyType == 2)
                                        <input type="radio" class="form-check-input" name="company_type" value="2" checked>
                                    @else
                                        <input type="radio" class="form-check-input" name="company_type" value="2">
                                    @endif
                                    <span class="form-check-label">{{ __('Charity') }}</span>
                                </label>
                            </div>
                            <div class="subheader mb-2">{{ __('Country') }}</div>
                            <div>
                                <select name="country" class="form-select mb-2">
                                    <option></option>
                                    @foreach ($countries as $country)
                                        @if ($selectedCountry === $country->country)
                                            <option selected>{{ $country->country }}</option>
                                        @else
                                            <option>{{ $country->country }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="subheader mb-2">{{ __('City') }}:</div>
                            <div>
                                <select name="city" class="form-select mb-2">
                                    <option></option>
                                    @foreach ($cities as $city)
                                        @if ($selectedCity === $city->city)
                                            <option selected>{{ $city->city }}</option>
                                        @else
                                            <option>{{ $city->city }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="subheader mb-2">{{ __('Types') }}:</div>

                            <select name="types_array[]" multiple id="select-tags-advanced" class="form-select selectized"
                                multiple="multiple" tabindex="-1" style="display: none;">
                                @foreach ($types as $type)
                                    <option value="{{ $type->name }}">
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="selectize-dropdown multi form-select plugin-remove_button"
                                style="display: none; visibility: visible; width: 402px; top: 34px; left: 0px;">
                                <div class="selectize-dropdown-content">
                                    @foreach ($types as $type)
                                        <div class="option" data-selectable="" data-value="{{ $type->name }}">
                                            {{ $type->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary w-40">
                                    {{ __('Search') }}
                                </button>
                                <a href="/search" class="btn btn-secondary w-30">
                                    {{ __('Reset') }}
                                </a>
                            </div>
                        </form>
                    </div>

                    {{-- Results --}}
                    <div class="col-9 mt-5">
                        @if (count($results) !== 0)
                            <div class="row">
                                @foreach ($results as $result)
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card card-sm">
                                            <a href="{{ '/page/' . $result->id }}" class="d-block"><img
                                                    src="{{ '/uploads/' . $result->cover_image }}" class="card-img-top"></a>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar mr-3 rounded"
                                                        style="background-image: url({{ '/uploads/' . $result->logo }})"></span>
                                                    <div>
                                                        <div>{{ $result->company_name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <strong>{{ __('Info') }}:</strong> {{ __('The current filters have no results to show.') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#select-tags-advanced').selectize({
                maxItems: 10,
                plugins: ['remove_button'],
            });
        });

    </script>
@endsection
