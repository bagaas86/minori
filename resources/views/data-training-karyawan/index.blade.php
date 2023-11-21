@extends('layout.template')
@section('content')
    <div class="container">
        <h3>Data Training Karyawan</h3>
        <div class="col col-md-12 col-12">
            <a href="{{ route('training-karyawan.create') }}" class="btn btn-primary">Tambah Data Training Karyawan</a>
            <div class=" mt-4">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Tgl Sertifikat</th>
                            <th>NIP</th>
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
<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('training-karyawan.getdata') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'jenis',
                    name: 'jenis',
                },
                {
                    data: 'tgl_sertifikat',
                    name: 'tgl_sertifikat',
                },
                {
                    data: 'nip',
                    name: 'nip',
                },
            ]
        });

    });
</script>
