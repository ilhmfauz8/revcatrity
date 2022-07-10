<!--Site Footer One Start-->
<footer class="site-footer">
    <div class="site-footer-bg" style="background-image: url({{ asset('assets/images/backgrounds/footer.jpg') }})"></div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <h3 class="footer-widget__title">About</h3>
                        <p class="footer-widget__text">
                            Lembanga Penggalangan Dana pertama di Indonesia yang berfokus kepada kesejahteraan hewan kucing
                        </p>
                        <a href="#" class="footer-widget__about-btn"><i class="fa fa-heart"></i>Donate
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__explore clearfix">
                        <h3 class="footer-widget__title">Explore</h3>
                        <ul class="footer-widget__explore-list list-unstyled">
                            <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                            <li><a href="{{ route('causes') }}">Donasi</a></li>
                        </ul>
                        <ul class="footer-widget__explore-list footer-widget__explore-list-two list-unstyled">
                           <li><a href="{{ route('tipstrick') }}">Tips & Trick</a></li>
                            <li><a href="{{ route('lapor') }}">Lapor</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__contact">
                        <h3 class="footer-widget__title">Contact</h3>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="icon-chat"></i>
                                </div>
                                <div class="text">
                                    <p>
                                        <span>Nomor yang bisa dihubungi</span>
                                        <a href="tel:6285894558308">6285894558308</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="icon-message"></i>
                                </div>
                                <div class="text">
                                    <p>
                                        <span>Send Email</span>
                                        <a href="mailto:needhelp@company.com">catrityindonesia@gmail.com</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="icon-chat"></i>
                                </div>
                                <div class="text">
                                    <p>
                                        <span>Lapor</span>
                                        <a href="{{ route('lapor') }}">Lapor Kucing Terlantar</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__newsletter">
                        <h3 class="footer-widget__title">Newsletter</h3>
                        <p class="footer-widget__newsletter-text">
                            Subscribe Berita Terupdate.
                        </p>
                        <form class="footer-widget__newsletter-form">
                            <input type="email" placeholder="Email address" name="email" />
                            <button type="submit" class="footer-widget__newsletter-btn">
                                <i class="fas fa-arrow-circle-right"></i>Send
                            </button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="site-footer__bottom">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <div class="site-footer__bottom-logo-social">
                            <div class="site-footer__bottom-logo">
                                <a href="{{ route('home') }}">
                                    <h1>Catrity</h1>
                                </a>
                            </div>
                            <div class="site-footer__bottom-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="site-footer__bottom-copy-right">
                            <p>© Copyright 2022 by <a href="{{ route('home') }}">Catrity.id</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer One End-->
