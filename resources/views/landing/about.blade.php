@extends('template.frontend.main')

@section('css')
    <style></style>
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg" style="
                    background-image: url(assets/images/backgrounds/header1.jpg);
                  "></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2>Tentang Kami</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="color-thm-gray">/</li>
                <li><span>Tentang Kami</span></li>
            </ul>
        </div>
    </section>
    <!--Page Header End-->

    <!--About Page Start-->
    <section class="about-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-page__left">
                        <div class="about-page__img">
                            <img src="assets/images/resources/about2.jpg" alt="" />
                            <div class="about-page__trusted">
                                <h3>Kami dipercaya lebih dari <span>1</span> penampung</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-page__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Tentang Kami</span>
                            <h2 class="section-title__title">
                                Kami percaya bahwa kami dapat menyelamatkan lebih banyak nyawa
                            </h2>
                        </div>
                        <p class="about-page__right-text">
                            Berdiri sejak 2022, situs dan aplikasi Catrity telah menjadi jembatan kebaikan dan wadah gotong
                            royong bagi masyarakat Indonesia
                            dalam membantu hewan kucing.
                            Terima kasih kepada semua yang berpartispasi, hingga hari ini, Catirty telah menjadi wadah
                            kebaikan bagi kita semua
                        </p>
                        <h3 class="about-page__right-title">
                            Catrity is the largest global crowdfunding community in the
                            world
                        </h3>
                        <div class="about-five__progress-wrap">
                            <div class="about-five__progress">
                                <div class="about-five__progress-box">
                                    <div class="circle-progress"
                                        data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#e5eeec","lineCap": "square", "size": 138, "fill": { "color": "#15c8a0" } }'>
                                    </div>
                                    <!-- /.circle-progress -->
                                    <span>90%</span>
                                </div>
                                <div class="about-five__progress-content">
                                    <h3>Successful causes</h3>
                                </div>
                            </div>
                            <div class="about-five__progress">
                                <div class="about-five__progress-box">
                                    <div class="circle-progress"
                                        data-options='{ "value": 0.99,"thickness": 3,"emptyFill": "#e5eeec","lineCap": "square", "size": 138, "fill": { "color": "#15c8a0" } }'>
                                    </div>
                                    <!-- /.circle-progress -->
                                    <span>99%</span>
                                </div>
                                <!-- /.about-five__progress-box -->
                                <div class="about-five__progress-content">
                                    <h3>Amazing donors</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Page Start-->

    <!--Testimonial One Start-->
    <section class="testimonial-one about-page-testimonial">
        <div class="testimonial-one-bg" style="
                        background-image: url(assets/images/backgrounds/testibg1.jpg);
                      "></div>
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
    <!--Testimonial One End-->

    {{-- <!--Join One Start-->
    <section class="join-one join-one__about">
        <div class="join-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="
                background-image: url(assets/images/backgrounds/join-one-bg.jpg);
              "></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="join-one__inner">
                        <h2 class="join-one__title">
                            Join the community to give <br />
                            education for children
                        </h2>
                        <a href="#" class="join-one__btn thm-btn"><i class="fas fa-arrow-circle-right"></i>Learn
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Join One End-->

    <!--Counters One Start-->
    <section class="counters-one about-page-counter">
        <div class="container">
            <ul class="counters-one__box list-unstyled">
                <li class="counter-one__single">
                    <h3 class="odometer" data-count="870">00</h3>
                    <span class="counter-one__letter">K</span>
                    <p class="counter-one__text">Total Donations</p>
                </li>
                <li class="counter-one__single">
                    <h3 class="odometer" data-count="480">00</h3>
                    <p class="counter-one__text">Campaigns Closed</p>
                </li>
                <li class="counter-one__single">
                    <h3 class="odometer" data-count="977">00</h3>
                    <span class="counter-one__letter">K</span>
                    <p class="counter-one__text">Happy People</p>
                </li>
                <li class="counter-one__single">
                    <h3 class="odometer" data-count="63">00</h3>
                    <span class="counter-one__letter">+</span>
                    <p class="counter-one__text">Our Volunteers</p>
                </li>
            </ul>
        </div>
    </section> --}}
    <!--Counters One Start-->

    <!--We Inspire Start-->
    <section class="we-inspire-about">
        <div class="we-inspire-bg" style="
                    background-image: url(assets/images/backgrounds/bantumereka.jpg);
                  "></div>
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

    {{-- <!--Brand One Start-->
    <section class="brand-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-one__carousel owl-theme owl-carousel">
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/brand-1-1.png" alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/brand-1-2.png" alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/brand-1-3.png" alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/brand-1-4.png" alt="" />
                            </div>
                        </div>
                        <!--Brand One Single-->
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="assets/images/resources/brand-1-5.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
