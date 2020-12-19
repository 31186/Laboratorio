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
                        <h3 class="card-title">{{ __('Edit your profile') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $profile->id) }}">
                            @csrf
                            {{ method_field('PATCH') }}
                            {{-- User information --}}

                            {{-- First Name --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('First Name') }} *</label>
                                <input type="text" class="form-control" name="first_name"
                                    placeholder="Enter your first name" required value="{{ $user->first_name }}">
                            </div>

                            {{-- Last Name --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Last Name') }} *</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter your last name"
                                    required value="{{ $user->last_name }}">
                            </div>

                            {{-- Birthday --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Birthday') }} *</label>
                                <input type="date" class="form-control" name="birthday" placeholder="Enter your birthday"
                                    required value="{{ $user->birthday }}">
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Email') }} *</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                    required value="{{ $user->email }}">
                            </div>

                            {{-- Cover image --}}
                            {{-- TODO --}}

                            {{-- Description --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }} *</label>
                                <textarea class="form-control" name="description" rows="6" placeholder="Enter a description"
                                    spellcheck="false" required> {{ $profile->description }} </textarea>
                            </div>

                            {{-- Social Networks --}}
                            {{-- TODO --}}

                            {{-- Picture --}}
                            {{-- TODO --}}

                            {{-- Job title --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Job Title') }} *</label>
                                <input type="text" class="form-control" name="job_title" placeholder="Enter a job title"
                                    required value="{{ $profile->job_title }}">
                            </div>

                            {{-- Job Description --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Job description') }} *</label>
                                <textarea class="form-control" name="job_description" rows="6"
                                    placeholder="Enter a job description" spellcheck="false" required>
                                {{ $profile->job_description }} </textarea>
                            </div>

                            {{-- Website --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Website') }}</label>
                                <input type="text" class="form-control" name="website" placeholder="Enter your website URL"
                                    value="{{ $profile->website }}">
                            </div>

                            {{-- Phone --}}
                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="text" name="phone" class="form-control" data-mask="000000000"
                                    data-mask-visible="true" placeholder="000000000" value="{{ $profile->phone }}"
                                    autocomplete="off">
                            </div>

                            {{-- Country --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Country') }}</label>
                                <input type="text" class="form-control" name="country" placeholder="Enter your country"
                                    value="{{ $profile->country }}" required>
                            </div>

                            {{-- City --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('City') }} *</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter your city"
                                    value="{{ $profile->city }}" required>
                            </div>

                            {{-- Degree --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Degree') }}</label>
                                <input type="text" class="form-control" name="degree" placeholder="Enter your degree"
                                    value="{{ $profile->degree }}">
                            </div>

                            {{-- Resume --}}
                            {{-- TODO: Add this fields to the E-R model, migrations,
                            controllers, models and seeders --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Resume') }}</label>
                                <textarea class="form-control" name="resume_description" rows="6"
                                    placeholder="Enter a description for your resume" spellcheck="false" required>
                                {{ $profile->resume_description }} </textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Address') }}</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter your address"
                                    value="{{ $user->address }}">
                            </div>

                            {{-- TODO: Use new entity in the database
                            --}}
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Education Title') }}</label>
                                    <input type="text" class="form-control" name="education_title"
                                        placeholder="Enter your education title" value="{{ $profile->education_title }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Education Start - End years') }}</label>
                                    <input type="text" class="form-control" name="education_years"
                                        placeholder="Enter your education years (eg: 2010-2012)" size="10"
                                        value="{{ $profile->education_years }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Education Institution') }}</label>
                                    <input type="text" class="form-control" name="education_institution"
                                        placeholder="Enter your education institution"
                                        value="{{ $profile->education_institution }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Education Description') }}</label>
                                    <input type="text" class="form-control" name="education_description"
                                        placeholder="Enter your education description"
                                        value="{{ $profile->education_description }}">
                                </div>
                            </fieldset>

                            {{-- TODO: Use new entity in the database
                            --}}
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Professional Experience Title') }}</label>
                                    <input type="text" class="form-control" name="professional_title"
                                        placeholder="Enter your professional experience title"
                                        value="{{ $profile->professional_title }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Professional Experience Start - End years') }}</label>
                                    <input type="text" class="form-control" name="professional_years"
                                        placeholder="Enter your professional experience years (eg: 2010-2012)" size="10"
                                        value="{{ $profile->professional_years }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Professional Experience Company') }}</label>
                                    <input type="text" class="form-control" name="professional_company"
                                        placeholder="Enter your professional experience company"
                                        value="{{ $profile->professional_company }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Professional Experience Description') }}</label>
                                    <input type="text" class="form-control" name="professional_description"
                                        placeholder="Enter your professional experience description"
                                        value="{{ $profile->professional_description }}">
                                </div>
                            </fieldset>

                            {{-- TODO: Use new entity in the database
                            --}}
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Volunteering Title') }}</label>
                                    <input type="text" class="form-control" name="volunteering_title"
                                        placeholder="Enter your volunteering title"
                                        value="{{ $profile->volunteering_title }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Volunteering Start - End years') }}</label>
                                    <input type="text" class="form-control" name="volunteering_years"
                                        placeholder="Enter your volunteering years (eg: 2010-2012)" size="10"
                                        value="{{ $profile->volunteering_years }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Volunteering Institution') }}</label>
                                    <input type="text" class="form-control" name="volunteering_institution"
                                        placeholder="Enter your volunteering institution"
                                        value="{{ $profile->volunteering_institution }}">
                                </div>

                                {{-- TODO: Use new entity in the database
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Volunteering Description') }}</label>
                                    <input type="text" class="form-control" name="volunteering_description"
                                        placeholder="Enter your volunteering description"
                                        value="{{ $profile->volunteering_description }}">
                                </div>
                            </fieldset>

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
                                        <div class="item" data-value="Ruby">Ruby<a href="javascript:void(0)" class="remove"
                                                tabindex="-1" title="Remove">×</a></div>
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

                            {{-- Certificates --}}
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <div class="form-label">{{ __('CV') }}</div>
                                    <input type="file" class="form-control">
                                </div>
                            </fieldset>

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
