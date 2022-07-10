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
                        <h3 class="mt-0 header-title">Master Donasi</h3>
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp; Tambah
                        </button>
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
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donasi as $val)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->judul }}</td>
                                        <td>Rp {{ number_format($val->raised, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($val->goal, 2, ',', '.') }}</td>
                                        <td>{{ tgl_indo(date('Y-m-d', strtotime($val->created_at))) }}</td>
                                        <td>{{ tgl_indo(date('Y-m-d', strtotime($val->end_date))) }}</td>
                                        <td>
                                            @if ($val->status == 1)
                                                <span class="badge bg-warning rounded-pill">Draft</span>
                                            @else
                                                <span class="badge bg-success rounded-pill">Publish</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" onclick="view(this)"
                                                data-user="{{ json_encode(getUser($val->created_by)) }}"
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-donate" method="POST" action="{{ route('penampung.donasi.tambah') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <input class="form-control" id="deskripsi" name="deskripsi" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal selesai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                    <span style="font-size:13px;color:red;">*Minimal :7 hari dari tanggal pembuatan</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Raised (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="raised"
                                        name="raised" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Goal (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="goal"
                                        name="goal" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('image')" id="image" name="image" required>
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="status_data" name="status_data" disabled>
                                        <option value="1">Draft</option>
                                        <option value="2">Publish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Detail Satu</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('image_satu')" id="image_satu" name="image_satu" required>
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Detail Dua</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('image_dua')" id="image_dua" name="image_dua" required>
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span>
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
                <form id="e-form-donate" method="POST" action="{{ route('penampung.donasi.edit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="e_judul" name="judul" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <input class="form-control" id="e_deskripsi" name="deskripsi" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal selesai</label>
                                    <input type="date" class="form-control" id="e_end_date" name="end_date" required>
                                    <span style="font-size:13px;color:red;">*Minimal :7 hari dari tanggal pembuatan</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Raised (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="e_raised"
                                        name="raised" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Goal (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="e_goal"
                                        name="goal" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('e_image')" id="e_image" name="image">
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span><br>
                                    <a href="" target="_blank" id="e_lihat_image" class="btn btn-sm btn-dark"><i
                                            class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Detail Satu</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('e_image_satu')" id="e_image_satu" name="image_satu">
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span><br>
                                    <a href="" target="_blank" id="e_lihat_image_satu"
                                        class="btn btn-sm btn-dark"><i class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Detail Dua</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('e_image_dua')" id="e_image_dua" name="image_dua">
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span><br>
                                    <a href="" target="_blank" id="e_lihat_image_dua"
                                        class="btn btn-sm btn-dark"><i class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="e_status_data" name="status_data" disabled>
                                        <option value="1">Draft</option>
                                        <option value="2">Publish</option>
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
                                    <label class="form-label">Tanggal selesai</label>
                                    <input type="date" class="form-control" id="v_end_date" name="end_date" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Raised (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="v_raised"
                                        name="raised" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Goal (Rp)</label>
                                    <input type="text" min="0" class="form-control rupiah" id="v_goal"
                                        name="goal" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Created By</label>
                                    <input type="text" class="form-control" id="v_created_by" name="v_created_by"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Created At</label>
                                    <input type="text" class="form-control" id="v_created_at" name="v_created_at"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <br>
                                    <a href="" target="_blank" id="v_lihat_image" class="btn btn-sm btn-dark"><i
                                            class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Detail Satu</label>
                                    <br>
                                    <a href="" target="_blank" id="v_lihat_image_satu"
                                        class="btn btn-sm btn-dark"><i class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Detail Dua</label>
                                    <br>
                                    <a href="" target="_blank" id="v_lihat_image_dua"
                                        class="btn btn-sm btn-dark"><i class="far fa-eye"></i>&nbsp;&nbsp;Lihat</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="v_status_data" name="status_data" disabled>
                                        <option value="1">Draft</option>
                                        <option value="2">Publish</option>
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
            $('.rupiah').inputmask({
                alias: "decimal",
                allowMinus: false,
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
            $('#e_judul').val(item.judul);
            $('#e_deskripsi').val(item.deskripsi);
            $('#e_end_date').val(item.end_date);
            $('#e_raised').val(item.raised.replace('.', ','));
            $('#e_goal').val(item.goal.replace('.', ','));
            $('#e_lihat_image').attr('href', '{{ url('/upload/donasi') }}/' + item.image + '');
            $('#e_lihat_image_satu').attr('href', '{{ url('/upload/donasi') }}/' + item.image_satu + '');
            $('#e_lihat_image_dua').attr('href', '{{ url('/upload/donasi') }}/' + item.image_dua + '');
            $('#e_status_data').val(item.status);

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
            $('#v_created_at').val(item.created_at);
            $('#v_end_date').val(item.end_date);
            $('#v_lihat_image').attr('href', '{{ url('/upload/donasi') }}/' + item.image + '');
            $('#v_lihat_image_satu').attr('href', '{{ url('/upload/donasi') }}/' + item.image_satu + '');
            $('#v_lihat_image_dua').attr('href', '{{ url('/upload/donasi') }}/' + item.image_dua + '');
            $('#v_status_data').val(item.status);

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
                    window.location.href = "{{ URL::to('penampung/donasi/hapus') }}" + '/' + id;
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
    <script>
        config = {
            // minDate: "today",
            enableTime: true,
            minDate: new Date().fp_incr(7)

        }
        flatpickr("input[type=date]", config);
    </script>

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                text: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 1500
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
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        <?php
        Session::forget('error');
        ?>
    @endif
@endsection
