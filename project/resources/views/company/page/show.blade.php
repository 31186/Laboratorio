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
        style="background: url({{ asset('/uploads/' . $visitedPage->cover_image) }}) no-repeat;">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $visitedCompany->company_name }}</h1>
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
                        <img src="{{ asset('/uploads/' . $visitedPage->logo) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    @if ($visitedPage->website !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('Website') }}:</strong>
                                            <a href="{{ $visitedPage->website }}"
                                                target="_blank">{{ $visitedPage->website }}</a>
                                        </li>
                                    @endif
                                    @if ($visitedPage->phone !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('Phone') }}:</strong>
                                            {{ $visitedPage->phone }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('Email') }}:</strong>
                                        {{ $visitedCompany->email }}
                                    </li>
                                    @if ($visitedPage->city !== null && $visitedPage->country !== null)
                                        <li><i class="icofont-rounded-right"></i> <strong>{{ __('City') }}:</strong>
                                            {{ $visitedPage->city . ', ' . $visitedPage->country }}
                                        </li>
                                    @else
                                        @if ($visitedPage->city !== null && $visitedPage->country === null)
                                            <li><i class="icofont-rounded-right"></i> <strong>{{ __('City') }}:</strong>
                                                {{ $visitedPage->city }}
                                            </li>
                                        @else
                                            @if ($visitedPage->city === null && $visitedPage->country !== null)
                                                <li><i class="icofont-rounded-right"></i>
                                                    <strong>{{ __('Country') }}:</strong>
                                                    {{ $visitedPage->country }}
                                                </li>
                                            @endif
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <p>{{ $visitedPage->description }}</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Types Section ======= -->
        @if (count($types) !== 0)
            <section id="skills" class="skills section-bg">
                <div class="container">

                    <div class="section-title">
                        @if ($visitedCompany->company_type_id === 1)
                            <h2>{{ __('Business Types') }}</h2>
                        @else
                            <h2>{{ __('Charity Types') }}</h2>
                        @endif
                    </div>

                    <div class="row types-content">
                        <div class="col-lg-12" data-aos="fade-up">

                            @foreach ($types as $type)
                                <div class="progress">
                                    <span class="skill">{{ $type->name }}</span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" aria-valuenow="100" style="width: 100%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
        @endif
        <!-- End types Section -->

        <!-- ======= Social Section ======= -->
        @if ($visitedPage->sn_twitter !== null || $visitedPage->sn_facebook !== null || $visitedPage->sn_instagram !== null || $visitedPage->sn_linkedin !== null)
            @if (count($types) !== 0)
                <section id="social" class="social">
            @else
                <section id="social" class="social section-bg">
            @endif
                <div class="container">
                    <div class="section-title">
                        <h2>{{ __('Social') }}</h2>
                    </div>

                    @if ($visitedPage->sn_twitter !== null)
                        <a href="{{ 'https://twitter.com/' . $visitedPage->sn_twitter }}" target="_blank"
                            class="fa fa-twitter"></a>
                    @endif
                    @if ($visitedPage->sn_facebook !== null)
                        <a href="{{ 'https://www.facebook.com/' . $visitedPage->sn_facebook }}" target="_blank"
                            class="fa fa-facebook"></a>
                    @endif
                    @if ($visitedPage->sn_instagram !== null)
                        <a href="{{ 'https://www.instagram.com/' . $visitedPage->sn_instagram }}" target="_blank"
                            class="fa fa-instagram"></a>
                    @endif
                    @if ($visitedPage->sn_linkedin !== null)
                        <a href="{{ 'https://www.linkedin.com/in/' . $visitedPage->sn_linkedin }}" target="_blank"
                            class="fa fa-linkedin"></a>
                    @endif
                </div>
            </section>
        @endif
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
