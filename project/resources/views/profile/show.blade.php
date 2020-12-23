@extends('layouts.app-profile')
@include('sidebar')

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
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="background: url({{ asset('/uploads/' . $profile->cover_image) }}) no-repeat;">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $visitedUser->first_name . ' ' . $visitedUser->last_name }}</h1>
            <p>{{ __("I'm") }} <span class="typed" data-typed-items="{{ $profile->job_title }}"></span></p>
        </div>
    </section>

    {{-- TODO: dynamic --}}
    <style>
        #hero {
            width: 100%;
            height: 100vh;
            background: url("{{ asset('/uploads/' . $profile->picture) }}") top center;
            background-size: cover;
        }

    </style>
    <!-- End Hero -->
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
                        <img src="{{ asset('/uploads/' . $profile->picture) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>{{ $profile->job_title }}</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Birthday') }}:</strong>
                                        {{ $newDate = date('F j, Y', strtotime($visitedUser->birthday)) }}
                                    </li>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Website') }}:</strong>
                                        <a href="{{ $profile->website }}" target="_blank">{{ $profile->website }}</a>
                                    </li>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Phone') }}:</strong>
                                        {{ $profile->phone }}
                                    </li>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('City') }}:</strong>
                                        {{ $profile->city . ', ' . $profile->country }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Age') }}:</strong>
                                        {{ floor((time() - strtotime($user->birthday)) / 31556926) }}
                                    </li>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Degree') }}:</strong>
                                        {{ $profile->degree }}
                                    </li>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Email') }}:</strong>
                                        {{ $visitedUser->email }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>{{ $profile->job_description }}</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Social Section ======= -->
        {{-- <section id="social">
            <div class="container"> --}}
                {{-- TODO: use bootstrap or tabler social icons
                --}}
                {{-- <div class="social-links mt-3 text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/{{ $visitedUser->sn_linkedin }}/" class="linkedin"><i
                            class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </section> --}}
        <!-- ======= End Social Section ======= -->

        <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>{{ __('Skills') }}</h2>
                </div>

                <div class="row skills-content">

                    <div class="col-lg-6" data-aos="fade-up">

                        <div class="progress">
                            <span class="skill">HTML <i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">CSS <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">JavaScript <i class="val">75%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        {{-- TODO: skills --}}
                        {{-- Show skills here --}}
                        {{-- @foreach ($skills as $skill)
                            <div class="progress">
                                <span class="skill">{{ $skill->name }}<i class="val">{{ $skill->percentage }}%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percentage }}"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endforeach --}}
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                        <div class="progress">
                            <span class="skill">PHP <i class="val">80%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">WordPress/CMS <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">Photoshop <i class="val">55%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">

                <div class="section-title">
                    <h2>{{ __('Resume') }}</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h3 class="resume-title">{{ __('Summary') }}</h3>
                        <div class="resume-item pb-0">
                            <h4>{{ $visitedUser->first_name . ' ' . $visitedUser->last_name }}</h4>
                            <p><em>{{ $profile->description }}</em></p>
                            <ul>
                                <li>{{ $profile->phone }}</li>
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
            <section id="certificates" class="certificates section-bg">
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
                                        <a href="{{ $certificate->file }}" target="_blank"><svg
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
