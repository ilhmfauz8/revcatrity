@extends('template.backend.main')

@section('css')
    <style>
        .highcharts-credits{
            display:none;
        }
        #datatable-users_wrapper .col-sm-12{
            overflow-x: auto;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Pendapatan (Rp)</h4>
                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-end">
                            <h2 class="fw-normal mb-1"> {{ number_format($total_transaksi_donasi,2,',','.') }} </h2>
                            <p class="text-muted mb-3">Seluruh Donasi</p>
                        </div>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;">
                                <span class="visually-hidden">100% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Pengeluaran Penampung (Rp)</h4>
                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-end">
                            <h2 class="fw-normal mb-1"> {{ number_format($total_pengeluaran_penampung,2,',','.') }} </h2>
                            <p class="text-muted mb-3">Seluruh Pengeluaran</p>
                        </div>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;">
                                <span class="visually-hidden">100% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Pengeluaran Admin (Rp)</h4>
                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-end">
                            <h2 class="fw-normal mb-1"> {{ number_format($total_pengeluaran_admin,2,',','.') }} </h2>
                            <p class="text-muted mb-3">Seluruh Pengeluaran</p>
                        </div>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;">
                                <span class="visually-hidden">100% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Jumlah Transaksi</h4>
                    <select class="form-control" id="tahun_jumlah" name="tahun_jumlah">
                        @for($i = $start ; $i <= $end ; $i++)
                        <option value="{{ $i }}" @if($i == $now) selected @endif>{{ $i }}</option>
                        @endfor
                    </select><br>
                    <div class="widget-chart text-center">
                        <div id="jumlah-transaksi" style="height:270px;"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Total Lapor</h4>
                    <select class="form-control" id="tahun_total" name="tahun_total">
                        @for($i = $start ; $i <= $end ; $i++)
                        <option value="{{ $i }}" @if($i == $now) selected @endif>{{ $i }}</option>
                        @endfor
                    </select><br>
                    <div class="widget-chart text-center">
                        <div id="total-lapor" style="height:270px;"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        defaultJumlahTransaksi();
        defaultTotalLapor();

        $('#tahun_jumlah').change(function(){
            defaultJumlahTransaksi();
        })

        $('#tahun_total').change(function(){
            defaultTotalLapor();
        })
    });

    function defaultJumlahTransaksi(){
        var tahun = $('#tahun_jumlah').val();
        $.get("{{ URL::to('admin/dashboard-admin/jumlah-transaksi') }}",{tahun:tahun},function(res){
            var data = JSON.parse(res);
            setJumlahTransaksi(data);
        });
    }
    function setJumlahTransaksi(data){
        Highcharts.chart('jumlah-transaksi', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: '&nbsp;'
            },
            subtitle: {
                text: '&nbsp;'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: data.category,
                labels: {
                    skew3d: true,
                    style: {
                        fontSize: '16px'
                    }
                }
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [data.series]
        });
    }

    function defaultTotalLapor(){
        var tahun = $('#tahun_total').val();
        $.get("{{ URL::to('admin/dashboard-admin/total-lapor') }}",{tahun:tahun},function(res){
            var data = JSON.parse(res);
            setTotalLapor(data);
        });
    }
    function setTotalLapor(data){
        Highcharts.chart('total-lapor', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: '&nbsp;'
            },
            subtitle: {
                text: '&nbsp;'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: data.category,
                labels: {
                    skew3d: true,
                    style: {
                        fontSize: '16px'
                    }
                }
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [data.series]
        });
    }
</script>
@endsection