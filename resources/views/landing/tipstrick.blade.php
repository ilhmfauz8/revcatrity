@extends('template.frontend.main')

@section('css')
<style></style>
@endsection

@section('content')
        <section class="page-header">
            <div class="page-header__bg" style="
            background-image: url(assets/images/backgrounds/header3.jpg);
          "></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2>Tips & Trick</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="color-thm-gray">/</li>
                    <li><span>Tips & Trick</span></li>
                </ul>
            </div>
        </section>
        <!--Page Header End-->
        <!--News Page Start-->
        <section class="news-page">
            <div class="container">
                <div class="row">
                    @foreach($tips_trick as $val)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="{{ $delay++ }}00ms">
                        <!--News Two Single-->
                        <div class="news-two__single">
                            <div class="news-two__img-box">
                                <div class="news-two__img">
                                    <img src="{{ asset('upload/tipstrick/'.$val->image.'') }}" alt="" />
                                    <a href="{{ route('tipstrick_detail',$val->id) }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="news-two__date">
                                    <p>{{ tgl_indo(date("Y-m-d", strtotime($val->created_at))) }}</p>
                                </div>
                            </div>
                            <div class="news-two__content">
                                <ul class="list-unstyled news-two__meta">
                                    <li>
                                        <a href="#"><i class="far fa-user-circle"></i> {{ getUser($val->created_by)->name }}</a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="{{ route('tipstrick_detail',$val->id) }}">
                                        @if (strlen($val->judul) > 35)
                                        {{ substr($val->judul, 0, 35) }} ...
                                    @else
                                        {{ $val->judul }}
                                    @endif
                                    </a>
                                </h3>
                                <p class="news-two__text">
                                    @if(strlen($val->deskripsi) > 150)
                                    {{ substr($val->deskripsi,0,150) }} ...
                                    @else
                                    {{ $val->deskripsi }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $tips_trick->links() }}
            </div>
        </section>
        <!--News Page End-->

        <!--Help Them Start-->
        <section class="help-them">
            <div class="help-them-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="
                        background-image: url(assets/images/backgrounds/banner2.jpg);
                    "></div>
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
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
