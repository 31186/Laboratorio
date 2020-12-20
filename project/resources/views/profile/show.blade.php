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
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $visitedUser->first_name . ' ' . $visitedUser->last_name }}</h1>
            <p>{{ __("I'm") }} <span class="typed" data-typed-items="{{ $profile->job_title }}"></span></p>
        </div>
    </section>
    <!-- End Hero -->
@endsection

@section('content')
    <div id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>{{ __('About') }}</h2>
                    {{-- <p>{{ $profile->description }}</p> --}}
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="{{ asset($profile->picture) }}" class="img-fluid" alt="">
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
                                        {{ $profile->website }}
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
                                    <li><i class="icofont-rounded-right"></i> <strong>{{ __('PhEmailone') }}:</strong>
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
        {{-- TODO: Add CSS --}}
        <section id="social">
            <div class="container">
                <div class="social-links mt-3 text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/{{ $visitedUser->sn_linkedin }}/" class="linkedin"><i
                            class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </section>
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

                        {{-- Show skills here --}}
                        {{-- @foreach ($skills as $skill)
                            <div class="progress">
                                <span class="skill">HTML <i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                        aria-valuemax="100"></div>
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
                            {{-- Read description from CV json stored in bd
                            --}}
                            <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and
                                    developing user-centered digital/print marketing material from initial concept to final,
                                    polished deliverable.</em></p>
                            <ul>
                                {{-- Read Address from CV json stored in bd
                                --}}
                                <li>Portland par 127,Orlando, FL</li>
                                <li>{{ $profile->phone }}</li>
                                <li>{{ $visitedUser->email }}</li>
                            </ul>
                        </div>

                        <h3 class="resume-title">{{ __('Education') }}</h3>
                        <div class="resume-item">
                            <h4>Master of Fine Arts &amp; Graphic Design</h4>
                            <h5>2015 - 2016</h5>
                            <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                            <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero
                                voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
                        </div>
                        <div class="resume-item">
                            <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                            <h5>2010 - 2014</h5>
                            <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                            <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel
                                ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur
                                neque etlon sader mart dila</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">{{ __('Professional Experience') }}</h3>
                        <div class="resume-item">
                            <h4>Senior graphic design specialist</h4>
                            <h5>2019 - Present</h5>
                            <p><em>Experion, New York, NY </em></p>
                            <ul>
                                <li>Lead in the design, development, and implementation of the graphic, layout, and
                                    production communication materials</li>
                                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of
                                    the project. </li>
                                <li>Supervise the assessment of all graphic materials in order to ensure quality and
                                    accuracy of the design</li>
                                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000
                                </li>
                            </ul>
                        </div>
                        <div class="resume-item">
                            <h4>Graphic design specialist</h4>
                            <h5>2017 - 2018</h5>
                            <p><em>Stepping Stone Advertising, New York, NY</em></p>
                            <ul>
                                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and
                                    advertisements).</li>
                                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                                <li>Created 4+ design presentations and proposals a month for clients and account managers
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Resume Section -->

        <!-- ======= Certificates Section ======= -->
        <section id="certificates" class="certificates">
            <div class="container">

                <div class="section-title">
                    <h2>{{ __('Certificates') }}</h2>
                </div>

                {{-- Foreach certificates --}}
                <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-right">
                    <h3>CERTIFICATE NAME</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Date') }}:</strong> DATA</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <a href="#"><i class="bx bx-award"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= End Certificates Section ======= -->
    </div>
@endsection

@section('footer')
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
