@extends('layouts.app')

@section('title', 'Kemahasiswaan | Detail User Mahasiswa')

@section('header')
    <div class="col-sm-6">
        <h1>Detail User Mahasiswa</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/user/mahasiswa">User Mahasiswa</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail User Mahasiswa</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">NRP</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->nrp }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Nama</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->nama }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Program Studi</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->prodi }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Angkatan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->angkatan }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Kelas</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->kelas }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Alamat</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->alamat }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Email</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $mahasiswa->user->email }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/kemahasiswaan/user/mahasiswa" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
