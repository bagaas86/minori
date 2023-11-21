@extends('layout.template')
@section('content')
    <div class="container">
        <h3>Tambah Karyawan</h3>
        <div class="col col-md-12 col-12">
            <div class="card mt-4">
                <form method="POST" action="{{ route('karyawan.store') }}">
                    @csrf
                    <div class="row ms-2 me-2 mt-2">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">NIP</label>
                            <input type="text" class="form-control  @error('nip') is-invalid @enderror" name="nip"
                                value="{{ old('nip') }}">
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror"
                                name="nama_karyawan" value="{{ old('nama_karyawan') }}">
                            @error('nama_karyawan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                value="{{ old('jabatan') }}">
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
