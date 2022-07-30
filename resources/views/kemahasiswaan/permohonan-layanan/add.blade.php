@extends('layouts.app')

@section('title', 'Kemahasiswaan | Tambah Permohonan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('kemahasiswaan') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kemahasiswaan.permohonan-layanan') }}">Data Permohonan</a></li>
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
            <form action="{{ route('kemahasiswaan.permohonan-layanan.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label>Jenis Layanan</label>
                            <select class="form-control" name="id_layanan">
                                <option>Pilih Jenis Layanan</option>
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul Keluhan</label>
                            <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ old('judul_keluhan') }}" placeholder="Masukkan Judul">
                            <div class="invalid-feedback">
                                @error('judul_keluhan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Keluhan</label>
                            <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Opsional" value="{{ old('deskripsi') }}"></textarea>
                            <div class="invalid-feedback">
                                @error('deskripsi_keluhan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="id_status" value="{{ 3 }}" />
                        {{-- <div class="form-group">
                            <label>Status Pengajuan</label>
                            <select class="form-control" name="id_status">
                                <option>Pilih Status Pengajuan</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->status }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div>
                            <label>Berkas Permohonan</label> <br>
                            <input type="file" name="berkas" class="form-control @error('berkas') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('berkas')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('kemahasiswaan.permohonan-layanan') }}" class="btn btn-dark btn-sm">Kembali</a>
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