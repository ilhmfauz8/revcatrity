@extends('template.backend.main')

@section('css')
    <style>
        input[readonly] {
            background-color: #e2e2e2!important;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mt-0 header-title">Donasi Selesai</h3>
                        <p class="text-muted font-14 mb-3"></p>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Raised</th>
                                    <th>Goal</th>
                                    <th>Created At</th>
                                    <th>End Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donasi as $val)
                                    <?php $transfer = DB::table('transaksi_pengeluaran_donasi')->where('id_donasi', $val->id)->first(); ?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->judul }}</td>
                                        <td>Rp {{ number_format($val->raised, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($val->goal, 2, ',', '.') }}</td>
                                        <td>{{ tgl_indo(date('Y-m-d', strtotime($val->created_at))) }}</td>
                                        <td>{{ tgl_indo(date('Y-m-d', strtotime($val->end_date))) }}</td>
                                        <td>
                                            {{-- <button type="button" onclick="view(this)"
                                                data-user="{{ json_encode(getUser($val->created_by)) }}"
                                                data-item="{{ json_encode($val) }}" class="btn btn-sm btn-warning"><i
                                                    class="far fa-eye"></i></button> --}}
                                            @if(empty($transfer))
                                            <button type="button" onclick="kirim(this)"
                                                data-item="{{ json_encode($val) }}" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-paper-plane"></i></button>
                                            @endif
                                            {{-- <button type="button" onclick="hapus('{{ $val->id }}')"
                                                class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kirim Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="e-form-donate" method="POST" action="{{ route('admin.donasi_selesai.edit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="e_judul" name="judul" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <input class="form-control" id="e_deskripsi" name="deskripsi" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Raised (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="e_raised" name="raised" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Goal (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="e_goal" name="goal" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6" id="donasi_penampung">
                                <div class="mb-3">
                                    <label class="form-label">Penampung</label>
                                    <input type="hidden" class="form-control" id="penampung" readonly>
                                    <input type="text" class="form-control" id="penampung_text" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6" id="donasi_admin">
                                <div class="mb-3">
                                    <label class="form-label">Penampung</label>
                                    <select class="form-control" id="penampung_admin">
                                        <option value="" selected>-- PILIH PENAMPUNG --</option>
                                        @foreach($penampung as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Rekening</label>
                                    <input type="text" class="form-control" id="nama_rek" name="nama_rek" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="no_rek" name="no_rek" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Bank</label>
                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal View-->
    <div class="modal fade" id="modal-view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="v-form-donate" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="v_judul" name="judul" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <input class="form-control" id="v_deskripsi" name="deskripsi" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Raised (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="v_raised" name="raised"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Goal (Rp)</label>
                                    <input type="text" min="0"  class="form-control rupiah" id="v_goal" name="goal"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.rupiah').inputmask({
                alias: "decimal",
                allowMinus : false,
                digits: 2,
                repeat: 36,
                digitsOptional: false,
                decimalProtect: true,
                groupSeparator: ".",
                placeholder: '0',
                radixPoint: ",",
                radixFocus: true,
                autoGroup: true,
                autoUnmask: false,
                onBeforeMask: function(value, opts) {
                    return value;
                },
                removeMaskOnSubmit: true
            });

            $('#penampung_admin').change(function(){
                var created_by = $(this).val();
                $.get("{{ URL::to('admin/donasi-selesai/get-penampung') }}" ,{created_by:created_by} ,function(res){
                    var data = JSON.parse(res);
                    $('#nama_rek').val(data.nama_rek);
                    $('#no_rek').val(data.no_rek);
                    $('#nama_bank').val(data.nama_bank);
                })
            })
        });

        function kirim(obj) {
            var item = $(obj).data('item');
            var created_by = item.created_by;

            $('#id').val(item.id);
            $('#e_judul').val(item.judul);
            $('#e_deskripsi').val(item.deskripsi);
            $('#e_raised').val(item.raised.replace('.', ','));
            $('#e_goal').val(item.goal.replace('.', ','));

            if(created_by == 1){
                $('#donasi_penampung').hide();
                $('#donasi_admin').show();
                $('#penampung_admin').attr('name','penampung');
                $('#penampung_admin').attr('required', true);
                $('#penampung').attr('name','');
            }else{
                $('#donasi_admin').hide();
                $('#donasi_penampung').show();
                $('#penampung').attr('name','penampung');
                $('#penampung_admin').attr('required', false);
                $('#penampung_admin').attr('name','');

                $('#penampung').val(created_by);
                $.get("{{ URL::to('admin/donasi-selesai/get-penampung') }}" ,{created_by:created_by} ,function(res){
                    var data = JSON.parse(res);
                    console.log(data);
                    $('#penampung_text').val(data.name);
                    $('#nama_rek').val(data.nama_rek);
                    $('#no_rek').val(data.no_rek);
                    $('#nama_bank').val(data.nama_bank);
                })
            }

            $('#modal-edit').modal('show');
        }

        function view(obj) {
            var item = $(obj).data('item');
            var user = $(obj).data('user');

            $('#v_judul').val(item.judul);
            $('#v_deskripsi').val(item.deskripsi);
            $('#v_raised').val(item.raised.replace('.', ','));
            $('#v_goal').val(item.goal.replace('.', ','));
            $('#v_created_by').val(user.name);

            $('#modal-view').modal('show');
        }

        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus Donasi Tersebut",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ URL::to('admin/donasi-selesai/hapus') }}" + '/' + id;
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: "Batal Hapus",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
        }

        

    </script>

    {{-- flactpcik --}}
    <script>
    config = {
    // minDate: "today",
    enableTime: true,
    minDate :new Date().fp_incr(7)

    }
    flatpickr("input[type=date]",config);
    </script>

    @if(Session::has('success'))
    <script type="text/javascript">
        Swal.fire({
        icon: 'success',
        text: '{{Session::get("success")}}',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php
        Session::forget('success');
    ?>
    @endif
    @if(Session::has('error'))
    <script type="text/javascript">
        Swal.fire({
        icon: 'error',
        text: '{{Session::get("error")}}',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php
        Session::forget('error');
    ?>
    @endif
@endsection
