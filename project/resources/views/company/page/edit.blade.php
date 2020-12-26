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
                                    <div class="d-inline-block card p-3 col-2 col-lg-3 ml-2 photoInput mb-3"
                                        style="margin: auto;">
                                        @php
                                        $photo = asset('/uploads/user_placeholder.png');
                                        @endphp

                                        <img src="{{ asset('/uploads/' . $page->logo) }}" alt="{{ __('Insert a logo') }}"
                                            class="rounded mb-3" id="uplImg">
                                        <input type="file" name="logo" id="photoInput" class="inputfile"
                                            value="{{ $page->logo }}" accept="image/x-png,image/jpeg" />
                                        <label for="photoInput" class="btn btn-secondary">
                                            <i class="fe fe-upload mr-3"></i>
                                            <span>{{ __('Update logo') }}</span>
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

                                        <img src="{{ asset('/uploads/' . $page->cover_image) }}"
                                            alt="{{ __('Insert a cover image') }}" class="rounded mb-3" id="uplCover">
                                        <input type="file" name="cover_image" id="coverInput" class="inputfile"
                                            value="{{ $page->cover_image }}" accept="image/x-png,image/jpeg" />
                                        <label for="coverInput" class="btn btn-secondary">
                                            <i class="fe fe-upload mr-3"></i>
                                            <span>{{ __('Update cover image') }}</span>
                                        </label>

                                        {{-- <button type="button"
                                            class="btn btn-danger bg-red-light" id="removePhoto" onclick="clearInput()"
                                            {{ $photo !== 'cover_placeholder.jpg' ? '' : 'style=display:none;' }}>
                                            {{ __('Remove picture') }}
                                        </button> --}}
                                    </div>
                                </div>

                                {{-- Business type --}}
                                {{-- Make new entity to use in search
                                --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Business Type') }} *</label>
                                    <input type="text" class="form-control" name="business_type"
                                        placeholder="Enter a business type" required value="{{ $page->business_type }}">
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
                                    <input type="text" class="form-control" name="country" placeholder="Enter your country"
                                        maxlength="255" value="{{ $page->country }}" required>
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

                        {{-- Skills --}}
                        {{-- <fieldset class="form-fieldset">
                            <h4>{{ __('Skills') }}</h4>
                            <form method="POST" name="updateSkills" action="{{ route('page.update', $page->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Skills') }}</label>
                                    <select name="skills_array[]" multiple id="select-tags-advanced"
                                        class="form-select selectized" multiple="multiple" tabindex="-1"
                                        style="display: none;">
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

                            <form method="POST" name="createSkill" action="{{ route('page.update', $page->id) }}">
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
                        </fieldset> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- TODO: fix preview the one imported in the right place or remove preview and keep the
    file name only --}}
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
                    uploads / Company_placeholder.png ') }}');
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
