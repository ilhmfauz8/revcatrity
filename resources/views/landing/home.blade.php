@extends('template.frontend.main')

@section('css')
    <style>
    </style>
@endsection

@section('content')
    <section class="main-slider main-slider-three">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{
                            "slidesPerView": 1,
                            "loop": true,
                            "effect": "fade",
                            "pagination": {
                                "el": "#main-slider-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": "#main-slider__swiper-button-next",
                                "prevEl": "#main-slider__swiper-button-prev"
                            },
                            "autoplay": {
                                "delay": 5000
                            }}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url(assets/images/backgrounds/banner1.jpg);">
                    </div>
                    <div class="image-layer-overlay"></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="main-slider__content">
                                    <p>Helping Them Today</p>
                                    <h2>
                                        Help a Cat <br />
                                        in Need
                                    </h2>
                                    <a href="{{ route('causes') }}" class="thm-btn"><i
                                            class="fas fa-arrow-circle-right"></i>Bantu
                                        Mereka</a>
                                    <div class="main-slider-three-shape">
                                        <img src="assets/images/shapes/main-slider-3-shape-1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url(assets/images/backgrounds/banner2.jpg);">
                    </div>
                    <div class="image-layer-overlay"></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="main-slider__content">
                                    <p>Helping Them Today</p>
                                    <h2>
                                        Help a Cat <br />
                                        in Need
                                    </h2>

                                    <a href="{{ route('causes') }}" class="thm-btn"><i
                                            class="fas fa-arrow-circle-right"></i>Bantu
                                        Mereka</a>
                                    <div class="main-slider-three-shape">
                                        <img src="assets/images/shapes/main-slider-3-shape-1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-pagination" id="main-slider-pagination"></div>
            <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-right-arrow icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </section>

    <!--Feature One Start-->
    <section class="feature-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <!--Feature One Single-->
                    <div class="feature-one__single feature-one__single-1">
                        <div class="feature-one__icon">
                            <span class="icon-charity"></span>
                        </div>
                        <div class="feature-one__content">
                            <h3>Mari Menjadi Penolong</h3>
                            <p>1000 rupiah sangat berarti bagi kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Feature One Single-->
                    <div class="feature-one__single feature-one__single-2">
                        <div class="feature-one__icon">
                            <span class="icon-adoption"></span>
                        </div>
                        <div class="feature-one__content">
                            <h3>Sigap dan Cekatan</h3>
                            <p>Mari Membantu sesama disetiap waktu</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Feature One Single-->
                    <div class="feature-one__single feature-one__single-3">
                        <div class="feature-one__icon">
                            <span class="icon-donation-1"></span>
                        </div>
                        <div class="feature-one__content">
                            <h3>Ingin Berdonasi</h3>
                            <p>Tunggu Apalagi , Lakukanlah Sekarang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Feature One End-->

    <!--Help Them Two Start-->
    <section class="help-them-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="help-them-two__left">
                        <div class="help-them-two-bg"
                            style="
                                background-image: url(assets/images/resources/introbg.jpg);
                            ">
                        </div>
                        <div class="help-them-two__img">
                            <img src="assets/images/resources/intro1.jpg" alt="" />
                            <a href="https://www.youtube.com/watch?v=i9E_Blai8vk"
                                class="help-them-two__video-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="help-them-two__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Kami Bantu Mereka</span>
                            <h2 class="section-title__title">
                                Lembaga yang didasari perasaan<br />
                            </h2>
                        </div>
                        <div class="help-them-two__list-box">
                            <ul class="help-them-two__list list-unstyled">
                                <li>
                                    <div class="help-them-two__icon-box">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </div>
                                    <div class="help-them-two__text-box">
                                        <h4>Tempat menyumbang terbaik</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="help-them-two__icon-box">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </div>
                                    <div class="help-them-two__text-box">
                                        <h4>Kami Membantu untuk mengedukasi</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="help-them-two__icon-box">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </div>
                                    <div class="help-them-two__text-box">
                                        <h4>Sebagai sarana pengembangan kegiatan sosial</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="help-them-two__icon-box">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </div>
                                    <div class="help-them-two__text-box">
                                        <h4>membuat hewan hewan lebih diperhatikan</h4>
                                    </div>
                                </li>
                            </ul>
                            {{-- <ul class="help-them-two__list help-them-two__list-two list-unstyled">
                                <li>
                                    <div class="help-them-two__icon-box">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </div>
                                    <div class="help-them-two__text-box">
                                        <h4>Sebagai sarana pengembangan kegiatan sosial</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="help-them-two__icon-box">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </div>
                                    <div class="help-them-two__text-box">
                                        <h4>membuat hewan hewan lebih diperhatikan</h4>
                                    </div>
                                </li>
                            </ul> --}}
                        </div>
                        <div class="help-them-two__bottom">
                            <h3 class="help-them-two__bottom-title">
                                Catrity is the first cat crowdfunding in Indonesia.
                            </h3>
                            <p class="help-them-two__bottom-text">
                                Catrity sebagai sarana untuk melakukan donasi yang berfokus kepada kucing kucing yang
                                membutuhkan kehidupan yang layak
                            </p>
                        </div>
                        <div class="help-them-two__donation-text-box">
                            <h2>Start&nbsp;&nbsp;Donating</h2>
                            <div class="help-them-two__donation-icon">
                                <img src="assets/images/resources/help-them-two__donation-icon.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Help Them Two End-->
    <section class="causes-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Latest Causes</span>
                <h2 class="section-title__title">   Temukan Kucing
                    <br />
                    dan donasikan mereka</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="causes-one__carousel owl-theme owl-carousel">
                        @foreach ($donasi as $val)
                            <div class="causes-one__single wow fadeInLeft" data-wow-duration="1500ms">
                                <div class="causes-one__img">
                                    <div class="causes-one__img-box">
                                        <img src="{{ asset('/upload/donasi/' . $val->image . '') }}" alt="" />
                                        <a href="{{ route('causes_detail', $val->id) }}">
                                            <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="causes-one__category">
                                        <span>{{ tgl_indo(date('Y-m-d', strtotime($val->created_at))) }}</span>
                                    </div>
                                </div>
                                <div class="causes-one__content">
                                    <h3 class="causes-one__title">
                                        <a href="{{ route('causes_detail', $val->id) }}">
                                            @if (strlen($val->judul) > 35)
                                                {{ substr($val->judul, 0, 35) }} ...
                                            @else
                                                {{ $val->judul }}
                                            @endif
                                        </a>
                                    </h3>
                                    <p class="causes-one__text">
                                        @if (strlen($val->deskripsi) > 150)
                                            {{ substr($val->deskripsi, 0, 150) }} ...
                                        @else
                                            {{ $val->deskripsi }}
                                        @endif
                                    </p>
                                </div>
                                <div class="causes-one__progress">
                                    <?php $persen = round(($val->raised / $val->goal) * 100, 2); ?>
                                    <div class="bar">
                                        <div class="bar-inner count-bar"
                                            data-percent="{{ $persen > 100 ? 100 : $persen }}%">
                                            <div class="count-text">{{ $persen }} %</div>
                                        </div>
                                    </div>
                                    <div class="causes-one__goals">
                                        <p><span>Rp {{ number_format($val->raised, 2, ',', '.') }}</span> Raised</p>
                                        <p><span>Rp {{ number_format($val->goal, 2, ',', '.') }}</span> Goal</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Causes One End-->

    {{-- <!--Brand Three Start-->
    <section class="brand-one brand-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-one__carousel owl-theme owl-carousel">
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/shopeepay.png" height="105"  alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/gopay.png"  height="105"  alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/alfamart.png" height="105"   alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/indomart.png" height="105"   alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/qris.png"height="105"   alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Brand Three End-->
    <section class="testimonial-one about-page-testimonial">
        <div class="testimonial-one-bg"
            style="
                        background-image: url(assets/images/backgrounds/testibg1.jpg);
                      ">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="testimonial-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Testimoni Catrity</span>
                            <h2 class="section-title__title">
                                Apa kata mereka tentang Catrity
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="testimonial-one__right">
                        <div class="testimonial-one__carousel owl-theme owl-carousel">
                            <!--Testimonial One Single-->
                            <div class="testimonial-one__single">
                                <p class="testimonial-one__text">
                                    Setelah menjalani koas dalam pendidikan dokter,
                                    Saya paham bahwa penyakit yang diderita kucing- kucing di Catrity
                                    engga main-main. Saya ingin terus berkontribusi lebih dengan berdonasi melalui Catrity
                                </p>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img">
                                        <img src="assets/images/testimonial/user_testi_1.jpeg" alt="" />
                                        <div class="testimonial-one__quote"></div>
                                    </div>
                                    <div class="testimonial-one__client-name">
                                        <h3>Raditya</h3>
                                        <p>Volunteer</p>
                                    </div>
                                </div>
                            </div>
                            <!--Testimonial One Single-->
                            <div class="testimonial-one__single">
                                <p class="testimonial-one__text">
                                    Catrity adalah tempat yang membuat saya nyaman untuk penyaluran donasi karena
                                    pengalokasian donasinya yang transparan dan ada laporan perkembangan donasi kucing.
                                </p>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img">
                                        <img src="assets/images/testimonial/user_testi_2.jpeg" alt="" />
                                        <div class="testimonial-one__quote"></div>
                                    </div>
                                    <div class="testimonial-one__client-name">
                                        <h3>Hafidz</h3>
                                        <p>Volunteer</p>
                                    </div>
                                </div>
                            </div>
                            <!--Testimonial One Single-->
                            <div class="testimonial-one__single">
                                <p class="testimonial-one__text">
                                    Ini adalah salah satu situs web crowdfunding paling transparan yang pernah
                                    saya lihat dan kunjungi, telah memberi saya kepercayaan diri dan keyakinan yang
                                    kuat bahwa uang yang saya sumbangkan akan
                                    diberikan kepada orang yang tepat dan untuk tindakan yang benar. Terima kasih Catrity!
                                </p>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img">
                                        <img src="assets/images/testimonial/user_testi_3.jpeg" alt="" />
                                        <div class="testimonial-one__quote"></div>
                                    </div>
                                    <div class="testimonial-one__client-name">
                                        <h3>Furqon</h3>
                                        <p>Volunteer</p>
                                    </div>
                                </div>
                            </div>
                            <!--Testimonial One Single-->
                            <div class="testimonial-one__single">
                                <p class="testimonial-one__text">
                                    Saya adalah pengguna Catrity sejak lama dan telah menyaksikan perkembangan Catrity
                                    dari tahun ke tahun. Amazing! Alasan saya setia berdonasi
                                    melalui Catrity adalah agar donasi saya dapat terekam dengan rapi and Catrity did
                                    greatly! Thank you guys!
                                </p>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img">
                                        <img src="assets/images/testimonial/user_testi_4.jpeg" alt="" />
                                        <div class="testimonial-one__quote"></div>
                                    </div>
                                    <div class="testimonial-one__client-name">
                                        <h3>Kevin </h3>
                                        <p>Volunteer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial Two Start-->
    {{-- <section class="testimonial-two">
        <div class="container">
            <div class="section-title text-center">
                {{-- <span class="section-title__tagline">Doa - Doa para Sahabat</span>
                <h2 class="section-title__title">
                    Doa-Doa <br />
                    Para Sahabat
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-duration="1500ms">
                    <!--Testimonial One Single-->
                    <div class="testimonial-one__single testimonial-two__single">
                        <p class="testimonial-one__text">
                            Semoga saya mndptkan beasiswa untk melanjutkan s1 di Inggris dan s2 di ITB agar bisa membangun Indonesia yang lebih baik kedepannya. Aamiin
                        </p>
                        <div class="testimonial-one__client-info">
                            <div class="testimonial-one__client-img">
                                <img src="assets/images/testimonial/raditya.jpg" alt="" />
                                <div class="testimonial-one__quote"></div>
                            </div>
                            <div class="testimonial-one__client-name">
                                <h3>Raditya</h3>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <!--Testimonial One Single-->
                    <div class="testimonial-one__single testimonial-two__single">
                        <p class="testimonial-one__text">
                            Semoga yang kami sumbangkan ini dapat bermanfaat,dimudahkan dan dilapangkan segala urusan nya dan diberikan kesehatan Aamiin
                        </p>
                        <div class="testimonial-one__client-info">
                            <div class="testimonial-one__client-img">
                                <img src="assets/images/testimonial/hafidz.jpg" alt="" />
                                <div class="testimonial-one__quote"></div>
                            </div>
                            <div class="testimonial-one__client-name">
                                <h3>Hafidz</h3>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <!--Testimonial One Single-->
                    <div class="testimonial-one__single testimonial-two__single">
                        <p class="testimonial-one__text">
                            yaAllah ampunkan kami, beri kenikatan iman dan islam pada hati kami, beri petunjuk kehidupan kami, turunkan hidayahmu yaAllah Aminn
                        </p>
                        <div class="testimonial-one__client-info">
                            <div class="testimonial-one__client-img">
                                <img src="assets/images/testimonial/furqon.jpg" alt="" />
                                <div class="testimonial-one__quote"></div>
                            </div>
                            <div class="testimonial-one__client-name">
                                <h3>Furqon</h3>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Testimonial Two End-->

    <!--Counters Two Start-->
    <section class="counters-two">
        <div class="counters-two-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="
                        background-image: url(assets/images/backgrounds/testibg.jpg);
                    ">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="counters-two__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Get Daily Updates</span>
                            <h2 class="section-title__title">
                                Perbedaan yang sudah ada
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="counters-two__right">
                        <ul class="counters-two__four-boxes list-unstyled">
                            <li>
                                <div class="counters-two__four-boxes-icon">
                                    <span class="icon-cheque"></span>
                                </div>
                                <h4>
                                    Penampung <br />
                                    Terverifikasi
                                </h4>
                            </li>
                            <li>
                                <div class="counters-two__four-boxes-icon">
                                    <span class="fa fa-book" aria-hidden="true"></span>
                                </div>
                                <h4>
                                    Edukasi <br />
                                    Peliharaan
                                </h4>
                            </li>
                            <li>
                                <div class="counters-two__four-boxes-icon">
                                    <span class="icon-generous"></span>
                                </div>
                                <h4>
                                    Kegiatan <br />
                                    Sosial
                                </h4>
                            </li>
                            <li>
                                <div class="counters-two__four-boxes-icon">
                                    <span class="fa fa-mobile" aria-hidden="true"></span>
                                </div>
                                <h4>
                                    Multi<br />
                                    platfrom
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Counters Two End-->
    <!--Become Volunteer Start-->
    <section class="become-volunteer">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="become-volunteer__inner">
                        <div class="become-volunteer__left">
                            <h2>
                                Bantu Mereka yang membutuhkan <br />
                                untuk kehidupan yang lebih baik
                            </h2>
                            <div class="become-volunteer__big-text">
                                <h2>Menjadi Donatur</h2>
                            </div>
                        </div>
                        <div class="become-volunteer__btn-box">
                            <a href="{{ route('causes') }}" class="become-volunteer__btn thm-btn"><i
                                    class="fas fa-arrow-circle-right"></i>Learn
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Become Volunteer End-->
    <!--Why Choose Start-->
    <section class="why-choose">
        <div class="why-choose-bg"
            style="
                        background-image: url(assets/images/backgrounds/kenapakami.jpg);
                    ">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="why-choose__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Get Daily Updates</span>
                            <h2 class="section-title__title">
                                Kenapa harus berdonasi di <br />
                                Catrity
                            </h2>
                        </div>
                        <div class="why-choose__left-bottom">
                            <div class="why-choose__left-text-box">
                                <p class="why-choose__left-text">
                                    Catrity Merupakan lembaga penggalangan dana pertama di indonesia
                                    yang berfokus kepada kesejahteraan hewan kucing
                                </p>
                                <h2 class="why-choose__left-signature">Fajar & Ilham</h2>
                            </div>
                            <div class="why-choose__left-list-box">
                                <ul class="why-choose__left-list list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="text">
                                            <h5>Cekatan dan Sigap</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="text">
                                            <h5>Pembayaran Mudah</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="text">
                                            <h5>Peduli Hewan Kucing</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="text">
                                            <h5>Penampung Terverifikasi</h5>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="why-choose__right">
                        <div class="why-choose__urgent">
                            <h3 class="why-choose__urgent-title">
                                @if (strlen($val->judul) > 35)
                                    {{ substr($val->judul, 0, 35) }} ...
                                @else
                                    {{ $val->judul }}
                                @endif
                            </h3>
                            <p class="why-choose__urgent-text">
                                @if (strlen($val->deskripsi) > 150)
                                    {{ substr($val->deskripsi, 0, 150) }} ...
                                @else
                                    {{ $val->deskripsi }}
                                @endif
                            </p>
                            <div class="why-choose__progress">
                                <?php $persen = round(($val->raised / $val->goal) * 100, 2); ?>
                                <div class="bar">
                                    <div class="bar-inner count-bar"
                                        data-percent="{{ $persen > 100 ? 100 : $persen }}%">
                                        <div class="count-text">{{ $persen }} %</div>
                                    </div>
                                </div>
                                <div class="why-choose__goals">
                                    <p><span>Rp {{ number_format($val->raised, 2, ',', '.') }}</span> Raised</p>
                                    <p><span>Rp {{ number_format($val->goal, 2, ',', '.') }}</span> Goal</p>
                                </div>
                            </div>
                            <a href="{{ route('causes_detail', $val->id) }}" class="why-choose__right-btn"><i
                                    class="fa fa-heart"></i>Donate</a>
                            <div class="why-choose__right-category">
                                <span>{{ tgl_indo(date('Y-m-d', strtotime($val->created_at))) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose End-->

    <!--Need Help Start-->
    {{-- <section class="need-help">
        <div class="container">
            <div class="need-help__inner">
                <div class="need-help__img">
                    <img src="assets/images/resources/need-help-img-1.jpg" alt="" />
                </div>
                <div class="need-help__content">
                    <h4 class="need-help__title">Mereka Membutuhkan Bantuanmu</h4>
                    <p class="need-help__text">
                        Catrity sebagai sarana untuk melakukan donasi yang berfokus kepada kucing kucing yang membutuhkan
                        kehidupan yang layak
                    </p>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Need Help End-->
    <!--News Three Start-->

    <!--News Three End-->
    <!--Help Them Start-->
    <section class="help-them">
        <div class="help-them-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="
                        background-image: url(assets/images/backgrounds/bantumereka1.jpg);
                    ">
        </div>
        <div class="container">
            {{-- <div class="help-them__top">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="help-them__top-content">
                            <h2 class="help-them__top-content-title">
                                Bantu Mereka yang membutuhkan
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="help-them__top-video-box">
                            <a href="https://www.youtube.com/watch?v=i9E_Blai8vk"
                                class="help-them__top-video-btn video-popup"><i class="fa fa-play"></i></a>
                            <p class="help-them__top-video-text">Watch the Video</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="help-them__bottom">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--Help Them Single-->
                        <div class="help-them__single">
                            <div class="help-them__icon">
                                <span class="icon-charity"></span>
                            </div>
                            <div class="help-them__text">
                                <h3>Jadilah Penyumbang</h3>
                                <p>
                                    Berapapun Sumbanganmu , akan sangat berarti bagi kami.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Help Them Single-->
                        <div class="help-them__single">
                            <div class="help-them__icon">
                                <span class="icon-generous"></span>
                            </div>
                            <div class="help-them__text">
                                <h3>Penggalangan Dana Cepat</h3>
                                <p>
                                    Bantuan sedikit sudah sangat berarti bagi para pecinta kucing.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Help Them Single-->
                        <div class="help-them__single">
                            <div class="help-them__icon">
                                <span class="icon-fundraiser"></span>
                            </div>
                            <div class="help-them__text">
                                <h3>Mari Berdonasi</h3>
                                <p>
                                    Mari berbagi kebagaian bersama Catrity.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Help Them End-->
    <!--We Inspire Start-->
    <section class="we-inspire-about">
        <div class="we-inspire-bg"
            style="
                background-image: url(assets/images/backgrounds/bantumereka.jpg);
              ">
        </div>
        <div class="we-inspire-bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="we-inspire__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Question & Answers</span>
                            <h2 class="section-title__title">
                                Kami menginspirasi dan membantu mereka hidup lebih baik
                            </h2>
                        </div>
                        <div class="we-inspire__faq">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Apa itu Catrity</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>
                                                Lembanga Penggalangan Dana pertama di Indonesia yang berfokus
                                                kepada kesejahteraan hewan kucing
                                            </p>
                                        </div>
                                        <!-- /.inner -->
                                    </div>
                                </div>
                                {{-- <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>Bagaimana Cara Berdonasi di Catrity</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>
                                            There are many variations of passages the majority
                                            have suffered alteration in some fo injected humour,
                                            or randomised words believable.
                                        </p>
                                    </div>
                                    <!-- /.inner -->
                                </div>
                            </div> --}}
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Bagaimana Cara Menghubungi Catrity</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>
                                                Bisa Menghubungi melalui email catrityindonesia@gmail.com atau whatsapp di
                                                +6285894558308
                                            </p>
                                        </div>
                                        <!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Bagaimana Jika Target Donasi Tidak Terkumpul</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>
                                                Kami tetap akan mengumpulkan dana tersebut hingga waktu yang ditentukan.
                                                Apabila hingga akhir waktu dana tetap tidak terkumpul dan tindakan medis
                                                harus dilakukan,kami juga mencari dana dari sponsor serta rekanan lainnya.
                                            </p>
                                        </div>
                                        <!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Bagaimana Jika Target Donasi Melebihi Target Donasi</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>
                                                Kami akan perhitungkan kelebihan dana, dan jumlah tersebut akan kami
                                                memberikan opsi kepada parah donatur
                                                apakah ingin dana tersebut tetap diberikan kepada kucing, atau dikembailkan
                                                kepada donatur,
                                                atau dimasukkan ke dalam dana catrity yang akan digunakan untuk mendonasikan
                                                kucing lain.
                                            </p>
                                        </div>
                                        <!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="we-inspire__right">
                        <div class="we-inspire__img">
                            <img src="assets/images/resources/faq.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--We Inspire End-->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
