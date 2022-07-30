@extends('layouts.app')

@section('title', 'Dokter | Tambah Permohonan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dokter') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dokter.permohonan-layanan-dikonfirmasi') }}">Data Permohonan</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah Permohonan</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dokter.permohonan-layanan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Data Mahasiswa</label>
                            <select class="form-control theSelect" name="id_mahasiswa">
                                <option>Data Mahasiswa</option>
                                @foreach ($mahasiswa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nrp. ' | ' .$item->nama. ' | ' .$item->prodi}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Program Studi</label>
                            <select class="form-control" name="prodi">
                                <option>Pilih Program Studi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->prodi }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <input type="hidden" name="id_layanan" value="{{ 1 }}" />
                        <div class="form-group">
                            <label>Judul Keluhan</label>
                            <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ old('judul_keluhan') }}" placeholder="Masukkan Judul">
                            <div class="invalid-feedback">
                                @error('judul_keluhan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Status Pengajuan Permohonan</label>
                            <select class="form-control" name="id_status">
                                <option>Pilih Status Pengajuan</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->status }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Deskripsi Keluhan</label>
                            <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Opsional" value="{{ old('deskripsi_keluhan') }}"></textarea>
                            <div class="invalid-feedback">
                                @error('deskripsi_keluhan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hasil Penanganan</label>
                            <textarea name="penanganan" class="form-control @error('penanganan') is-invalid @enderror" rows="3" placeholder="Hasil Penanganan" value="{{ old('penanganan') }}"></textarea>
                            <div class="invalid-feedback">
                                @error('penanganan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        {{-- <div>
                            <label>Bukti Pelayanan</label> <br>
                            <input type="file" name="berkas" class="form-control @error('berkas') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('berkas')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group mt-4">
                            <a href="{{ route('dokter.permohonan-layanan-dikonfirmasi') }}" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts')
<script>
    $(".theSelect").select2();
</script>
@endsection