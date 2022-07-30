@extends('layouts.app')

@section('title', 'Mahasiswa | Edit Permohonan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.permohonan-layanan') }}">Permohonan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Edit Permohonan</b></h3>
        </div>
        <div class="card-body">
            <form action="/mahasiswa/permohonan-layanan/update/{{ $permohonan->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $permohonan->mahasiswa->nama }}" readonly>
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NRP</label>
                            <input name="nrp" class="form-control @error('nrp') is-invalid @enderror" value="{{ $permohonan->mahasiswa->nrp }}" readonly>
                            <div class="invalid-feedback">
                                @error('nrp')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Prodi</label>
                            <input name="prodi" class="form-control @error('prodi') is-invalid @enderror" value="{{ $permohonan->mahasiswa->prodi }}" readonly>
                            <div class="invalid-feedback">
                                @error('prodi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Layanan</label>
                            <input name="id_layanan" class="form-control @error('id_layanan') is-invalid @enderror" value="{{ $permohonan->layanan->layanan }}" readonly>
                            <div class="invalid-feedback">
                                @error('id_layanan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul Permohonan</label>
                            <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ $permohonan->judul_keluhan }}">
                            <div class="invalid-feedback">
                                @error('judul_keluhan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Opsional">{{ $permohonan->deskripsi_keluhan }}</textarea>
                            <div class="invalid-feedback">
                                @error('deskripsi_keluhan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Jenis Layanan</label>
                            <select class="form-control" name="id_layanan">
                                <option value="{{ $permohonan->id_layanan }}">{{ $layanan->layanan }}</option>
                                @foreach ($opsi_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->layanan }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        @if ($permohonan->id_layanan == 2)
                        <div class="form-group">
                            <label>Jenis Penanganan</label>
                            <select class="form-control" name="jenis_penanganan">
                                <option value="{{ $permohonan->jenis_penanganan }}">{{ $permohonan->jenis_penanganan }}</option>
                                @foreach ($opsi_penanganan as $item)
                                    <option value="{{ $item->jenis_penanganan }}">{{ $item->jenis_penanganan }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>File Permohonan</label>
                            <br>
                                <object type="application/pdf" data="{{ asset('storage' . '/' . $permohonan->berkas)}}" width="1050" height="500">
                                </object>
                                <div class="input-image" style="display: flex">
                                <input type="file" name="berkas" class="form-control @error('berkas') is-invalid @enderror" value="">
                                <div class="invalid-feedback">
                                    @error('berkas')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        <div class="form-group mt-4">
                            <a href="{{ route('mahasiswa.permohonan-layanan') }}" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
