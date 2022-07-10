@extends('template.frontend.main')

@section('css')
    <style></style>
@endsection

@section('content')
<section class="page-header">
    <div class="page-header__bg" style=" background-image: url({{ asset('assets/images/backgrounds/header1.jpg') }}); "></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <h2>Tips & Trick</h2>
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="color-thm-gray">/</li>
            <li><span>Tips & Trick Details</span></li>
        </ul>
    </div>
</section>
    <section class="causes-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="causes-details__left-bar">
                        <div class="tips-trick__img">
                            <div class="tips-trick__img-box">
                                <iframe width="770" height="515" src="{{ $tips_trick->link }}" frameborder="0"
                                    allowfullscreen></iframe>
                                <div class="event-details__date-box">
                                    <p>
                                        {{ tgl_indo(date('Y-m-d', strtotime($tips_trick->created_at))) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="causes-details__text-box">
                            <h3> {{ $tips_trick->judul }}</h3>
                            <?php $deskripsi = explode('<br>', $tips_trick->deskripsi); ?>
                            @foreach ($deskripsi as $key => $des)
                            <div class="tips-trick-margin">
                                <p class="event-details__text-{{ $key + 1 }}">
                                    {{ $des }}
                                </p>
                            </div>
                                {{-- <img src="{{ asset('upload/tipstrick/' . $tips_trick->image . '') }}" alt="" /> --}}
                                {{-- <iframe width="420" height="315" src="{{$tips_trick->link}}" frameborder="0" allowfullscreen></iframe> --}}
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        {{-- <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search" />
                                <button type="submit">
                                    <i class="icon-magnifying-glass"></i>
                                </button>
                            </form>
                        </div> --}}
                        <div class="sidebar__single sidebar__post">
                            <div class="causes-details__organizer-content">
                                <p>Created {{ tgl_indo(date('Y-m-d', strtotime($tips_trick->created_at))) }}</p>
                                <h5>Author : <span>{{ getUser($tips_trick->created_by)->name }}</span></h5>

                            </div>
                        </div>
                        {{-- <div class="sidebar__single event-details__right-map">
                            <iframe src="{{ getUser($donasi->created_by)->maps }}" class="event-details__map-box"
                                allowfullscreen></iframe>
                        </div> --}}
                        {{-- <div class="sidebar__single sidebar__postwa">
                            <div class="causes-details__organizer-content">
                                <ul class="causes-details__organizer-list list-unstyled">
                                    <h5>Hubungi Penampung:</h5>
                                    <div class="causes-whatsapp-text">
                                        <li> <i class="fab fa-whatsapp"></i>
                                            <a
                                                href="https://api.whatsapp.com/send?phone={{ getUser($donasi->created_by)->nomorwa }}&text=Halo%21%20Saya%20ingin%20bertanya">
                                                +{{ getUser($donasi->created_by)->nomorwa }}
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

<!--Help Them End-->
    <!-- Modal Gratis -->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
