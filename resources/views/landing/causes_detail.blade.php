@extends('template.frontend.main')

@section('css')
    <style></style>
@endsection

@section('content')
    <section class="page-header">
        <div class="page-header__bg"
            style="
                                                        background-image: url({{ asset('assets/images/backgrounds/header1.jpg') }});
                                                      ">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2>Donasi</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="color-thm-gray">/</li>
                <li><span>Donasi Details</span></li>
            </ul>
        </div>
    </section>
    <section class="causes-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="causes-details__left-bar">
                        <div class="causes-details__img">
                            <div class="causes-details__img-box">
                                <img src="{{ asset('/upload/donasi/' . $donasi->image . '') }}" alt="" />
                                <div class="event-details__date-box">
                                    <p>
                                        {{ tgl_indo(date('Y-m-d', strtotime($donasi->end_date))) }}
                                    </p>
                                </div>
                            </div>
                            <div class="causes-details__progress">
                                <?php $persen = round(($donasi->raised / $donasi->goal) * 100, 2); ?>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="{{ $persen > 100 ? 100 : $persen }}%">
                                        <div class="count-text">{{ $persen }} %</div>
                                        <!--kondisi persen tidak bisa ditas seratus-->
                                        {{-- <div class="count-text">{{ ($persen > 100) ? 100 : $persen }} %</div> --}}
                                    </div>
                                </div>
                                <div class="causes-one__goals">
                                    <p><span>Rp {{ number_format($donasi->raised, 2, ',', '.') }}</span> Raised</p>
                                    <p><span>Rp {{ number_format($donasi->goal, 2, ',', '.') }}</span> Goal</p>
                                </div>
                            </div>
                        </div>
                        <div class="causes-details__text-box">
                            <h3>{{ $donasi->judul }}</h3>
                            <p class="causes-details__text-1">
                                {{ $donasi->deskripsi }}
                            </p>
                        </div>
                        <div class="causes-details__images-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="causes-details__images-single">
                                        <img src="{{ asset('/upload/donasi/' . $donasi->image_satu . '') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="causes-details__images-single">
                                        <img src="{{ asset('/upload/donasi/' . $donasi->image_dua . '') }}"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="causes-details__share">
                            <div class="causes-details__share-btn-box">
                                <button class="causes-details__share-btn thm-btn" onclick="donate()">
                                    <i class="fas fa-arrow-circle-right"></i>Donate Us Now
                                </button>
                            </div>
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
                                <h5>Penampung : <span>{{ getUser($donasi->created_by)->name }}</span></h5>
                                <ul class="causes-details__organizer-list list-unstyled">
                                    <li><i class="fas fa-map-marker-alt"></i>{{ getUser($donasi->created_by)->alamat }}
                                    </li>

                                    </span>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__single event-details__right-map">
                            <iframe src="{{ getUser($donasi->created_by)->maps }}" class="event-details__map-box"
                                allowfullscreen></iframe>
                        </div>
                        <div class="sidebar__single sidebar__postwa">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal Gratis -->
    <div class="modal fade" id="modal-donate" tabindex="-1" role="dialog" aria-labelledby="LabelHeader"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="section-title__tagline" id="LabelHeader">{{ $donasi->judul }}</h5>
                </div>
                <div class="become-volunteer-page__form">
                    {{-- <form id="form_donate" method="GET" action="{{ route('payment') }}"> --}}
                    <div class="modal-body">
                        {{-- <form class="image-upload" method="post" action="{{ route('payment') }}" enctype="multipart/form-data"> --}}
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ $donasi->id }}">
                        <input type="hidden" class="form-control" id="judul" name="judul"
                            value="{{ $donasi->judul }}">
                        <div class="row">
                            <div class="col-xl-12 donate-nama">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <label for="telepon">No. Telp</label>
                                <input type="number" class="form-control" id="telepon" name="telepon" min="0"
                                    required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <label for="jumlah">Jumlah (Rp)</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="thm-btn-simpan become-volunteer-page__btn"
                            onclick="getTokenMidtrans()">
                            <i class="fas fa-hand-holding-usd"></i>Donasi</button>
                        <button type="button" class="thm-btn-close become-volunteer-page__btn close">
                            <i class="fas fa-redo"></i>Close</button>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.close').click(function() {
                $('.modal').modal('hide')
            })
            $('#jumlah').change(function() {
                var jum = $(this).val();
                if (jum < 10000) {
                    alert('Minimal Donasi Rp 10.000');
                    $(this).val('');
                }
            })
            $('#telepon').change(function() {
                var jum = $(this).val();
                if (jum < 0) {
                    alert('Masukan Angka Dengan Benar');
                    $(this).val('');
                }
            })
        });
        function donate(judul) {
            $('#LabelHeader').text(judul);

            $('#modal-donate').modal('show');
        }

        function getTokenMidtrans() {
            // method :'post',
            var id = $('#id').val();
            var judul = $('#judul').val();
            var nama = $('#nama').val();
            var email = $('#email').val();
            var telepon = $('#telepon').val();
            var jumlah = $('#jumlah').val();
            if (nama != "" && email != "" && telepon != "" && jumlah != "") {
                $.get("{{ URL::to('payment') }}", {
                    id: id,
                    judul: judul,
                    nama: nama,
                    email: email,
                    telepon: telepon,
                    jumlah: jumlah
                }, function(res) {
                    OpenPayMidtrans(res);
                })
                return true;
            } else {
                alert('Mohon lengkapi data !');
            }
            // $.get("{{ URL::to('payment') }}", {
            //     id: id,
            //     judul: judul,
            //     nama: nama,
            //     email: email,
            //     telepon: telepon,
            //     jumlah: jumlah
            // }, function(res) {
            //     OpenPayMidtrans(res);
            // })
        }

        function OpenPayMidtrans(data) {
            var pendonasi = data.data
            window.snap.pay(data.midtrans, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */

                    var order_id = result.order_id;
                    var payment_type = result.payment_type;
                    var pdf_url = result.pdf_url;
                    var status_code = result.status_code;
                    var status_message = result.status_message;
                    var transaction_id = result.transaction_id;
                    var transaction_status = result.transaction_status;
                    var transaction_time = result.transaction_time;
                    var gross_amount = result.gross_amount;

                    var nama_pendonasi = pendonasi.nama_pendonasi;
                    var telepon_pendonasi = pendonasi.telepon_pendonasi;
                    // var jumlah_pendonasi = pendonasit.jumlah_pendonasi;
                    var email_pendonasi = pendonasi.email_pendonasi;
                    console.log(result);


                    $.ajax({
                        url: '/payment/save',
                        type: 'post',
                        data: {
                            order_id: order_id,
                            payment_type: payment_type,
                            pdf_url: pdf_url,
                            status_code: status_code,
                            status_message: status_message,
                            transaction_id: transaction_id,
                            transaction_status: transaction_status,
                            transaction_time: transaction_time,
                            gross_amount: gross_amount,
                            nama_pendonasi: nama_pendonasi,
                            telepon_pendonasi: telepon_pendonasi,
                            // jumlah_pendonasi:jumlah_pendonasi,
                            email_pendonasi: email_pendonasi
                        },
                        success: function(res) {
                            console.log(res);
                            alert("payment success!");
                        }
                    });

                    // $.get("{{ URL::to('/payment/save') }}", {
                    //     order_id: order_id,
                    //     payment_type: payment_type,
                    //     pdf_url: pdf_url,
                    //     status_code: status_code,
                    //     status_message: status_message,
                    //     transaction_id: transaction_id,
                    //     transaction_status: transaction_status,
                    //     transaction_time: transaction_time,
                    //     gross_amount: gross_amount,
                    //     nama_pendonasi: nama_pendonasi,
                    //     telepon_pendonasi: telepon_pendonasi,
                    //     // jumlah_pendonasi:jumlah_pendonasi,
                    //     email_pendonasi: email_pendonasi
                    // }, function(res) {
                    // alert("payment success!");
                    // });
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    console.log(data);
                    var order_id = result.order_id;
                    var payment_type = result.payment_type;
                    var pdf_url = result.pdf_url;
                    var status_code = result.status_code;
                    var status_message = result.status_message;
                    var transaction_id = result.transaction_id;
                    var transaction_status = result.transaction_status;
                    var transaction_time = result.transaction_time;
                    var gross_amount = result.gross_amount;

                    var nama_pendonasi = pendonasi.nama_pendonasi;
                    var telepon_pendonasi = pendonasi.telepon_pendonasi;
                    // var jumlah_pendonasi = pendonasi.jumlah_pendonasi;
                    var email_pendonasi = pendonasi.email_pendonasi;
                    console.log(result);
                    $.ajax({
                        url: '/payment/save',
                        type: 'post',
                        data: {
                            order_id: order_id,
                            payment_type: payment_type,
                            pdf_url: pdf_url,
                            status_code: status_code,
                            status_message: status_message,
                            transaction_id: transaction_id,
                            transaction_status: transaction_status,
                            transaction_time: transaction_time,
                            gross_amount: gross_amount,
                            nama_pendonasi: nama_pendonasi,
                            telepon_pendonasi: telepon_pendonasi,
                            // jumlah_pendonasi:jumlah_pendonasi,
                            email_pendonasi: email_pendonasi
                        },
                        success: function(res) {
                            alert("Menunggu Pembayaran ! Mohon Cek Email Anda Secara Berkala");
                        }
                    });

                    // $.get("{{ URL::to('/payment/save') }}", {
                    //     order_id: order_id,
                    //     payment_type: payment_type,
                    //     pdf_url: pdf_url,
                    //     status_code: status_code,
                    //     status_message: status_message,
                    //     transaction_id: transaction_id,
                    //     transaction_status: transaction_status,
                    //     transaction_time: transaction_time,
                    //     gross_amount: gross_amount,
                    //     nama_pendonasi: nama_pendonasi,
                    //     telepon_pendonasi: telepon_pendonasi,
                    //     // jumlah_pendonasi:jumlah_pendonasi,
                    //     email_pendonasi: email_pendonasi
                    // },


                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        }
    </script>
@endsection
