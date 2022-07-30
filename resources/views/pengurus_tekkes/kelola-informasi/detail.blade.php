@extends('layouts.app')

@section('title', 'Pengurus Tekkes | Detail Informasi Kesehatan')

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
        <h3 class="card-title"><b>Detail Informasi Kesehatan</b></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <table class="table table-alasan">
                    <tr>
                        <th width="200px" style="border: none">Judul</th>
                        <th width="30px" style="border: none">:</th>
                        <th style="border: none">{{ $informasi->judul }}</th>
                    </tr>
                    <tr>
                        <th width="200px" style="border: none">Sumber</th>
                        <th width="30px" style="border: none">:</th>
                        <th style="border: none">{{ $informasi->sumber }}</th>
                    </tr>
                    <tr>
                        <th width="200px" style="border: none">Dibimbing Oleh</th>
                        <th width="30px" style="border: none">:</th>
                        <th style="border: none">{{ $informasi->nama_tenaga_kesehatan. ' | ' .$informasi->jabatan_tenaga_kesehatan }}</th>
                    </tr>
                    <tr>
                        <th width="200px" style="border: none">Status Permohonan</th>
                        <th width="30px" style="border: none">:</th>
                        <th style="border: none">{{ $informasi->status }}</th>
                    </tr>      
                </table>
            </div>
            <div class="col-6">
                <table>
                    @if ($informasi->gambar)
                        <tr>
                            <th width="150px" style="border: none; padding-bottom: 10px;">Gambar Informasi</th>
                        </tr>
                        <tr style="display: flex;">
                            <th style="border: none; width: 19vw;">
                                <a href="{{ route('pengurus-tekkes.kelola-informasi.view', $informasi->id) }}" target="__blank" class="btn btn-block btn-info btn-sm btn-icon">
                                    <span>Lihat Gambar</span>
                                    <i class="far fa-eye"></i>
                                </a>
                            </th>
                            <th style="border: none; width: 19vw;">
                                <a href="{{ route('pengurus-tekkes.kelola-informasi.download', $informasi->id) }}" class="btn btn-block btn-info btn-sm btn-icon">
                                    <span>Unduh Gambar</span>
                                    <i class="fas fa-file-download"></i>
                                </a>
                            </th>
                        </tr>
                    @endif
                    <tr>
                        <th width="200px" style="border: none; padding-top: 30px;">Deskripsi Informasi</th>
                    </tr>
                </table>
                
                <p>{!! $informasi->deskripsi !!}</p>
            </div>
            <table class="table">
                <tr>
                    <th style="border: none">
                        <a href="{{ route('pengurus-tekkes.kelola-informasi') }}" class="btn btn-dark">Kembali</a>
                        @if ($informasi->id_status == '1')
                        <a href="/pengurus-tekkes/kelola-informasi/edit/{{ $informasi->id }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('pengurus-tekkes.kelola-informasi.send', $informasi->id) }}" class="btn btn-success">Unggah Informasi</a>
                        @endif
                    </th>
                </tr>
            </table>
        </div>
@endsection
