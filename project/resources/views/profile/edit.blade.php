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
                        {{-- User information --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('User information') }}</h4>

                            <form method="POST" name="updateUser" action="{{ route('profile.update', $profile->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}

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

                                <button type="submit" name="updateUser"
                                    class="btn btn-success">{{ __('Save Changes') }}</button>
                            </form>
                        </fieldset>

                        {{-- About --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('About') }}</h4>

                            <form method="POST" name="updateProfile" enctype="multipart/form-data"
                                action="{{ route('profile.update', $profile->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Profile Picture & Cover image') }}</label>

                                    {{-- Picture --}}
                                    <div class="d-inline-block card p-3 col-2 col-lg-3 ml-2 photoInput mb-3"
                                        style="margin: auto;">
                                        @php
                                        $photo = asset('/uploads/user_placeholder.png');
                                        @endphp

                                        <img src="{{ asset('/uploads/' . $profile->picture) }}"
                                            alt="{{ __('Insert a profile image') }}" class="rounded mb-3" id="uplImg">
                                        <input type="file" name="picture" id="photoInput" class="inputfile"
                                            value="{{ $profile->picture }}" accept="image/x-png,image/jpeg" />
                                        <label for="photoInput" class="btn btn-secondary">
                                            <i class="fe fe-upload mr-3"></i>
                                            <span>{{ __('Update picture') }}</span>
                                        </label>

                                        {{-- <button type="button"
                                            class="btn btn-danger bg-red-light" id="removePhoto" onclick="clearInput()"
                                            {{ $photo !== 'user_placeholder.png' ? '' : 'style=display:none;' }}>
                                            {{ __('Remove picture') }}
                                        </button> --}}
                                    </div>

                                    {{-- Cover Image --}}
                                    <div class="d-inline-block card p-2 col-2 col-lg-7 ml-5 coverInput mb-3"
                                        style="margin: auto;">
                                        @php
                                        $photo = asset('/uploads/cover_placeholder.jpg');
                                        @endphp

                                        <img src="{{ asset('/uploads/' . $profile->cover_image) }}"
                                            alt="{{ __('Insert a cover image') }}" class="rounded mb-3" id="uplCover">
                                        <input type="file" name="cover_image" id="coverInput" class="inputfile"
                                            value="{{ $profile->cover_image }}" accept="image/x-png,image/jpeg" />
                                        <label for="coverInput" class="btn btn-secondary">
                                            <i class="fe fe-upload mr-3"></i>
                                            <span>{{ __('Update cover image') }}</span>
                                        </label>

                                        {{-- <button type="button"
                                            class="btn btn-danger bg-red-light" id="removePhoto" onclick="clearInput()"
                                            {{ $photo !== 'user_placeholder.png' ? '' : 'style=display:none;' }}>
                                            {{ __('Remove picture') }}
                                        </button> --}}
                                    </div>
                                </div>

                                {{-- Social Networks --}}
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

                                {{-- Bio --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Bio') }}</label>
                                    <textarea class="form-control" name="description"
                                        placeholder="Enter a bio for your profile" spellcheck="false"
                                        required>{{ $profile->description }}</textarea>
                                </div>

                                <button type="submit" name="updateProfile"
                                    class="btn btn-success">{{ __('Save Changes') }}</button>
                            </form>
                        </fieldset>

                        {{-- Resume Education --}}
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

                                                            <form method="POST" name="updateEducation"
                                                                action="{{ route('profile.update', $profile->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}

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
                                                                        <input type="date" class="form-control"
                                                                            name="education_start_date"
                                                                            placeholder="Enter your education start date"
                                                                            value="{{ $education->start_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education End Date') }}</label>
                                                                        <input type="date" class="form-control"
                                                                            name="education_end_date"
                                                                            placeholder="Enter your education end date"
                                                                            value="{{ $education->end_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education Institution') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            name="education_institution"
                                                                            placeholder="Enter your education institution"
                                                                            value="{{ $education->institution }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Education Description') }}</label>
                                                                        <textarea class="form-control"
                                                                            name="education_description"
                                                                            placeholder="Enter your education description"
                                                                            spellcheck="false">{{ $education->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="submit" name="updateEducation"
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

                                            <form method="POST" name="createEducation"
                                                action="{{ route('profile.update', $profile->id) }}">
                                                @csrf
                                                {{ method_field('PATCH') }}

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
                                                            spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="submit" name="createEducation"
                                                        class="btn btn-success">{{ __('Save Changes') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        {{-- Resume Professional Experience --}}
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

                                                            <form method="POST" name="updateProfessionalExperience"
                                                                action="{{ route('profile.update', $profile->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}

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
                                                                        <input type="date" class="form-control"
                                                                            name="professional_experience_start_date"
                                                                            placeholder="Enter your professional experience start date"
                                                                            value="{{ $userCompany->start_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience End Date') }}</label>
                                                                        <input type="date" class="form-control"
                                                                            name="professional_experience_end_date"
                                                                            placeholder="Enter your professional experience end date"
                                                                            value="{{ $userCompany->end_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience Company') }}</label>
                                                                        <select class="form-control"
                                                                            name="professional_experience_company_id">
                                                                            @foreach ($companies as $company)
                                                                                <option value="{{ $company->id }}">
                                                                                    {{ $company->company_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Professional Experience Description') }}</label>
                                                                        <textarea class="form-control"
                                                                            name="professional_experience_description"
                                                                            placeholder="Enter your professional experience description"
                                                                            spellcheck="false">{{ $userCompany->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="submit"
                                                                        name="updateProfessionalExperience"
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
                                                <dt class="col-5">{{ __('Start Date') }}:</dt>
                                                <dd class="col-7">{{ $userCompany->start_date }}</dd>
                                                <dt class="col-5">{{ __('End Date') }}:</dt>
                                                <dd class="col-7">{{ $userCompany->end_date }}</dd>
                                                <dt class="col-5">{{ __('Company') }}:</dt>
                                                <dd class="col-7">{{ $userCompany->company_name }}</dd>
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

                                            <form method="POST" name="createProfessionalExperience"
                                                action="{{ route('profile.update', $profile->id) }}">
                                                @csrf
                                                {{ method_field('PATCH') }}

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
                                                        <label for="companies"
                                                            class="form-label">{{ __('Professional Experience Company') }}</label>

                                                        <select class="form-control"
                                                            name="professional_experience_company_id">
                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id }}">
                                                                    {{ $company->company_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Professional Experience Description') }}</label>
                                                        <textarea class="form-control"
                                                            name="professional_experience_description"
                                                            placeholder="Enter your professional experience description"
                                                            spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="submit" name="createProfessionalExperience"
                                                        class="btn btn-success">{{ __('Save Changes') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        {{-- Resume Volunteering --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('Resume Volunteering') }}</h4>
                            @foreach ($usersCharities as $usersCharity)
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                {{ $usersCharity->title }}
                                            </h3>
                                            <div class="card-actions">
                                                <a class="btn btn-secondary btn-pill w-10 mr-3 float-right"
                                                    data-toggle="modal"
                                                    data-target="#editusersCharityModal-{{ $usersCharity->id }}">
                                                    {{ __('Edit volunteering') }}
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editusersCharityModal-{{ $usersCharity->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="editusersCharity"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">

                                                            <form method="POST" name="updateVolunteering"
                                                                action="{{ route('profile.update', $profile->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editusersCharity">
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
                                                                        <input type="hidden" name="charity_id"
                                                                            value="{{ $usersCharity->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="charity_title"
                                                                            placeholder="Enter your volunteering title"
                                                                            value="{{ $usersCharity->title }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering Start Date') }}</label>
                                                                        <input type="date" class="form-control"
                                                                            name="charity_start_date"
                                                                            placeholder="Enter your volunteering start date"
                                                                            value="{{ $usersCharity->start_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering End Date') }}</label>
                                                                        <input type="date" class="form-control"
                                                                            name="charity_end_date"
                                                                            placeholder="Enter your volunteering end date"
                                                                            value="{{ $usersCharity->end_date }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering Company') }}</label>

                                                                        <select class="form-control"
                                                                            name="charity_company_id">
                                                                            @foreach ($charities as $charity)
                                                                                <option value="{{ $charity->id }}">
                                                                                    {{ $charity->company_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">{{ __('Volunteering Description') }}</label>
                                                                        <textarea class="form-control"
                                                                            name="charity_description"
                                                                            placeholder="Enter your volunteering description"
                                                                            spellcheck="false">{{ $usersCharity->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="submit" name="updateVolunteering"
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
                                                <dt class="col-5">{{ __('Start Date') }}:</dt>
                                                <dd class="col-7">{{ $usersCharity->start_date }}</dd>
                                                <dt class="col-5">{{ __('End Date') }}:</dt>
                                                <dd class="col-7">{{ $usersCharity->end_date }}</dd>
                                                <dt class="col-5">{{ __('Company') }}:</dt>
                                                <dd class="col-7">{{ $usersCharity->company_name }}</dd>
                                                <dt class="col-5">{{ __('Description') }}:</dt>
                                                <dd class="col-7">{{ $usersCharity->description }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="card-actions">
                                <a class="btn btn-primary btn-pill w-10 mr-3 float-right" data-toggle="modal"
                                    data-target="#newusersCharityModal">
                                    {{ __('New volunteering') }}
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="newusersCharityModal" tabindex="-1" role="dialog"
                                    aria-labelledby="createusersCharity" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <form method="POST" name="createVolunteering"
                                                action="{{ route('profile.update', $profile->id) }}">
                                                @csrf
                                                {{ method_field('PATCH') }}

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createVolunteering">
                                                        {{ __('New volunteering') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Volunteering Title') }}</label>
                                                        <input type="text" class="form-control" name="charity_title"
                                                            placeholder="Enter your volunteering title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering Start Date') }}</label>
                                                        <input type="date" class="form-control" name="charity_start_date"
                                                            placeholder="Enter your volunteering start date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Volunteering End Date') }}</label>
                                                        <input type="date" class="form-control" name="charity_end_date"
                                                            placeholder="Enter your volunteering end date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Volunteering Company') }}</label>

                                                        <select class="form-control" name="charity_company_id">
                                                            @foreach ($charities as $charity)
                                                                <option value="{{ $charity->id }}">
                                                                    {{ $charity->company_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Volunteering Description') }}</label>

                                                        <textarea class="form-control" name="charity_description"
                                                            placeholder="Enter your volunteering description"
                                                            spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="submit" name="createVolunteering"
                                                        class="btn btn-success">{{ __('Save Changes') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        {{-- Skills --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('Skills') }}</h4>
                            <form method="POST" name="updateSkills" action="{{ route('profile.update', $profile->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Skills') }}</label>
                                    <select name="skills_array[]" multiple id="select-tags-advanced" class="form-select selectized"
                                        multiple="multiple" tabindex="-1" style="display: none;">
                                        @foreach ($skills as $skill)
                                            @foreach ($currentSkills as $currentSkill)
                                                @if (strcmp($skill->name, $currentSkill->name) === 0)
                                                    <option value="{{ $skill->name }}" selected="selected">
                                                        {{ $skill->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <option value="{{ $skill->name }}">
                                                {{ $skill->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="selectize-dropdown multi form-select plugin-remove_button"
                                        style="display: none; visibility: visible; width: 402px; top: 34px; left: 0px;">
                                        <div class="selectize-dropdown-content">
                                            @foreach ($skills as $skill)
                                                <div class="option" data-selectable="" data-value="{{ $skill->name }}">
                                                    {{ $skill->name }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="submit" name="updateSkills"
                                        class="btn btn-success w-10 mt-3">{{ __('Save Changes') }}</button>
                                </div>
                            </form>

                            <form method="POST" name="createSkill" action="{{ route('profile.update', $profile->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="mb-3">
                                    <h6>{{ __('Could not find currentSkill? Create your own') }}</h4>
                                        <input type="text" class="form-control" name="skill_name"
                                            placeholder="Enter your currentSkill name">
                                        <button type="submit" name="createSkill"
                                            class="btn btn-success w-10 mt-3">{{ __('Save Changes') }}</button>
                                </div>
                            </form>
                        </fieldset>

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

                                                            <form method="POST" name="updateCertificate"
                                                                action="{{ route('profile.update', $profile->id) }}">
                                                                @csrf
                                                                {{ method_field('PATCH') }}

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
                                                                        <input type="date" class="form-control"
                                                                            name="certification_date"
                                                                            placeholder="Enter your certification date"
                                                                            value="{{ $certificate->certification_date }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">{{ __('File') }}
                                                                        </label>
                                                                        <input type="file" name="certificate_file"
                                                                            class="form-control" accept=".pdf"
                                                                            value="{{ $certificate->file }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                                    <button type="submit" name="updateCertificate"
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
                                                <dt class="col-5">{{ __('Certification date') }}:</dt>
                                                <dd class="col-7">
                                                    {{ $certificate->certification_date }}
                                                </dd>
                                                <dt class="col-5">{{ __('File') }}:</dt>
                                                <dd class="col-7"><a href="{{ $certificate->file }}" target="_blank"><svg
                                                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                            <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5" />
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

                                            <form method="POST" name="createCertificate" enctype="multipart/form-data"
                                                action="{{ route('profile.update', $profile->id) }}">
                                                @csrf
                                                {{ method_field('PATCH') }}

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
                                                        <input type="file" name="certificate_file" class="form-control"
                                                            accept=".pdf" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                                    <button type="submit" name="createCertificate"
                                                        class="btn btn-success">{{ __('Save Changes') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{-- TODO: fix preview the one imported in the right place or remove preview and keep the file name only --}}
    <script>
        readURL = input => {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#uplImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                setTimeout(() => {
                    $('#removePhoto').css('display', 'block');
                }, 1000);
            } else {
                $('#uplImg').attr('src', '{{ asset('
                    uploads / user_placeholder.png ') }}');
                $("#photoInput").next('label').find('span').html('Carregar Foto');
                $('#removePhoto').css('display', 'none');
            }
        }
        $("#photoInput").change(function() {
            readURL(this);
        });

        function clearInput() {
            $("#photoInput").val('');
            readURL(this);
        }

        $('.photoInput img').click(function() {
            $('#photoInput').trigger('click');
        });

    </script>

    <script>
        readURL = input => {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#uplCover').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                setTimeout(() => {
                    $('#removePhoto').css('display', 'block');
                }, 1000);
            } else {
                $('#uplCover').attr('src', '{{ asset('
                    uploads / cover_placeholder.jpg ') }}');
                $("#coverInput").next('label').find('span').html('Carregar Foto');
                $('#removePhoto').css('display', 'none');
            }
        }
        $("#coverInput").change(function() {
            readURL(this);
        });

        function clearInput() {
            $("#coverInput").val('');
            readURL(this);
        }

        $('.coverInput img').click(function() {
            $('#coverInput').trigger('click');
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#select-tags-advanced').selectize({
                maxItems: 15,
                plugins: ['remove_button'],
            });
        });

    </script>
@endsection
