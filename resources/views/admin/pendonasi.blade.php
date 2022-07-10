@extends('template.backend.main')

@section('css')
<style></style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mt-0 header-title">Data Pendonasi</h3>
                    <p class="text-muted font-14 mb-3"></p>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" onclick="updateData()" class="btn btn-sm btn-primary" style="float: right;"><i class="fas fa-redo-alt"></i>&nbsp;&nbsp;Refresh</button>
                        </div>
                    </div>
                    <br>
                    <table id="table-transaksi" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order Id</th>
                                <th>Nama Donatur</th>
                                <th>No Handphone</th>
                                <th>Email</th>
                                <th>Payment Type</th>
                                <th>Transaction Status</th>
                                <th>Gross Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        getData1();
    });

    function updateData()
    {
        $.get("{{ URL::to('admin/transaksi/update-data') }}", function(res){
            getData1();
        })
    }

    function getData1(){
        var table = $('#table-transaksi').DataTable();
        $.get("{{ URL::to('admin/pendonasi/get-data') }}",function(res){
            // var data = JSON.parse(res);
            console.log(res);
            $.each(res, function(i, val){
                table.row.add([
                    i+1,
                    val.order_id,
                    val.nama_pendonasi,
                    val.telepon_pendonasi,
                    val.email_pendonasi,
                    val.payment_type,
                    // val.status_message,
                    val.transaction_status,
                    // val.transaction_time,
                    val.gross_amount,
                ]).draw();
            })
        });
        table.clear();
    }
</script>
@endsection
