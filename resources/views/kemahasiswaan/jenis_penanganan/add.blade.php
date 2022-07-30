@extends('layouts.app')

@section('title', 'Kemahasiswaan | Tambah Jenis Penanganan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/jenis-penanganan">Jenis Penanganan</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah Jenis Penanganan</b></h3>
        </div>
        <div class="card-body">
            <form action="/kemahasiswaan/jenis-penanganan/save" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Jenis Penanganan</label>
                            <input name="penanganan" class="form-control @error('penanganan') is-invalid @enderror" value="{{ old('penanganan') }}">
                            <div class="invalid-feedback">
                                @error('penanganan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/kemahasiswaan/jenis-penanganan" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
