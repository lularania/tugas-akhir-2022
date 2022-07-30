@extends('layouts.app')

@section('title', 'Pengurus UKM Tekkes | Detail Informasi Kesehatan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('pengurus-tekkes') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pengurus-tekkes.informasi-kesehatan') }}">Informasi Kesehatan</a></li>
            <li class="breadcrumb-item">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="embed-responsive embed-responsive-16by9">
            <img src="{{ asset('storage' . '/' . $informasi->gambar)}}" class="card-img-top embed-responsive-item" alt="...">
        </div>

            <div class="card-body">            
                <h6 class="text-bold">Judul Informasi Kesehatan</h6>
                <hr class="w-100 text-secondary">
                <p>{{$informasi->judul}}</p>
                <br>
                <h6 class="text-bold">Deskripsi Informasi Kesehatan</h5>
                <hr class="w-100 text-secondary">
                <p>{!! $informasi->deskripsi !!}</p>
                <br>
                <h6 class="text-bold">Sumber Informasi Kesehatan</h6>
                <hr class="w-100 text-secondary">
                <p>{{$informasi->sumber}}</p>
                </div>
        <!-- /.card-body -->
    </div>
@endsection
