@extends('layouts.app')

@section('title', 'Pengurus UKM Tekkes | Informasi Kesehatan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('pengurus-tekkes') }}">Home</a></li>
            <li class="breadcrumb-item active">Informasi Kesehatan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Data Informasi Kesehatan</b></h3>
        </div>
        <div class="card-body">
            <div class="cointainer">
            <div class="row">
            @foreach ($informasi as $item)
            <div class="col-4 d-flex align-items-stretch">
            <div class="card" style="width: 25rem;">
                <div style="height: 150px; overflow:hidden">
                    <img src="{{ asset('storage' . '/' . $item->gambar)}}" class="card-img-top img-fluid" height="100px" alt="...">
                </div>
                <div class="card-body">
                  <h4 class="card-title text-bold">{{ $item->judul }}</h4>
                  <p class="card-text">{!! Str::limit($item->deskripsi, 25, '...') !!}</p>
                  <p class="card-text"><small class="text-muted">{{ $item->sumber }}</small></p>
                  <a href="{{route('pengurus-tekkes.informasi-kesehatan.detail', $item->id)}}">Lihat Detail {{ $item->judul }}....</a>
                </div>
            </div>
            </div>
              @endforeach
        </div>
    </div>
    <div class="float-right">
        {{ $informasi->links("pagination::bootstrap-4") }}
    </div>
    </div>
    </div>
@endsection
