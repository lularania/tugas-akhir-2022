@extends('layouts.app')

@section('title', 'Kemahasiswaan | Edit Jenis Penanganan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/jenis-penanganan">Jenis Penanganan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Edit Jenis Penanganan</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kemahasiswaan.jenis-penanganan.update', $penanganan->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Jenis Penanganan</label>
                            <input name="penanganan" class="form-control @error('penanganan') is-invalid @enderror" value="{{ $penanganan->jenis_penanganan }}">
                            <div class="invalid-feedback">
                                @error('penanganan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/jenis-penanganan" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
