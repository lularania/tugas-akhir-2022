@extends('layouts.app')

@section('title', 'Kemahasiswaan | Detail Program Studi')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/prodi">Program Studi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Program Studi</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">ID</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $prodi->id }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Program Studi</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $prodi->prodi }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/kemahasiswaan/prodi" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
