@extends('layouts.app')

@section('title', 'Kemahasiswaan | Tambah Program Studi')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/prodi">Program Studi</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah Program Studi</b></h3>
        </div>
        <div class="card-body">
            <form action="/kemahasiswaan/prodi/save" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Program Studi</label>
                            <input name="prodi" class="form-control @error('prodi') is-invalid @enderror" value="{{ old('prodi') }}">
                            <div class="invalid-feedback">
                                @error('prodi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/kemahasiswaan/prodi" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
