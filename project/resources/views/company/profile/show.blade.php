@extends('layouts.app-profile')
@include('company.sidebar')

@section('styles')
    <!-- Vendor CSS Files -->
    <link href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/profiles.css') }}" rel="stylesheet">
@endsection

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center"
        style="background: url({{ asset('/uploads/' . $visitedProfile->cover_image) }}) no-repeat;">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $visitedUser->first_name . ' ' . $visitedUser->last_name }}</h1>
            @if ($visitedProfile->job_title !== null)
                <p>{{ __("I'm") }} <span class="typed" data-typed-items="{{ $visitedProfile->job_title }}"></span></p>
            @endif
        </div>
    </section>
@endsection

@section('content')
    <div id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>{{ __('About') }}</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="{{ asset('/uploads/' . $visitedProfile->picture) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>{{ $visitedProfile->job_title }}</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Birthday') }}:</strong>
                                        {{ $newDate = date('F j, Y', strtotime($visitedUser->birthday)) }}
                                    </li>
                                    @if ($visitedProfile->website !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('Website') }}:</strong>
                                            <a href="{{ $visitedProfile->website }}"
                                                target="_blank">{{ $visitedProfile->website }}</a>
                                        </li>
                                    @endif
                                    @if ($visitedProfile->phone !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('Phone') }}:</strong>
                                            {{ $visitedProfile->phone }}
                                        </li>
                                    @endif
                                    @if ($visitedProfile->city !== null && $visitedProfile->country !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('City') }}:</strong>
                                            {{ $visitedProfile->city . ', ' . $visitedProfile->country }}
                                        </li>
                                    @else
                                        @if ($visitedProfile->city !== null && $visitedProfile->country === null)
                                            <li><i class="icofont-rounded-right"></i> <strong>{{ __('City') }}:</strong>
                                                {{ $visitedProfile->city }}
                                            </li>
                                        @else
                                            @if ($visitedProfile->city === null && $visitedProfile->country !== null)
                                                <li><i class="icofont-rounded-right"></i>
                                                    <strong>{{ __('Country') }}:</strong>
                                                    {{ $visitedProfile->country }}
                                                </li>
                                            @endif
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Age') }}:</strong>
                                        {{ floor((time() - strtotime($visitedUser->birthday)) / 31556926) }}
                                    </li>
                                    @if ($visitedProfile->degree !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('Degree') }}:</strong>
                                            {{ $visitedProfile->degree }}
                                        </li>
                                    @endif
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Email') }}:</strong>
                                        {{ $visitedUser->email }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>{{ $visitedProfile->job_description }}</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Social Section ======= -->
        @if ($visitedProfile->sn_twitter !== null || $visitedProfile->sn_facebook !== null || $visitedProfile->sn_instagram !== null || $visitedProfile->sn_linkedin !== null)
            <section id="social" class="social section-bg">
                <div class="container">
                    <div class="section-title">
                        <h2>{{ __('Social') }}</h2>
                    </div>

                    @if ($visitedProfile->sn_twitter !== null)
                        <a href="{{ 'https://twitter.com/' . $visitedProfile->sn_twitter }}" target="_blank"
                            class="fa fa-twitter"></a>
                    @endif
                    @if ($visitedProfile->sn_facebook !== null)
                        <a href="{{ 'https://www.facebook.com/' . $visitedProfile->sn_facebook }}" target="_blank"
                            class="fa fa-facebook"></a>
                    @endif
                    @if ($visitedProfile->sn_instagram !== null)
                        <a href="{{ 'https://www.instagram.com/' . $visitedProfile->sn_instagram }}" target="_blank"
                            class="fa fa-instagram"></a>
                    @endif
                    @if ($visitedProfile->sn_linkedin !== null)
                        <a href="{{ 'https://www.linkedin.com/in/' . $visitedProfile->sn_linkedin }}" target="_blank"
                            class="fa fa-linkedin"></a>
                    @endif
                </div>
            </section>
        @endif
        <!-- ======= End Social Section ======= -->

        <!-- ======= Skills Section ======= -->
        @if (count($skills) !== 0)
            <section id="skills" class="skills">
                <div class="container">

                    <div class="section-title">
                        <h2>{{ __('Skills') }}</h2>
                    </div>

                    <div class="row skills-content">
                        <div class="col-lg-12" data-aos="fade-up">

                            @foreach ($skills as $skill)
                                <div class="progress">
                                    <span class="skill">{{ $skill->name }}</span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" aria-valuenow="100"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
        @endif
        <!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>{{ __('Resume') }}</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h3 class="resume-title">{{ __('Summary') }}</h3>
                        <div class="resume-item pb-0">
                            <h4>{{ $visitedUser->first_name . ' ' . $visitedUser->last_name }}</h4>
                            <p><em>{{ $visitedProfile->description }}</em></p>
                            <ul>
                                @if ($visitedProfile->phone !== null)
                                    <li>{{ $visitedProfile->phone }}</li>
                                @endif
                                <li>{{ $visitedUser->email }}</li>
                            </ul>
                        </div>

                        {{-- Education --}}
                        @if (count($educations) != 0)
                            <h3 class="resume-title">{{ __('Education') }}</h3>
                            @foreach ($educations as $education)
                                <div class="resume-item">
                                    <h4>{{ $education->title }}</h4>
                                    <h5>{{ __('Since') . ': ' . $education->start_date . ' || ' . __('Until') . ': ' . $education->end_date }}
                                    </h5>
                                    <p><em>{{ $education->institution }}</em></p>
                                    <p>{{ $education->description }}</p>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                        {{-- Professional Experience --}}
                        @if (count($usersCompanies) != 0)
                            <h3 class="resume-title">{{ __('Professional Experience') }}</h3>
                            <div class="resume-item">
                                @foreach ($usersCompanies as $userCompany)
                                    <h4>{{ $userCompany->title }}</h4>
                                    <h5>{{ __('Since') . ': ' . $userCompany->start_date . ' || ' . __('Until') . ': ' . $userCompany->end_date }}
                                    </h5>
                                    <p><em>{{ $userCompany->company_name }}</em></p>
                                    <p>{{ $userCompany->description }}</p>
                                @endforeach
                            </div>
                        @endif

                        {{-- Volunteering --}}
                        @if (count($usersCharities) != 0)
                            <h3 class="resume-title">{{ __('Volunteering') }}</h3>
                            @foreach ($usersCharities as $charity)
                                <div class="resume-item">
                                    <h4>{{ $charity->title }}</h4>
                                    <h5>{{ __('Since') . ': ' . $charity->start_date . ' || ' . __('Until') . ': ' . $charity->end_date }}
                                    </h5>
                                    <p><em>{{ $charity->company_name }}</em></p>
                                    <p>{{ $charity->description }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </section>
        <!-- End Resume Section -->

        <!-- ======= Certificates Section ======= -->
        @if (count($certificates) != 0)
            <section id="certificates" class="certificates">
                <div class="container">

                    <div class="section-title">
                        <h2>{{ __('Certificates') }}</h2>
                    </div>

                    @foreach ($certificates as $certificate)
                        <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-right">
                            <h3>{{ $certificate->name }}</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('Date') }}:</strong>
                                            {{ $certificate->certification_date }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        <a href="{{ asset('/uploads/' . $certificate->file) }}" target="_blank"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5" />
                                                <circle cx="6" cy="14" r="3" />
                                                <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5" />
                                            </svg></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
        <!-- ======= End Certificates Section ======= -->

        <!-- ======= Schedule Interview Section ======= -->
        <section id="schedule" class="schedule section-bg">
            <div class="container text-center">
                <a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#scheduleMeeting">
                    {{ __('Schedule an interview') }}
                </a>

                <!-- Modal -->
                <div class="modal fade" id="scheduleMeeting" tabindex="-1" role="dialog" aria-labelledby="scheduleMeeting"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <form method="POST" name="scheduleMeeting"
                                action="{{ route('interviews.store') }}">
                                @csrf

                                <div class="modal-header">
                                    <h5 class="modal-title" id="scheduleMeeting">
                                        {{ __('Schedule an Interview') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="user_id" value="{{ $visitedUser->id }}">
                                        <input type="datetime-local" required class="form-control" name="schedule">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ __('Discard') }}</button>
                                    <button type="submit" name="scheduleMeeting"
                                        class="btn btn-success">{{ __('Save Changes') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= End Schedule Interview Section ======= -->
    </div>
@endsection

@section('scripts')
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('libs/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('libs/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('libs/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('libs/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('libs/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('libs/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('libs/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/profiles.js') }}"></script>
@endsection
