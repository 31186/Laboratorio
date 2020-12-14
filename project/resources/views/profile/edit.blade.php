@extends('layouts.app-profile')
@include('sidebar')

@section('styles')
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content" id="main">
        <div class="container-xl">
            <div class="col-md-12 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Create your profile') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="PATCH" action="{{ route('profile.update', $profile->id) }}">
                            @csrf
                                {{-- Cover image --}}
                                {{-- TODO --}}

                                {{-- Description --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }} *</label>
                                    <textarea class="form-control" name="description" rows="6"
                                        placeholder="Enter a description" spellcheck="false" required></textarea>
                                </div>

                                {{-- Social Networks --}}
                                {{-- TODO --}}

                                {{-- Picture --}}
                                {{-- TODO --}}

                                {{-- Job title --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Job Title') }} *</label>
                                    <input type="text" class="form-control" name="job_title" placeholder="Enter a job title"
                                        required>
                                </div>

                                {{-- Job Description --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Job description') }} *</label>
                                    <textarea class="form-control" name="job_description" rows="6"
                                        placeholder="Enter a job description" spellcheck="false" required></textarea>
                                </div>

                                {{-- Website --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Website') }}</label>
                                    <input type="text" class="form-control" name="website"
                                        placeholder="Enter your website URL" value="">
                                </div>

                                {{-- Phone --}}
                                <div class="mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" name="phone" class="form-control" data-mask="000000000"
                                        data-mask-visible="true" placeholder="000000000" value="" autocomplete="off">
                                </div>

                                {{-- Country --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Country') }}</label>
                                    <input type="text" class="form-control" name="country" placeholder="Enter your country"
                                        value="" required>
                                </div>

                                {{-- City --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('City') }} *</label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter your city"
                                        value="" required>
                                </div>

                                {{-- Degree --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Degree') }}</label>
                                    <input type="text" class="form-control" name="degree" placeholder="Enter your degree"
                                        value="">
                                </div>

                                {{-- Skills Description --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Skills description') }} *</label>
                                    <textarea class="form-control" name="skills_description" rows="6"
                                        placeholder="Enter your skills description" spellcheck="false" required></textarea>
                                </div>

                                {{-- CV --}}
                                <div class="mb-3">
                                    <div class="form-label">{{ __('CV') }}</div>
                                    <input type="file" class="form-control">
                                </div>

                                {{-- Skills --}}
                                {{-- TODO - fix CSS --}}
                                {{-- TODO - add all the skills in the database
                                --}}
                                {{-- <div class="mb-3">
                                    <label class="form-label">{{ __('Skills') }}</label>
                                    <select name="tags-advanced" id="select-tags-advanced" class="form-select selectized"
                                        multiple="multiple" tabindex="-1" style="display: none;">
                                        <option value="Ruby" selected="selected">Ruby</option>
                                        <option value="Python" selected="selected">Python</option>
                                    </select>
                                    <div class="selectize-control form-select multi plugin-remove_button">
                                        <div class="selectize-input items not-full has-options has-items">
                                            <div class="item" data-value="Ruby">Ruby<a href="javascript:void(0)"
                                                    class="remove" tabindex="-1" title="Remove">×</a></div>
                                            <div class="item" data-value="Python">Python<a href="javascript:void(0)"
                                                    class="remove" tabindex="-1" title="Remove">×</a></div><input
                                                type="select-multiple" autocomplete="off" tabindex=""
                                                id="select-tags-advanced-selectized" style="width: 4px;">
                                        </div>
                                        <div class="selectize-dropdown multi form-select plugin-remove_button"
                                            style="display: none;">
                                            <div class="selectize-dropdown-content"></div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- Save --}}
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
