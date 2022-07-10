<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi Online & Penggalangan Dana Hewna Kucing - Catrity.id</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-server-R99WdErcNmZQ1HIJ4-qDLtVl"></script>
    @include('template.frontend.header_script.header')
    @yield('css')
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('assets/images/loader.png') }}" alt="" />
    </div>
    {{-- <a href="https://api.whatsapp.com/send?phone=6285894558308&text=Halo%21%20Saya%20ingin%20bertanya" class="float" target="_blank">
        <i class="my-float fab fa-whatsapp"></i> --}}
    </a>
    <div class="page-wrapper">

        @include('template.frontend.navbar.navbar')
        <div class="stricky-header stricked-menu main-menu main-menu__two">
            <div class="sticky-header__content"></div>
        </div>
        @yield('content')
        @include('template.frontend.footer.footer')
    </div>

    <!-- /.mobile-nav -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ route('home') }}" aria-label="logo image">
                    <img class="logo_image" width="25"
                        src="{{ asset('assets/images/shapes/main-slider-3-shape-1.png') }}" alt="" />
                    <h1>Catrity</h1>
                </a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">catrityindonesia@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+6285894558308">085894558308</a>
                </li>
            </ul>
        </div>
    </div>
    </div>
    <!-- /.mobile-nav -->

    <!-- /.search-popup -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    @include('template.frontend.footer_script.footer')
    @yield('script')
</body>

</html>
