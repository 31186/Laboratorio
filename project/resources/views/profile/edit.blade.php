@extends('layouts.app-profile')

@include('sidebar')

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
                            <fieldset class="form-fieldset">
                                <h4>{{ __('User information') }}</h4>

                                {{-- First Name --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('First Name') }} *</label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="Enter your first name" required value="{{ $user->first_name }}">
                                </div>

                                {{-- Last Name --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Last Name') }} *</label>
                                    <input type="text" class="form-control" name="last_name"
                                        placeholder="Enter your last name" required value="{{ $user->last_name }}">
                                </div>

                                {{-- Birthday --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Birthday') }} *</label>
                                    <input type="date" class="form-control" name="birthday"
                                        placeholder="Enter your birthday" required value="{{ $user->birthday }}">
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Email') }} *</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                        required value="{{ $user->email }}">
                                </div>
                            </fieldset>

                            {{-- Cover image --}}
                            {{-- TODO --}}

                            {{-- Description --}}
                            {{-- <div class="mb-3">
                                <label class="form-label">{{ __('Description') }} *</label>
                                <textarea class="form-control" name="description" placeholder="Enter a description"
                                    spellcheck="false" required>{{ $profile->description }}</textarea>
                            </div> --}}

                            {{-- Social Networks --}}
                            {{-- TODO --}}

                            {{-- Picture --}}
                            {{-- TODO --}}

                            <fieldset class="form-fieldset">
                                <h4>{{ __('About') }}</h4>

                                {{-- Job title --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Job Title') }} *</label>
                                    <input type="text" class="form-control" name="job_title" placeholder="Enter a job title"
                                        required value="{{ $profile->job_title }}">
                                </div>

                                {{-- Job Description --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Job description') }} *</label>
                                    <textarea class="form-control" name="job_description"
                                        placeholder="Enter a job description" spellcheck="false"
                                        required>{{ $profile->job_description }}</textarea>
                                </div>

                                {{-- Website --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Website') }}</label>
                                    <input type="text" class="form-control" name="website"
                                        placeholder="Enter your website URL" value="{{ $profile->website }}">
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
                            </fieldset>

                            {{-- Resume --}}
                            {{-- TODO: Add this fields to the E-R model, migrations,
                            controllers, models and seeders --}}
                            <fieldset class="form-fieldset">
                                <h4>{{ __('Resume Summary') }}</h4>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Resume') }}</label>
                                    <textarea class="form-control" name="description"
                                        placeholder="Enter a description for your resume" spellcheck="false"
                                        required>{{ $profile->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Address') }}</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter your address"
                                        value="{{ $user->address }}">
                                </div>
                            </fieldset>

                            {{-- Education --}}
                            <fieldset class="form-fieldset">
                                <h4>{{ __('Resume Education') }}</h4>
                                @foreach ($educations as $education)
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    {{ $education->title }}
                                                </h3>
                                                <div class="card-actions">
                                                    <a class="btn btn-secondary btn-pill w-10 mr-3 float-right"
                                                        data-toggle="modal"
                                                        data-target="#editEducationModal-{{ $education->id }}">
                                                        {{ __('Edit education') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editEducationModal-{{ $education->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="editEducation"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editEducation">
                                                                        {{ __('Edit education') }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education Title') }}</label>
                                                                        <input type="hidden" name="education_id"
                                                                            value="{{ $education->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="education_title"
                                                                            placeholder="Enter your education title"
                                                                            value="{{ $education->title }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education Start Date') }}</label>
                                                                        <input type="hidden" name="education_id"
                                                                            value="{{ $education->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="education_start_date"
                                                                            placeholder="Enter your education start date"
                                                                            value="{{ $education->start_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education End Date') }}</label>
                                                                        <input type="hidden" name="education_id"
                                                                            value="{{ $education->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="education_end_date"
                                                                            placeholder="Enter your education end date"
                                                                            value="{{ $education->end_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education Institution') }}</label>
                                                                        <input type="hidden" name="education_id"
                                                                            value="{{ $education->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="education_institution"
                                                                            placeholder="Enter your education institution"
                                                                            value="{{ $education->institution }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education Description') }}</label>
                                                                        <input type="hidden" name="education_id"
                                                                            value="{{ $education->id }}">
                                                                        <textarea class="form-control"
                                                                            name="education_description"
                                                                            placeholder="Enter your education description"
                                                                            spellcheck="false"
                                                                            required>{{ $education->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <dl class="row">
                                                    <dt class="col-5">{{ __('Start Date') }}:</dt>
                                                    <dd class="col-7">{{ $education->start_date }}</dd>
                                                    <dt class="col-5">{{ __('End Date') }}:</dt>
                                                    <dd class="col-7">{{ $education->end_date }}</dd>
                                                    <dt class="col-5">{{ __('Institution') }}:</dt>
                                                    <dd class="col-7">{{ $education->institution }}</dd>
                                                    <dt class="col-5">{{ __('Description') }}:</dt>
                                                    <dd class="col-7">{{ $education->description }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-actions">
                                    <a class="btn btn-primary btn-pill w-10 mr-3 float-right" data-toggle="modal"
                                        data-target="#createEducationModal">
                                        {{ __('New education') }}
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="createEducationModal" tabindex="-1" role="dialog"
                                        aria-labelledby="createEducation" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createEducation">
                                                        {{ __('New education') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Education Title') }}</label>
                                                        <input type="text" class="form-control" name="education_title"
                                                            placeholder="Enter your education title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Education Start Date') }}</label>
                                                        <input type="date" class="form-control" name="education_start_date"
                                                            placeholder="Enter your education start date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Education End Date') }}</label>
                                                        <input type="date" class="form-control" name="education_end_date"
                                                            placeholder="Enter your education end date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Education Institution') }}</label>
                                                        <input type="text" class="form-control" name="education_institution"
                                                            placeholder="Enter your education institution">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Education Description') }}</label>
                                                        <textarea class="form-control" name="education_description"
                                                            placeholder="Enter your education description"
                                                            spellcheck="false" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="button"
                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            {{-- Professional Experience --}}
                            <fieldset class="form-fieldset">
                                <h4>{{ __('Resume Professional Experience') }}</h4>
                                @foreach ($usersCompanies as $userCompany)
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    {{ $userCompany->title }}
                                                </h3>
                                                <div class="card-actions">
                                                    <a class="btn btn-secondary btn-pill w-10 mr-3 float-right"
                                                        data-toggle="modal"
                                                        data-target="#editCompanyModal-{{ $userCompany->id }}">
                                                        {{ __('Edit professional experience') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editCompanyModal-{{ $userCompany->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="editCompany"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editCompany">
                                                                        {{ __('Edit professional experience') }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience Title') }}</label>
                                                                        <input type="hidden"
                                                                            name="professional_experience_id"
                                                                            value="{{ $userCompany->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="professional_experience_title"
                                                                            placeholder="Enter your professional experience title"
                                                                            value="{{ $userCompany->title }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience Start Date') }}</label>
                                                                        <input type="hidden"
                                                                            name="professional_experience_id"
                                                                            value="{{ $userCompany->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="professional_experience_start_date"
                                                                            placeholder="Enter your professional experience start date"
                                                                            value="{{ $userCompany->start_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience End Date') }}</label>
                                                                        <input type="hidden"
                                                                            name="professional_experience_id"
                                                                            value="{{ $userCompany->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="professional_experience_end_date"
                                                                            placeholder="Enter your professional experience end date"
                                                                            value="{{ $userCompany->end_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience Company') }}</label>
                                                                        <input type="hidden"
                                                                            name="professional_experience_id"
                                                                            value="{{ $userCompany->id }}">
                                                                        {{-- TODO: use search
                                                                        select --}}
                                                                        <input type="text" class="form-control"
                                                                            name="professional_experience_company"
                                                                            placeholder="Enter your professional experience company"
                                                                            value="{{ $userCompany->company_id->name }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience Description') }}</label>
                                                                        <input type="hidden"
                                                                            name="professional_experience_id"
                                                                            value="{{ $userCompany->id }}">
                                                                        <textarea class="form-control"
                                                                            name="professional_experience_description"
                                                                            placeholder="Enter your professional experience description"
                                                                            spellcheck="false"
                                                                            required>{{ $userCompany->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <dl class="row">
                                                    <dt class="col-5">{{ __('Start Date') }}:</dt>
                                                    <dd class="col-7">{{ $userCompany->start_date }}</dd>
                                                    <dt class="col-5">{{ __('End Date') }}:</dt>
                                                    <dd class="col-7">{{ $userCompany->end_date }}</dd>
                                                    <dt class="col-5">{{ __('Company') }}:</dt>
                                                    <dd class="col-7">{{ $userCompany->company_id->name }}</dd>
                                                    <dt class="col-5">{{ __('Description') }}:</dt>
                                                    <dd class="col-7">{{ $userCompany->description }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-actions">
                                    <a class="btn btn-primary btn-pill w-10 mr-3 float-right" data-toggle="modal"
                                        data-target="#newCompanyModal">
                                        {{ __('New professional experience') }}
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newCompanyModal" tabindex="-1" role="dialog"
                                        aria-labelledby="createCompany" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createCompany">
                                                        {{ __('New professional experience') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Professional Experience Title') }}</label>
                                                        <input type="text" class="form-control"
                                                            name="professional_experience_title"
                                                            placeholder="Enter your professional experience title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Professional Experience Start Date') }}</label>
                                                        <input type="date" class="form-control"
                                                            name="professional_experience_start_date"
                                                            placeholder="Enter your professional experience start date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Professional Experience End Date') }}</label>
                                                        <input type="date" class="form-control"
                                                            name="professional_experience_end_date"
                                                            placeholder="Enter your professional experience end date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Professional Experience Company') }}</label>
                                                        {{-- TODO: use search
                                                        select --}}
                                                        <input type="text" class="form-control"
                                                            name="professional_experience_company"
                                                            placeholder="Enter your professional experience company">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Professional Experience Description') }}</label>
                                                        <textarea class="form-control"
                                                            name="professional_experience_description"
                                                            placeholder="Enter your professional experience description"
                                                            spellcheck="false" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="button"
                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            {{-- Volunteering --}}
                            <fieldset class="form-fieldset">
                                <h4>{{ __('Resume Volunteering') }}</h4>
                                @foreach ($charities as $charity)
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    {{ $charity->title }}
                                                </h3>
                                                <div class="card-actions">
                                                    <a class="btn btn-secondary btn-pill w-10 mr-3 float-right"
                                                        data-toggle="modal"
                                                        data-target="#editCharityModal-{{ $charity->id }}">
                                                        {{ __('Edit volunteering') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editCharityModal-{{ $charity->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="editCharity"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editCharity">
                                                                        {{ __('Edit volunteering') }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteeting Title') }}</label>
                                                                        <input type="hidden"
                                                                            name="charity_id"
                                                                            value="{{ $charity->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="charity_title"
                                                                            placeholder="Enter your volunteering title"
                                                                            value="{{ $charity->title }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering Start Date') }}</label>
                                                                        <input type="hidden"
                                                                            name="charity_id"
                                                                            value="{{ $charity->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="charity_start_date"
                                                                            placeholder="Enter your volunteering start date"
                                                                            value="{{ $charity->start_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering End Date') }}</label>
                                                                        <input type="hidden"
                                                                            name="charity_id"
                                                                            value="{{ $charity->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="charity_end_date"
                                                                            placeholder="Enter your volunteering end date"
                                                                            value="{{ $charity->end_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering Company') }}</label>
                                                                        <input type="hidden"
                                                                            name="charity_id"
                                                                            value="{{ $charity->id }}">
                                                                        {{-- TODO: use search
                                                                        select --}}
                                                                        <input type="text" class="form-control"
                                                                            name="charity_company"
                                                                            placeholder="Enter your volunteering company"
                                                                            value="{{ $charity->company_id->name }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering Description') }}</label>
                                                                        <input type="hidden"
                                                                            name="charity_id"
                                                                            value="{{ $charity->id }}">
                                                                        <textarea class="form-control"
                                                                            name="charity_description"
                                                                            placeholder="Enter your volunteering description"
                                                                            spellcheck="false"
                                                                            required>{{ $charity->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <dl class="row">
                                                    <dt class="col-5">{{ __('Start Date') }}:</dt>
                                                    <dd class="col-7">{{ $charity->start_date }}</dd>
                                                    <dt class="col-5">{{ __('End Date') }}:</dt>
                                                    <dd class="col-7">{{ $charity->end_date }}</dd>
                                                    <dt class="col-5">{{ __('Company') }}:</dt>
                                                    <dd class="col-7">{{ $charity->company_id->name }}</dd>
                                                    <dt class="col-5">{{ __('Description') }}:</dt>
                                                    <dd class="col-7">{{ $charity->description }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-actions">
                                    <a class="btn btn-primary btn-pill w-10 mr-3 float-right" data-toggle="modal"
                                        data-target="#newCharityModal">
                                        {{ __('New volunteering') }}
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newCharityModal" tabindex="-1" role="dialog"
                                        aria-labelledby="createCharity" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createCharity">
                                                        {{ __('New volunteering') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering Title') }}</label>
                                                        <input type="text" class="form-control"
                                                            name="charity_title"
                                                            placeholder="Enter your volunteering title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering Start Date') }}</label>
                                                        <input type="date" class="form-control"
                                                            name="charity_start_date"
                                                            placeholder="Enter your volunteering start date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering End Date') }}</label>
                                                        <input type="date" class="form-control"
                                                            name="charity_experience_end_date"
                                                            placeholder="Enter your volunteering end date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering Company') }}</label>
                                                        {{-- TODO: use search
                                                        select --}}
                                                        <input type="text" class="form-control"
                                                            name="charity_company"
                                                            placeholder="Enter your volunteering company">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering Description') }}</label>
                                                        <textarea class="form-control"
                                                            name="charity_description"
                                                            placeholder="Enter your volunteering description"
                                                            spellcheck="false" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="button"
                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            {{-- Skills --}}
                            {{-- TODO - add all the skills in the database
                            --}}

                            {{-- Certificates --}}
                            <fieldset class="form-fieldset">
                                <h4>{{ __('Certificates') }}</h4>
                                @foreach ($certificates as $certificate)
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    {{ $certificate->name }}
                                                </h3>
                                                <div class="card-actions">
                                                    <a class="btn btn-secondary btn-pill w-10 mr-3 float-right"
                                                        data-toggle="modal"
                                                        data-target="#editCertificateModal-{{ $certificate->id }}">
                                                        {{ __('Edit certificate') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editCertificateModal-{{ $certificate->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="editCertificate"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editCertificate">
                                                                        {{ __('Edit certificate') }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">{{ __('Name') }}</label>
                                                                        <input type="hidden" name="certificate_id"
                                                                            value="{{ $certificate->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="certificate_name"
                                                                            placeholder="Enter your certificate name"
                                                                            value="{{ $certificate->name }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Certification date') }}</label>
                                                                        <input type="hidden" name="certificate_id"
                                                                            value="{{ $certificate->id }}">
                                                                        <input type="date" class="form-control"
                                                                            name="certification_date"
                                                                            placeholder="Enter your certification date"
                                                                            value="{{ $certificate->certification_date }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">{{ __('File') }}
                                                                        </label>
                                                                        <input type="hidden" name="certificate_id"
                                                                            value="{{ $certificate->id }}">
                                                                        <input type="file" class="form-control"
                                                                            name="certificate_file">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <dl class="row">
                                                    <dt class="col-5">{{ __('Certification date') }}:</dt>
                                                    <dd class="col-7">
                                                        {{ $certificate->certification_date }}
                                                    </dd>
                                                    <dt class="col-5">{{ __('File') }}:</dt>
                                                    {{ $certificate->file }}
                                                    <dd class="col-7"><a href="" target="_blank"><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                <path
                                                                    d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5" />
                                                                <circle cx="6" cy="14" r="3" />
                                                                <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5" />
                                                            </svg></a></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-actions">
                                    <a class="btn btn-primary btn-pill w-10 mr-3 float-right" data-toggle="modal"
                                        data-target="#createCertificateModal">
                                        {{ __('New certificate') }}
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="createCertificateModal" tabindex="-1" role="dialog"
                                        aria-labelledby="createCertificate" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createCertificate">
                                                        {{ __('New certificate') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Name') }}</label>
                                                        <input type="text" class="form-control" name="certificate_name"
                                                            placeholder="Enter your certificate name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Certification date') }}</label>
                                                        <input type="date" class="form-control" name="certification_date"
                                                            placeholder="Enter your certification date">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('File') }}
                                                        </label>
                                                        <input type="file" class="form-control" name="certificate_file">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="button"
                                                        class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
