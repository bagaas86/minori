@extends('layout.template')
@section('content')
    <div class="container">
        <h3>Jenis Training</h3>
        <div class="col col-md-12 col-12">
            <div class="card mt-4">
                <form method="POST" action="{{ route('jenistraining.store') }}">
                    @csrf
                    <div class="row ms-2 me-2 mt-2">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Jenis Training</label>
                            <input type="text" class="form-control  @error('jenis_training') is-invalid @enderror"
                                name="jenis_training" value="{{ old('jenis_training') }}">
                            @error('jenis_training')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('jenis_keterangan') is-invalid @enderror"
                                name="jenis_keterangan" value="{{ old('jenis_keterangan') }}">
                            @error('jenis_keterangan')
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
