<header class="main-header-two clearfix">
    <div class="main-header-two__inner">
        <div class="container">
            <div class="main-header-two__top clearfix">
                <div class="main-header-two__logo">
                    <a>
                        <h1>Catrity</h1>
                        <img class="logo_image" width="185"
                        src="{{ asset('assets/images/shapes/logo_cat_tanpanama.png') }}" alt="" />
                        {{-- <img class="logo_image" width="140"
                            src="{{ asset('assets/images/shapes/logo_cat_putih.png') }}" alt="" /> --}}

                    </a>
                </div>
                <div class="main-header-two__contact-info">
                    <ul class="main-header-two__contact-list list-unstyled">
                        <li>
                            <div class="main-header-two__contact-icon">
                                <span class="icon-chat"></span>
                            </div>
                            <div class="main-header-two__contact-text">
                                <p>Nomor yang bisa dihubungi</p>
                                <a href="tel:6285894558308">62858-9455-8308</a>
                            </div>
                        </li>
                        <li>
                            <div class="main-header-two__contact-icon">
                                <span class="icon-message"></span>
                            </div>
                            <div class="main-header-two__contact-text">
                                <p>Email</p>
                                <a href="mailto:Catrityindonesia@gmail.com">Catrityindonesia@gmail.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="main-header-two__contact-icon">
                                <span class="icon-charity"></span>
                            </div>
                            <div class="main-header-two__contact-text">
                                <p>Memberi Donasi</p>
                                <a href="{{ route('causes') }}">Donasi</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header-two__bottom">
        <nav class="main-menu main-menu__two">
            <div class="container">
                <div class="main-menu__inner clearfix">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                        <li><a href="{{ route('causes') }}">Donasi</a></li>
                        {{-- <li class="dropdown">
                            <a href="#">Events</a>
                            <ul>
                                <li><a href="{{ route('event') }}">Events</a></li>
                                <li><a href="{{ route('event_detail') }}">Event Details</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="dropdown">
                            <a href="#">Events</a>
                            <ul>
                                <li><a href="{{ route('event') }}">Events</a></li>
                                <li><a href="{{ route('event_detail') }}">Event Details</a></li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="{{ route('tipstrick') }}">Tips & Trick</a>
                        </li>
                        <li><a href="{{ route('lapor') }}">Lapor</a></li>
                    </ul>
                    <div class="main-menu__right">

                        {{-- <div class="main-menu__right-social">

                            <a href="#"><i class="fab fa-twitter"></i></a>
                            {{-- <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a> --}}
                            {{-- <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a> --}}
                        <a href="{{ url('login') }}" class="main-header-two__login-btn"><i
                                class="fa fa-home"></i>
                            Login</a>
                        {{-- <a href="#" class="main-menu__cart icon-shopping-cart"></a> --}}
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
