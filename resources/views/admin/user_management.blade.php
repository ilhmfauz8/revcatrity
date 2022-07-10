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
                        <h3 class="mt-0 header-title">User Management</h3>
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp; Tambah
                        </button>
                        <p class="text-muted font-14 mb-3"></p>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NomorWA</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $val)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->nomorwa }}</td>
                                        <td>{{ $val->password_real }}</td>
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


    <!-- Modal Tambah-->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Penampung</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-donate" method="POST" action="{{ route('admin.user_management.tambah') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">NomorWA</label>
                                    <input type="text" class="form-control" id="nomorwa" name="nomorwa" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Syarat & Ketentuan</label>
                                    <textarea rows="4" class="form-control" id="ketentuan" name="ketentuan" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Maps</label>
                                    <input type="text" class="form-control" id="maps" name="maps" required>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="e-form-donate" method="POST" action="{{ route('admin.user_management.edit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="e_name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="e_email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" id="e_password" name="password" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="e_alamat" name="alamat" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">NomorWA</label>
                                    <input type="text" class="form-control" id="e_nomorwa" name="nomorwa" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Syarat & Ketentuan</label>
                                    <textarea rows="4" class="form-control" id="e_ketentuan" name="ketentuan" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Maps</label>
                                    <input type="text" class="form-control" id="e_maps" name="maps" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <iframe id="e_iframeUser" src="" width="100%" height="300"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                    <input type="text" class="form-control" id="v_name" name="name" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="v_email" name="email" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" id="v_password" name="password" readonly>
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
                                    <label class="form-label">NomorWA</label>
                                    <input type="text" class="form-control" id="v_nomorwa" name="nomorwa" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Syarat & Ketentuan</label>
                                    <textarea rows="4" class="form-control" id="v_ketentuan" name="ketentuan" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Maps</label>
                                    <input type="text" class="form-control" id="v_maps" name="maps" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <iframe id="v_iframeUser" src="" width="100%" height="300"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.rupiah').inputmask({
                alias: "decimal",
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
            $('#e_name').val(item.name);
            $('#e_email').val(item.email);
            $('#e_password').val(item.password_real);
            $('#e_alamat').val(item.alamat);
            $('#e_nomorwa').val(item.nomorwa);
            $('#e_maps').val(item.maps);
            $('#e_iframeUser').attr('src', item.maps);
            $('#e_ketentuan').val(item.syarat_ketentuan);
            $('#modal-edit').modal('show');
        }

        function view(obj) {
            var item = $(obj).data('item');

            $('#id').val(item.id);
            $('#v_name').val(item.name);
            $('#v_email').val(item.email);
            $('#v_password').val(item.password_real);
            $('#v_alamat').val(item.alamat);
            $('#v_nomorwa').val(item.nomorwa);
            $('#v_maps').val(item.maps);
            $('#v_iframeUser').attr('src', item.maps);
            $('#v_ketentuan').val(item.syarat_ketentuan);
            $('#modal-view').modal('show');
        }

        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus Admin Tersebut",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ URL::to('admin/user-management/hapus') }}" + '/' + id;
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
@endsection
