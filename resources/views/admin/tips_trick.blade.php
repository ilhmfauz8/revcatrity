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
                        <h3 class="mt-0 header-title">Tips dan Trick</h3>
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
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipstrick as $val)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $val->judul }}</td>
                                        <td>{{ $val->created_at }}</td>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Tips And Trick</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-donate" method="POST" action="{{ route('admin.tips_trick.tambah') }}"
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
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png"
                                        onchange="fileValidasi('image')" id="image" name="image" required>
                                    <span style="font-size:13px;color:red;">*Format : jpg, jpeg, png</span><br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" id="link" name="link" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="status_data" name="status" required>
                                        <option value="1">Draft</option>
                                        <option value="2">Publish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="hidden" id="counter_deskripsi">
                                    <button type="button" class="btn btn-sm btn-primary" onclick="TambahDeskripsi()"><i
                                            class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah Deskripsi</button>
                                </div>
                            </div>
                            <div id="div_deskripsi">

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
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Tips And Trick</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="e-form-donate" method="POST" action="{{ route('admin.tips_trick.edit') }}"
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
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" id="e_link" name="link" required>
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
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="e_status_data" name="status" required>
                                        <option value="1">Draft</option>
                                        <option value="2">Publish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="hidden" id="e_counter_deskripsi">
                                    <button type="button" class="btn btn-sm btn-primary" onclick="eTambahDeskripsi()"><i
                                            class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah Deskripsi</button>
                                </div>
                            </div>
                            <div id="e_div_deskripsi">

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
                    <h5 class="modal-title" id="staticBackdropLabel">View Tips And Trick</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="v-form-donate" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="v_judul" name="judul" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" id="v_link" name="link" required>
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
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="v_status_data" name="status" disabled>
                                        <option value="1">Draft</option>
                                        <option value="2">Publish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Created By</label>
                                    <input type="text" class="form-control" id="v_created_by" name="created_by"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Created At</label>
                                    <input type="text" class="form-control" id="v_created_at" name="created_at"
                                        readonly>
                                </div>
                            </div>
                            <div id="v_div_deskripsi">

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
            $('#e_link').val(item.link);
            $('#e_lihat_image').attr('href', '{{ url('/upload/tipstrick') }}/' + item.image + '');
            $('#e_status_data').val(item.status);

            if (item.deskripsi != null) {
                var deskripsi = item.deskripsi.split('<br>');
                var html = '';
                $('#e_counter_deskripsi').val(deskripsi.length);
                $.each(deskripsi, function(i, val) {
                    var no = i + 1;
                    html += '<div class="col-lg-12">';
                    html += '<div class="mb-3">';
                    html += '<label class="form-label">Deskripsi (Paragraf ' + no +
                        ')</label>&nbsp;&nbsp;<button onclick="eRemoveDeskripsi(this)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>';
                    html +=
                        '<textarea type="text" rows="4" maxlength="500" class="form-control e_countDeskripsi" id="deskripsi" name="deskripsi[]" value="' +
                        val + '" required>' + val + '</textarea>';
                    html += '</div>';
                    html += '</div>';

                })
                $('#e_div_deskripsi').append(html);
            }

            $('#modal-edit').modal('show');
        }

        function view(obj) {
            var item = $(obj).data('item');
            var user = $(obj).data('user');

            $('#id').val(item.id);
            $('#v_judul').val(item.judul);
            $('#v_link').val(item.link);
            $('#v_lihat_image').attr('href', '{{ url('/upload/tipstrick') }}/' + item.image + '');
            $('#v_status_data').val(item.status);
            $('#v_created_by').val(user.name);
            $('#v_created_at').val(item.created_at);


            if (item.deskripsi != null) {
                var deskripsi = item.deskripsi.split('<br>');
                var html = '';
                $.each(deskripsi, function(i, val) {
                    var no = i + 1;
                    html += '<div class="col-lg-12">';
                    html += '<div class="mb-3">';
                    html += '<label class="form-label">Deskripsi (Paragraf ' + no + ')</label>';
                    html +=
                        '<textarea type="text" rows="4" maxlength="500" class="form-control e_countDeskripsi" id="deskripsi" name="deskripsi[]" value="' +
                        val + '" required>' + val + '</textarea>';
                    html += '</div>';
                    html += '</div>';

                })
                $('#v_div_deskripsi').append(html);
            }

            $('#modal-view').modal('show');
        }

        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus TipsTrick Tersebut",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ URL::to('admin/tips-trick/hapus') }}" + '/' + id;
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

        function TambahDeskripsi() {
            var count_deskripsi = $('.countDeskripsi').length;
            var counter = count_deskripsi + 1;
            $('#counter_deskripsi').val(counter);

            var no = $('#counter_deskripsi').val();
            var html = '';
            html += '<div class="col-lg-12">';
            html += '<div class="mb-3">';
            html += '<label class="form-label">Deskripsi (Paragraf ' + no +
                ')</label>&nbsp;&nbsp;<button onclick="RemoveDeskripsi(this)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>';
            html +=
                '<textarea type="text" rows="4" maxlength="500" class="form-control countDeskripsi" id="deskripsi" name="deskripsi[]" required></textarea>';
            html += '</div>';
            html += '</div>';

            $('#div_deskripsi').append(html);
        }

        function RemoveDeskripsi(obj) {
            var count_deskripsi = $('#counter_deskripsi').val();
            var counter = count_deskripsi - 1;
            $('#counter_deskripsi').val(counter);

            $(obj).parent().parent().remove();
        }

        function eTambahDeskripsi() {
            var count_deskripsi = $('.e_countDeskripsi').length;
            var counter = count_deskripsi + 1;
            $('#e_counter_deskripsi').val(counter);

            var no = $('#e_counter_deskripsi').val();
            var html = '';
            html += '<div class="col-lg-12">';
            html += '<div class="mb-3">';
            html += '<label class="form-label">Deskripsi (Paragraf ' + no +
                ')</label>&nbsp;&nbsp;<button onclick="eRemoveDeskripsi(this)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>';
            html +=
                '<textarea type="text" rows="4" maxlength="500" class="form-control e_countDeskripsi" id="deskripsi" name="deskripsi[]" required></textarea>';
            html += '</div>';
            html += '</div>';

            $('#e_div_deskripsi').append(html);
        }

        function eRemoveDeskripsi(obj) {
            var count_deskripsi = $('#e_counter_deskripsi').val();
            var counter = count_deskripsi - 1;
            $('#e_counter_deskripsi').val(counter);

            $(obj).parent().parent().remove();
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
