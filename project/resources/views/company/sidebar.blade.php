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
                <img src="{{ '/uploads/' . $page->logo }}" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light">{{ $company->name }}</h1>
            </div>

            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ url('company/page/' . Auth::id()) }}"><i class="bx bxs-user-detail"></i> <span>{{ __('View page') }}</span></a></li>
                    <li><a href="{{ url('company/page/' . Auth::id()) . '/edit'}}"><i class="bx bx-pencil"></i> <span>{{ __('Edit page') }}</span></a></li>
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
