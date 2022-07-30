@extends('layouts.app')

@section('title', 'Pedoman Penggunaan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/mahasiswa">Home</a></li>
            <li class="breadcrumb-item active">Pedoman Penggunaan</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0"><b>Alur Cara Mengajukan Permohonan</b></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
        <div class="card-body">
            <div class="image">
                    <img src="{{ asset('assets/img/1.png') }}" width="515px" alt="1.png">
                    <img src="{{ asset('assets/img/2.png') }}" width="515px" alt="2.png">
            </div>
        </div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0"><b>Alur Cara Melihat Permohonan</b></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
        <div class="card-body">
            <div class="image">
                    <img src="{{ asset('assets/img/3.png') }}" width="515px" alt="3.png">
                    <img src="{{ asset('assets/img/4.png') }}" width="515px" alt="4.png">
            </div>
        </div>
</div>
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
                <img src="{{ asset('assets/img/5.png') }}" width="515px" alt="5.png">
                <img src="{{ asset('assets/img/6.png') }}" width="515px" alt="6.png">
            </div>
        </div>
    </div>
@endsection
