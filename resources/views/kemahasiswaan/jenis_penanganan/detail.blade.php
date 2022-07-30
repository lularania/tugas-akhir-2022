@extends('layouts.app')

@section('title', 'Kemahasiswaan | Detail Jenis Penanganan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/jenis-penanganan">Jenis Penanganan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Jenis Penanganan</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">ID Penanganan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $penanganan->id }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Jenis Penanganan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $penanganan->penanganan }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/kemahasiswaan/jenis-penanganan" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
