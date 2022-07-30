@extends('layouts.app')

@section('title', 'Pedoman Penggunaan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('pengurus-tekkes') }}">Home</a></li>
            <li class="breadcrumb-item active">Pedoman Penggunaan</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0"><b>Alur Cara Menambahkan Informasi</b></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
        <div class="card-body">
            <div class="image">
                    <img src="{{ asset('assets/img/11.png') }}" width="515px" alt="11.png">
            </div>
        </div>
</div>
@endsection
