@extends('layout.template')
@section('content')
    <div class="container">
        <h3>Profil Karyawan</h3>
        <div class="col col-md-12 col-12">
            <div class="row">
                <div class="col col-md-2">
                    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
                </div>
                <div class="col col-md-4">
                    <select onchange="tampilForm()" type="text" id="kategori" class="form-select">
                        <option value="Kosong" selected>-- Tanpa Filter --</option>
                        <option value="nip">NIP</option>
                        <option value="nama_karyawan">Nama Karyawan</option>
                    </select>
                </div>
                <div class="col col-md-4">
                    <input type="text" class="form-control" name="keyword" id="keyword" disabled>
                </div>
            </div>

            <div class="mt-4">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    function tampilForm() {
        var kategori = $("#kategori").val();
        var keyword = document.getElementById('keyword');
        switch (kategori) {
            case 'nip':
                keyword.type = 'number';
                keyword.disabled = false;
                break;
            case 'nama_karyawan':
                keyword.type = 'text';
                keyword.disabled = false;
                break;
            case 'Kosong':
                keyword.type = 'text';
                keyword.disabled = true;
                $("#keyword").val(null);
                break;
        }
    }

    $(document).ready(function() {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('karyawan.getdata') }}",
                data: function(d) {
                    d.kategori = $('#kategori').val();
                    d.keyword = $('#keyword').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nip',
                    name: 'nip'
                },
                {
                    data: 'nama_karyawan',
                    name: 'nama_karyawan'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
            ],
            bFilter: false,
        });

        $('#kategori, #keyword').on('keyup change', function() {
            table.draw();
        });
    });
</script>
