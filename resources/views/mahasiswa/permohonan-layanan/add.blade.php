@extends('layouts.app')

@section('title', 'Mahasiswa | Tambah Permohonan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.permohonan-layanan') }}">Permohonan</a></li>
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
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Layanan Konseling</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Layanan Kesehatan</a>
                </li>
              </ul>
              <br>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="/mahasiswa/permohonan-layanan/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id_layanan" value="{{ 2 }}" />
                                <div class="form-group">
                                    <label>Jenis Penanganan</label>
                                    <select class="form-control" name="jenis_penanganan">
                                        <option>Pilih Jenis Penanganan</option>
                                        @foreach ($penanganan as $item)
                                            <option value="{{ $item->jenis_penanganan }}">{{ $item->jenis_penanganan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul Keluhan</label>
                                    <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ old('judul_keluhan') }}">
                                    <div class="invalid-feedback">
                                        @error('judul_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Opsional" value="{{ old('deskripsi_keluhan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('deskripsi_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label>Berkas Permohonan <small>*Sertakan Foto Bukti Keluhan atau Hasil Pemeriksaan Sebelumnya dalam Format PDF</small> </label> <br>
                                    <input type="file" name="berkas" class="form-control @error('berkas') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('berkas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group mt-4">
                                    <a href="{{ route('mahasiswa.permohonan-layanan') }}" class="btn btn-dark btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-dark btn-sm">Simpan Draft</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="/mahasiswa/permohonan-layanan/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id_layanan" value="{{ 1 }}" />
                                <div class="form-group">
                                    <label>Judul Keluhan</label>
                                    <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ old('judul_keluhan') }}">
                                    <div class="invalid-feedback">
                                        @error('judul_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Opsional" value="{{ old('deskripsi_keluhan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('deskripsi_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label>Berkas Permohonan <small>*Sertakan Foto Bukti Keluhan atau Hasil Pemeriksaan Sebelumnya dalam Format PDF</small></label> <br>
                                    <input type="file" name="berkas" class="form-control @error('berkas') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('berkas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="form-group mt-4">
                                    <a href="{{ route('mahasiswa.permohonan-layanan') }}" class="btn btn-dark btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-dark btn-sm">Simpan Draft</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
