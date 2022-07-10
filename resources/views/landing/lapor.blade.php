@extends('template.frontend.main')

@section('css')
    <style>
        .syarat {
            cursor: pointer;
            color: red;
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg" style="
                           background-image: url(assets/images/backgrounds/header.jpg);
          "></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2>Lapor</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="color-thm-gray">/</li>
                <li><span>Lapor</span></li>
            </ul>
        </div>
    </section>
    <!--Page Header End-->

    <!--Contact Page Google Map Start-->
    {{-- <section class="contact-page-google-map pt-5">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <label>PENAMPUNG</label>
                    <select class="form-control" id="penampung" onchange="embedMaps()">
                        @foreach ($penampung as $val)
                        <option value="{{ $val->maps }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <iframe
                id="iframePenampung"
                src=""
                class="contact-page-google-map__one" allowfullscreen>
            </iframe>
        </section> --}}
    <!--Contact Page Google Map End-->

    <!--Become Volunteer Page Start-->
    <section class="become-volunteer-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Lapor Kucing Terlantar</span>
                <h2 class="section-title__title">
                    Let’s join our community to <br />
                    become a volunteer
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="become-volunteer-page__left">
                        <iframe id="iframePenampung" src="" class="contact-page-google-map__one" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="become-volunteer-page__right">
                        <form method="POST" action="{{ route('lapor_kirim') }}" enctype="multipart/form-data"
                            class="become-volunteer-page__form">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="become-volunteer-page__input">
                                        <input type="text" placeholder="Your name" name="nama" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="become-volunteer-page__input">
                                        <input type="email" placeholder="Email Address" name="email" required />
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="become-volunteer-page__input">
                                        <input type="number" placeholder="Phone Number" name="phone" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="become-volunteer-page__input">
                                        <input type="text" placeholder="Address" name="address" required />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="become-volunteer-page__input">
                                        <label for="penampung">Pilih Penampung</label>
                                        <input type="hidden" name="id_penampung" id="id_penampung">
                                        <select placeholder="Penampung" name="penampung" id="penampung"
                                            onchange="embedMaps()" required>
                                            @foreach ($penampung as $val)
                                                <option
                                                    value="{{ $val->maps }}###{{ $val->id }}###{{ $val->syarat_ketentuan }}">
                                                    {{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="become-volunteer-page__input">
                                        <label for="jenis">Masukan Jenis Kucing</label>
                                        <input type="text" class="form-control" placeholder="Jenis Kucing" name="jenis"
                                            id="jenis" required />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="become-volunteer-page__input">
                                        <input id="gambar_kucing" type="file" class="form-control" placeholder="Foto"
                                            name="foto" accept="image/x-png,image/jpeg" required />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="become-volunteer-page__input">
                                        <textarea name="messaage" placeholder="Write message" required></textarea>
                                    </div>
                                    <div class="become-volunteer-page__input">
                                        <input type="hidden" id="ketentuan_temp" name="ketentuan_temp" />
                                        <input type="checkbox" id="ketentuan" name="ketentuan" value="yes" required>
                                        <span class="syarat" onclick="SyaratKetentuan()">Syarat & Ketentuan
                                            Berlaku</span>
                                    </div>
                                    <button type="submit" class="thm-btn become-volunteer-page__btn">
                                        <i class="fas fa-arrow-circle-right"></i>Submit Laporan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Become Volunteer Page End-->
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
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            embedMaps();
            $('#gambar_kucing').on('change', function() {
                myfiles = $(this).val();
                var ext = myfiles.split('.').pop();
                if (ext == "jpeg" || ext == "png") {
                    $('#error-message').css("display", "none");
                } else {
                    $('#error-message').html("Only allow valid file inputs.");
                    $('#error-message').css("display", "block");
                    $('#error-message').css("color", "red");
                }
            });
        });

        function embedMaps() {
            var penampung = $('#penampung').val();
            var penampung_array = penampung.split('###');
            var embed = penampung_array[0];
            var id = penampung_array[1];
            var ketentuan = penampung_array[2];
            $('#id_penampung').val(id);
            $('#ketentuan_temp').val(ketentuan);
            $('#iframePenampung').attr('src', embed);
        }

        function SyaratKetentuan() {
            var ketentuan = $('#ketentuan_temp').val();
            Swal.fire(
                'Syarat & Ketentuan',
                ketentuan,
                'info'
            )

        }
    </script>
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                text: '{{ Session::get('success') }}',
                showConfirmButton: true
            });
        </script>
        <?php
        Session::forget('success');
        ?>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                text: '{{ Session::get('error') }}',
                showConfirmButton: true
            });
        </script>
        <?php
        Session::forget('error');
        ?>
    @endif
@endsection
