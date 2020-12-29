@extends('layouts.app-profile')
@include('company.sidebar')

@section('content')
    <div class="content" id="main">
        <div class="container-xl">
            <div class="col-md-12 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Edit your page') }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- Company information --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('Company information') }}</h4>

                            <form method="POST" name="updateCompany" action="{{ route('page.update', $page->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}

                                {{-- Name --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Name') }} *</label>
                                    <input type="text" class="form-control" name="company_name" maxlength="255"
                                        placeholder="Enter your company name" required value="{{ $company->company_name }}">
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Email') }} *</label>
                                    <input type="email" class="form-control" name="email" maxlength="255"
                                        placeholder="Enter your company email" required value="{{ $company->email }}">
                                </div>

                                <button type="submit" name="updateCompany"
                                    class="btn btn-success">{{ __('Save Changes') }}</button>
                            </form>
                        </fieldset>

                        {{-- About --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('About') }}</h4>

                            <form method="POST" name="updatePage" enctype="multipart/form-data"
                                action="{{ route('page.update', $page->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Logo & Cover image') }}</label>

                                    {{-- Logo --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Company logo') }}
                                        </label>
                                        <input type="file" name="logo" class="form-control" accept="image/x-png,image/jpeg"
                                            value="{{ $page->logo }}" />
                                    </div>

                                    {{-- Cover Image --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Cover Image') }}
                                        </label>
                                        <input type="file" name="cover_image" class="form-control"
                                            accept="image/x-png,image/jpeg" value="{{ $page->cover_image }}" />
                                    </div>

                                    {{-- Description --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Description') }} *</label>
                                        <textarea class="form-control" name="description" maxlength="255"
                                            placeholder="Enter a description for your page" spellcheck="false"
                                            required>{{ $page->description }}</textarea>
                                    </div>

                                    {{-- Website --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Website') }}</label>
                                        <input type="text" class="form-control" name="website" maxlength="255"
                                            placeholder="Enter your website URL" value="{{ $page->website }}">
                                    </div>

                                    {{-- Phone --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Phone number') }} *</label>
                                        <input type="text" name="phone" class="form-control" data-mask="000000000"
                                            data-mask-visible="true" placeholder="000000000" value="{{ $page->phone }}"
                                            autocomplete="off" required>
                                    </div>

                                    {{-- Country --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Country') }} *</label>
                                        <input type="text" class="form-control" name="country"
                                            placeholder="Enter your country" maxlength="255" value="{{ $page->country }}"
                                            required>
                                    </div>

                                    {{-- City --}}
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('City') }} *</label>
                                        <input type="text" class="form-control" name="city" placeholder="Enter your city"
                                            maxlength="255" value="{{ $page->city }}" required>
                                    </div>

                                    <button type="submit" name="updatePage"
                                        class="btn btn-success">{{ __('Save Changes') }}</button>
                            </form>
                        </fieldset>

                        {{-- Social Networks --}}
                        <fieldset class="form-fieldset">
                            <h4>{{ __('Social Networks') }}</h4>

                            <form method="POST" name="updateSocial" action="{{ route('page.update', $page->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}

                                {{-- Twitter --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Twitter') }}
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                https://twitter.com/
                                            </span>
                                            <input type="text" class="form-control" name="sn_twitter" placeholder="twitter"
                                                maxlength="255" value="{{ $page->sn_twitter }}" autocomplete="off">
                                        </div>
                                </div>

                                {{-- Facebook --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Facebook') }}
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                https://www.facebook.com/
                                            </span>
                                            <input type="text" class="form-control" name="sn_facebook" maxlength="255"
                                                placeholder="facebook" value="{{ $page->sn_facebook }}" autocomplete="off">
                                        </div>
                                </div>

                                {{-- Instagram --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Instagram') }}
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                https://www.instagram.com/
                                            </span>
                                            <input type="text" class="form-control" name="sn_instagram" maxlength="255"
                                                placeholder="instagram" value="{{ $page->sn_instagram }}"
                                                autocomplete="off">
                                        </div>
                                </div>

                                {{-- LinkedIn --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('LinkedIn') }}
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                https://www.linkedin.com/in/
                                            </span>
                                            <input type="text" class="form-control" name="sn_linkedin" maxlength="255"
                                                placeholder="linkedin" value="{{ $page->sn_linkedin }}" autocomplete="off">
                                        </div>
                                </div>

                                <button type="submit" name="updateSocial"
                                    class="btn btn-success">{{ __('Save Changes') }}</button>
                            </form>
                        </fieldset>

                        {{-- Types --}}
                        <fieldset class="form-fieldset">
                            @if ($company->company_type_id === 1)
                                <h4>{{ __('Business Types') }}</h4>
                            @else
                                <h4>{{ __('Charity Types') }}</h4>
                            @endif
                            <form method="POST" name="updateBusinessTypes" action="{{ route('page.update', $page->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="mb-3">
                                    @if ($company->company_type_id === 1)
                                        <label class="form-label">{{ __('Business Types') }}</label>
                                    @else
                                        <label class="form-label">{{ __('Charity Types') }}</label>
                                    @endif
                                    <select name="types_array[]" multiple id="select-tags-advanced"
                                        class="form-select selectized" multiple="multiple" tabindex="-1"
                                        style="display: none;">
                                        @foreach ($types as $type)
                                            @foreach ($currentTypes as $currenType)
                                                @if (strcmp($type->name, $currenType->name) === 0)
                                                    <option value="{{ $type->name }}" selected="selected">
                                                        {{ $type->name }}
                                                    </option>
                                                @endif
                                            @endforeach
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
                                    <button type="submit" name="updateBusinessTypes"
                                        class="btn btn-success w-10 mt-3">{{ __('Save Changes') }}</button>
                                </div>
                            </form>

                            <form method="POST" name="createBusinessType" action="{{ route('page.update', $page->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="mb-3">
                                    @if ($company->company_type_id === 1)
                                        <h6>{{ __('Could not find business type? Create your own') }}</h6>
                                        <input type="text" class="form-control" name="type_name" maxlength="255"
                                            placeholder="Enter your business type name">
                                    @else
                                        <h6>{{ __('Could not find charity type? Create your own') }}</h6>
                                        <input type="text" class="form-control" name="type_name" maxlength="255"
                                            placeholder="Enter your charity type name">
                                    @endif
                                    <button type="submit" name="createBusinessType"
                                        class="btn btn-success w-10 mt-3">{{ __('Save Changes') }}</button>
                                </div>
                            </form>
                        </fieldset>
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
                maxItems: 15,
                plugins: ['remove_button'],
            });
        });

    </script>
@endsection
