<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- navbar -->
    <header class="site-navbar site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-3">
                    <div class="site-logo">
                        <a href="{{route('front')}}"><strong>Vehicle Booking</strong></a>
                    </div>
                </div>
                <div class="col-9  text-right">
                    <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>
                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto ">
                            <li class="{{request()->is('/')?'active':'' }}"><a href="{{route('front')}}" class="nav-link">Home</a></li>
                            <li class="{{request()->is('/schedules')?'active':'' }}"><a href="{{route('schedules')}}" class="nav-link">Bus Schedules</a></li>
                            <li class="{{request()->is('/about')?'active':'' }}"><a href="{{route('about')}}" class="nav-link">About</a></li>
                            <li class="{{request()->is('/contact')?'active':'' }}"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                            @auth
                                <li>
                                    <a href="{{route('logout')}}" class="nav-link"
                                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                    >Logout</a>
                                </li>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                @if(auth()->user()->is_customer==1)
                                    <li><a href="{{route('customer.index')}}" class="nav-link">Dashboard</a></li>
                                @else
                                    <li><a href="{{route('home')}}" class="nav-link">Dashboard</a></li>
                                @endif

                            @else
                                <li><a href="{{route('login')}}" class="nav-link">Login</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- navbar end -->