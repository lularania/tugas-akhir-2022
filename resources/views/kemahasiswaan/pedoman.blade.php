@extends('layouts.app')

@section('title', 'Pedoman Penggunaan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item active">Pedoman Penggunaan</li>
        </ol>
    </div>
@endsection

@section('content')
{{-- <div class="card">
    <div class="card-header">
        <h5 class="card-title m-0"><b>Alur Cara Merekomendasikan Permohonan Mahasiswa</b></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
        <div class="card-body">
            <div class="image">
                    <img src="{{ asset('assets/img/2-2.png') }}" width="1050px" alt="2-2.png">
            </div>
        </div>
</div> --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title m-0"><b>Skema dan Informasi Penting</b></h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="image">
                <img src="{{ asset('assets/img/7.png') }}" width="515px" alt="7.png">
                <img src="{{ asset('assets/img/8.png') }}" width="515px" alt="8.png">
            </div>
        </div>
    </div>
@endsection
