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
                        <h3 class="mt-0 header-title">Data Laporan</h3>
                        <p class="text-muted font-14 mb-3"></p>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kucing</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $val)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->nama }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->telpon }}</td>
                                        <td>{{ $val->alamat }}</td>
                                        <td>
                                            <span class="badge bg-success rounded-pill">{{ $val->jenis_kucing }}</span>
                                        </td>
                                        <td>
                                            @if ($val->status == 1)
                                                <span class="badge bg-warning rounded-pill">Draft</span>
                                            @elseif($val->status == 2)
                                                <span class="badge bg-info rounded-pill">Proses</span>
                                            @else
                                                <span class="badge bg-success rounded-pill">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" onclick="view(this)"
                                                data-item="{{ json_encode($val) }}" class="btn btn-sm btn-warning"><i
                                                    class="far fa-eye"></i></button>
                                            <button type="button" onclick="edit(this)"
                                                data-item="{{ json_encode($val) }}" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-edit"></i></button>
                                            <button type="button" onclick="hapus('{{ $val->id }}')"
                                                class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="e-form-donate" method="POST" action="{{ route('admin.laporan.edit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="e_nama" name="nama" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" id="e_email" name="email" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="e_telepon" name="telepon" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="e_alamat" name="alamat" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kucing</label>
                                    <input type="text" class="form-control" id="e_jenis" name="jenis" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Pesan</label>
                                    <input type="text" class="form-control" id="e_pesan" name="pesan" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Foto</label><br>
                                    <a href="" target="_blank" id="e_lihat_foto" class="btn btn-sm btn-dark"><i
                                            class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="e_status_data" name="status_data" required>
                                        <option value="1">Draft</option>
                                        <option value="2">Proses</option>
                                        <option value="3">Selesai</option>
                                    </select>
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
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="v_nama" name="nama" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" id="v_email" name="email" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="v_telepon" name="telepon" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="v_alamat" name="alamat" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kucing</label>
                                    <input type="text" class="form-control" id="v_jenis" name="jenis" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Pesan</label>
                                    <input type="text" class="form-control" id="v_pesan" name="pesan" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Foto</label><br>
                                    <a href="" target="_blank" id="v_lihat_foto" class="btn btn-sm btn-dark"><i
                                            class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="v_status_data" name="status_data" disabled>
                                        <option value="1">Draft</option>
                                        <option value="2">Proses</option>
                                        <option value="3">Selesai</option>
                                    </select>
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

        });

        function edit(obj) {
            var item = $(obj).data('item');
            $('#id').val(item.id);
            $('#e_nama').val(item.nama);
            $('#e_email').val(item.email);
            $('#e_telepon').val(item.telpon);
            $('#e_alamat').val(item.alamat);
            $('#e_jenis').val(item.jenis_kucing);
            $('#e_pesan').val(item.pesan);
            $('#e_lihat_foto').attr('href', '{{ url('/upload/laporan') }}/' + item.foto + '');
            $('#e_status_data').val(item.status);

            $('#modal-edit').modal('show');
        }

        function view(obj) {
            var item = $(obj).data('item');
            $('#id').val(item.id);
            $('#v_nama').val(item.nama);
            $('#v_email').val(item.email);
            $('#v_telepon').val(item.telpon);
            $('#v_alamat').val(item.alamat);
            $('#v_jenis').val(item.jenis_kucing);
            $('#v_pesan').val(item.pesan);
            $('#v_lihat_foto').attr('href', '{{ url('/upload/laporan') }}/' + item.foto + '');
            $('#v_status_data').val(item.status);

            $('#modal-view').modal('show');
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
                    window.location.href = "{{ URL::to('admin/laporan/hapus') }}" + '/' + id;
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
