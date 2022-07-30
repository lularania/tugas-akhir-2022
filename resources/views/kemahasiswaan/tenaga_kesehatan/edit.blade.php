@extends('layouts.app')

@section('title', 'Kemahasiswaan | Edit Tenaga Kesehatan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/tenaga-kesehatan">Tenaga Kesehatan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Edit Tenaga Kesehatan</b></h3>
        </div>
        <div class="card-body">
            <form action="/kemahasiswaan/tenaga-kesehatan/update/{{ $tenagakesehatan->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama_tenaga_kesehatan" class="form-control @error('nama_tenaga_kesehatan') is-invalid @enderror" value="{{ $tenagakesehatan->nama_tenaga_kesehatan }}">
                            <div class="invalid-feedback">
                                @error('nama_tenaga_kesehatan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input name="jabatan_tenaga_kesehatan" class="form-control @error('jabatan_tenaga_kesehatan') is-invalid @enderror" value="{{ $tenagakesehatan->jabatan_tenaga_kesehatan }}">
                            <div class="invalid-feedback">
                                @error('jabatan_tenaga_kesehatan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <select class="form-control" name="id_role">
                                <option value="{{ $tenagakesehatan->user->role->id }}">{{ Str::of($tenagakesehatan->user->role->name)->title() }}</option>
                                @foreach ($opsi_role as $item)
                                    <option value="{{ $item->id }}">{{ Str::of($item->name)->title() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Link Meeting</label>
                            <input name="link_meeting" class="form-control @error('link_meeting') is-invalid @enderror" value="{{ $tenagakesehatan->link_meeting }}">
                            <div class="invalid-feedback">
                                @error('link_meeting')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label>Foto</label> <br>
                            <input type="file" name="foto_tenaga_kesehatan" class="form-control @error('foto_tenaga_kesehatan') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('foto_tenaga_kesehatan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/kemahasiswaan/tenaga-kesehatan" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
