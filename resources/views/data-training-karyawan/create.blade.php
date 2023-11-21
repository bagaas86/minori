@extends('layout.template')
@section('content')
    <div class="container">
        <h3>Tambah Data Training Karyawan</h3>
        <div class="col col-md-12 col-12">
            <div class="card mt-4">
                <form method="POST" action="{{ route('training-karyawan.store') }}">
                    @csrf
                    <div class="row ms-2 me-2 mt-2">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Karyawan</label>
                            <select class="form-control  @error('nip') is-invalid @enderror" name="nip">
                                <option value="" selected disabled>-- Pilih Karyawan --</option>
                                @foreach ($karyawan as $data)
                                    <option value="{{ $data->nip }}">{{ $data->nip }} - {{ $data->nama_karyawan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Jenis Training</label>
                            <select class="form-control  @error('jenis') is-invalid @enderror" name="jenis">
                                <option value="" selected disabled>-- Pilih Jenis Training --</option>
                                @foreach ($training as $data)
                                    <option value="{{ $data->jenis_training }}">{{ $data->jenis_training }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputEmail4" class="form-label">Tanggal Sertifikat</label>
                            <input type="date" class="form-control @error('tgl_sertifikat') is-invalid @enderror"
                                name="tgl_sertifikat" value="{{ old('tgl_sertifikat') }}">
                            @error('tgl_sertifikat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputEmail4" class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan_training') is-invalid @enderror"
                                name="keterangan_training" value="{{ old('keterangan_training') }}">
                            @error('keterangan_training')
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
