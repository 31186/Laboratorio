@extends('../../layouts.app-profile')
@include('sidebar')

@section('fonts')
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
@endsection

@section('styles')
    <!-- Vendor CSS Files -->
    <link href="{{ asset('css/profile/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/profile/index.css') }}" rel="stylesheet">
@endsection

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>Alex Smith</h1>
            <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
        </div>
    </section>
    <!-- End Hero -->
@endsection

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>{{ __('About') }}</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{ asset('img/profile/profile-img.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>UI/UX Designer &amp; Web Developer.</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Birthday') }}:</strong> 1 May 1995
                                </li>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Website') }}:</strong>
                                    www.example.com</li>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Phone') }}:</strong> +123 456 7890
                                </li>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('City') }}:</strong> City : New
                                    York, USA
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Age') }}:</strong> 30</li>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Degree') }}:</strong> Master</li>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('PhEmailone') }}:</strong>
                                    email@example.com
                                </li>
                                <li><i class="icofont-rounded-right"></i> <strong>{{ __('Freelance') }}:</strong> Available
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci
                        omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
                        Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque
                        neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni
                        laudantium dolores.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
        <div class="container">

            <div class="section-title">
                <h2>{{ __('Skills') }}</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
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
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-up">
                    <h3 class="resume-title">Sumary</h3>
                    <div class="resume-item pb-0">
                        <h4>Alex Smith</h4>
                        <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and
                                developing user-centered digital/print marketing material from initial concept to final,
                                polished deliverable.</em></p>
                        <ul>
                            <li>Portland par 127,Orlando, FL</li>
                            <li>(123) 456-7891</li>
                            <li>alice.barkley@example.com</li>
                        </ul>
                    </div>

                    <h3 class="resume-title">Education</h3>
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
                    <h3 class="resume-title">Professional Experience</h3>
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
@endsection

@section('footer')
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/profile/jquery.min.js') }}"></script>
    <script src="{{ asset('js/profile/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/profile/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/profile/validate.js') }}"></script>
    <script src="{{ asset('js/profile/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/profile/counterup.min.js') }}"></script>
    <script src="{{ asset('js/profile/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/profile/venobox.min.js') }}"></script>
    <script src="{{ asset('js/profile/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/profile/typed.min.js') }}"></script>
    <script src="{{ asset('js/profile/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/profile/main.js') }}"></script>
@endsection
