@extends('layouts.app')

@section('title', 'Pengurus Tekkes | Edit Informasi Kesehatan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('pengurus-tekkes') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pengurus-tekkes.kelola-informasi') }}">Data Informasi Kesehatan</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Edit Informasi Kesehatan</b></h3>
        </div>
        <div class="card-body">
            <form action="/pengurus-tekkes/kelola-informasi/update/{{ $informasi->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Judul</label>
                            <input name="judul" class="form-control @error('judul') is-invalid @enderror"  value="{{ $informasi->judul }}">
                            <div class="invalid-feedback">
                                @error('judul')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ $informasi->deskripsi }}</textarea>
                            <div class="invalid-feedback">
                                @error('deskripsi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="editor1"  class="form-control"><p>{!! $informasi->deskripsi !!}</p></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sumber</label>
                            <input name="sumber" class="form-control @error('sumber') is-invalid @enderror" value="{{ $informasi->sumber }}">
                            <div class="invalid-feedback">
                                @error('sumber')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dibimbing Oleh</label>
                            <select class="form-control theSelect" name="id_tenaga_kesehatan">
                                <option value="{{ $informasi->id_tenaga_kesehatan }}">{{ $informasi->id_tenaga_kesehatan}}</option>
                                @foreach ($tenagakesehatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->id. ' | ' .$item->nama_tenaga_kesehatan. ' | '.$item->jabatan_tenaga_kesehatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Gambar</label> <br>
                            <div class="input-image" style="display: flex">
                                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{$informasi->gambar}}">
                                <div class="invalid-feedback">
                                    @error('gambar')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('pengurus-tekkes.kelola-informasi') }}" class="btn btn-dark btn-sm">Kembali</a>
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
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
