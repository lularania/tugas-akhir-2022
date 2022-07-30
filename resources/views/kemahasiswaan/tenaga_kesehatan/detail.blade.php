@extends('layouts.app')

@section('title', 'Kemahasiswaan | Detail Tenaga Kesehatan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item active"><a href="/kemahasiswaan/tenaga-kesehatan">Tenaga Kesehatan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Detail Tenaga Kesehatan</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">ID</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $tenagakesehatan->id }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Nama</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $tenagakesehatan->nama_tenaga_kesehatan }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Jabatan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $tenagakesehatan->jabatan_tenaga_kesehatan }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Pekerjaan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ Str::of($tenagakesehatan->user->role->name)->title() }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/kemahasiswaan/tenaga-kesehatan" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
