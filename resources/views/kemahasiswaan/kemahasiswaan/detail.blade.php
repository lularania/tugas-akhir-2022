@extends('layouts.app')

@section('title', 'Kemahasiswaan | Detail User Kemahasiswaan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/user/kemahasiswaan">User Kemahasiswaan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail User Kemahasiswaan</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">NIP</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $kemahasiswaan->nip }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Nama</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $kemahasiswaan->nama }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Jabatan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $kemahasiswaan->jabatan }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Email</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $kemahasiswaan->user->email }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="{{ route('kemahasiswaan.user.kemahasiswaan') }}" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
