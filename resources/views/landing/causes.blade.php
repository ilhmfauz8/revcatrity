@extends('template.frontend.main')

@section('css')
<style></style>
@endsection

@section('content')
        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg" style="
            background-image: url(assets/images/backgrounds/header.jpg);
          "></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2>Donasi</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="color-thm-gray">/</li>
                    <li><span>Donasi</span></li>
                </ul>
            </div>
        </section>
        <!--Page Header End-->

        <!--Causes One Start-->
        <section class="causes-one causes-page">
            <div class="container">
                <div class="row">
                    @foreach($donasi as $val)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay++ }}00ms">
                        <div class="causes-one__single">
                            <div class="causes-one__img">
                                <div class="causes-one__img-box">
                                    <img src="{{ asset('/upload/donasi/'.$val->image.'') }}" alt="" />
                                    <a href="{{ route('causes_detail',$val->id) }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="news-two__date">
                                    <p>{{ tgl_indo(date('Y-m-d', strtotime($val->end_date))) }}</p>
                                </div>
                            </div>
                            <div class="causes-one__content">
                                <h3 class="causes-one__title">
                                    <a href="{{ route('causes_detail',$val->id) }}">
                                        @if (strlen($val->judul) > 35)
                                            {{ substr($val->judul, 0, 35) }} ...
                                        @else
                                            {{ $val->judul }}
                                        @endif
                                    </a>
                                </h3>
                                <p class="causes-orginizer">
                                    <i class="far fa-user-circle"></i> Orginizer :
                                    <span>{{ getUser($val->created_by)->name }}</span>
                                </p>
                                <p class="causes-one__text">
                                    @if(strlen($val->deskripsi) > 150)
                                    {{ substr($val->deskripsi,0,150) }} ...
                                    @else
                                    {{ $val->deskripsi }}
                                    @endif
                                </p>
                            </div>
                            <div class="causes-one__progress">
                                <?php $persen = round($val->raised/$val->goal * 100,2); ?>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="{{ ($persen > 100) ? 100 : $persen }}%">
                                        <div class="count-text">{{ $persen }} %</div>
                                        <!--kondisi persen tidak bisa ditas seratus-->
                                        {{-- <div class="count-text">{{ ($persen > 100) ? 100 : $persen }} %</div> --}}
                                    </div>
                                </div>
                                <div class="causes-one__goals">
                                    <p><span>Rp {{ number_format($val->raised,2,',','.') }}</span> Raised</p>
                                    <p><span>Rp {{ number_format($val->goal,2,',','.') }}</span> Goal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $donasi->links() }}
            </div>
        </section>
        <!--Causes One End-->

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
