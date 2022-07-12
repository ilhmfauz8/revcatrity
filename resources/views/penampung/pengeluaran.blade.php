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
                        <h3 class="mt-0 header-title">Data Pengeluaran</h3>
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp; Tambah
                        </button>
                        <p class="text-muted font-14 mb-3"></p>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
                                    <th>Total (Rp)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $val)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->tanggal }}</td>
                                        <td>{{ $val->deskripsi }}</td>
                                        <td><a href="{{ url('/upload/bukti/'.$val->bukti.'') }}" target="_blank" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i>&nbsp;&nbsp;Lihat</a></td>
                                        <td>{{ number_format($val->total,2,',','.') }}</td>
                                        <td>
                                            <button type="button" onclick="edit(this)"
                                                data-item="{{ json_encode($val) }}" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-edit"></i></button>
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

    <!-- Modal Tambah-->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="e-form-donate" method="POST" action="{{ route('penampung.pengeluaran.tambah') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
                                    <label class="form-label">Total Pengeluaran</label>
                                    <input type="text" class="form-control rupiah" id="total" name="total" required>
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
    <!-- Modal Edit-->
    <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="e-form-donate" method="POST" action="{{ route('penampung.pengeluaran.edit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="e_tanggal" name="tanggal" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="e_keterangan" name="keterangan" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="e_bukti" name="bukti"><br>
                                    <a href="" target="_blank" class="btn btn-sm btn-dark" id="e_lihat_bukti"><i class="fa fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Total Pengeluaran</label>
                                    <input type="text" class="form-control rupiah" id="e_total" name="total" required>
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
        });

        function edit(obj) {
            var item = $(obj).data('item');

            $('#id').val(item.id);
            $('#e_tanggal').val(item.tanggal);
            $('#e_keterangan').val(item.deskripsi);
            $('#e_lihat_bukti').attr('href', '{{ url('/upload/bukti') }}/' + item.bukti + '');
            $('#e_total').val(item.total);

            $('#modal-edit').modal('show');
        }

        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus Laporan Tersebut",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ URL::to('penampung/laporan/hapus') }}" + '/' + id;
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
