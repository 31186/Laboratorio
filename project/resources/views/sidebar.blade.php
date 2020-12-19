@section('fonts')
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
@endsection

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

@section('sidebar')
    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header">

        <div class="d-flex flex-column">

            <div class="profile">
                <img src="../../img/profile/profile-img.jpg" alt="" class="img-fluid rounded-circle">
                {{-- <img src="{{ $profile->picture }}" alt="" class="img-fluid rounded-circle"> --}}
                <h1 class="text-light">{{ $user->first_name . ' ' . $user->last_name }}</h1>
            </div>

            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ url('profile/' . Auth::id()) }}"><i class="bx bxs-user-detail"></i> <span>{{ __('View profile') }}</span></a></li>
                    <li><a href="{{ url('profile/' . Auth::id()) . '/edit'}}"><i class="bx bx-pencil"></i> <span>{{ __('Edit profile') }}</span></a></li>
                    <li><a href="{{ url('search') }}"><i class="bx bx-search"></i> <span>{{ __('Search') }}</span></a></li>
                    <li><a href="{{ url('interview') }}"><i class="bx bx-video-plus"></i> <span>{{ __('Interviews') }}</span></a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>
                            <span>{{ __('Logout') }}</span></a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

        </div>
    </header>
    <!-- End Header -->

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
