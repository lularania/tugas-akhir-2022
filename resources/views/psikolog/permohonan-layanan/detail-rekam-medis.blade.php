@extends('layouts.app')

@section('title', 'Psikologi | Detail Rekam Medis')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('psikolog') }}">Home</a></li>
            <li class="breadcrumb-item active">Detail Rekam Medis</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-right"><b>Rekam Medis</b></h3>
            <h3 class="card-title float-left"><b>{{ $permohonans->nrp. ' | ' .$permohonans->nama. ' | ' .$permohonans->prodi }}</b></h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="container-fluid timeline-container card">
                    <!-- Timelime example  -->
                    <div class="timeline-row row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            @foreach ($permohonan as $item)
                            <div class="timeline">
                                <br>
                                @if ($item->id_status == 7)
                                <div class="time-label">
                                    <span class="bg-yellow">{{ Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</span> 
                                </div>
                                <div>
                                    <i class="fa fa-user bg-success"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock mr-1"></i>{{ Carbon\Carbon::parse($item->created_at)->format('h:i a') }}</span>
                                        {{-- <h3 class="timeline-header no-border"><a class="mr-2">{{ $item->prodi != null ? $item->nama . ', ' . $item->prodi : $item->prodi }}</a>Permohonan Diajukan</h3> --}}
                                        <h2 class="timeline-header no-border"><b>Keluhan</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->judul_keluhan }}</h4>
                                        <h2 class="timeline-header no-border"><b>Deskripsi</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->deskripsi_keluhan }}</h4>
                                        <h2 class="timeline-header no-border"><b>Status</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->status }}</h4>
                                        @if ($item->id_status == 7 || $item->id_status == 9 && $tangani != null)
                                        <h2 class="timeline-header no-border"><b>Hasil Penanganan</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->penanganan }}</h4>
                                        @endif
                                        <h2 class="timeline-header no-border"><b>Ditangani Oleh</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->nama_tenaga_kesehatan. ' | ' .$item->jabatan_tenaga_kesehatan}}</h4>                                        @if (substr($item->berkas, -3) == 'pdf')
                                        <h2 class="timeline-header"><a href="{{ route('psikolog.permohonan-layanan.view', $item->id_permohonan) }}" target="__blank" class="btn btn-block btn-info btn-sm btn-icon">
                                            <span>Lihat File</span>
                                            <i class="far fa-eye"></i></a></h2>
                                        <h2 class="timeline-header"><a href="{{ route('psikolog.permohonan-layanan.download', $item->id_permohonan) }}" target="__blank" class="btn btn-block btn-info btn-sm btn-icon">
                                            <span>Download File</span>
                                            <i class="fas fa-file-download"></i></a></h2>
                                        @endif
                                    </div>
                                </div>
                                @elseif ($item->id_status == 9)
                                <div class="time-label">
                                    <span class="bg-red">{{ Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</span>
                                </div>
                                <div>
                                    <i class="fa fa-user bg-orange"></i>
                                    <div class="timeline-item card-tools">
                                        <span class="time"><i class="fas fa-clock mr-1"></i>{{ Carbon\Carbon::parse($item->updated_at)->format('h:i a') }}</span>
                                        {{-- <h3 class="timeline-header no-border"><a class="mr-2">{{ $item->prodi != null ? $item->nama . ', ' . $item->prodi : $item->prodi }}</a>Permohonan Diajukan</h3> --}}
                                        <h2 class="timeline-header no-border"><b>Keluhan</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->judul_keluhan }}</h4>
                                        <h2 class="timeline-header no-border"><b>Deskripsi</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->deskripsi_keluhan }}</h4>
                                        <h2 class="timeline-header no-border"><b>Status</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->status }}</h4>
                                        @if ($item->id_status == 7 || $item->id_status == 9 && $tangani != null)
                                        <h2 class="timeline-header no-border"><b>Hasil Penanganan</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->penanganan }}</h4>
                                        @endif
                                        <h2 class="timeline-header no-border"><b>Ditangani Oleh</b></h2>
                                        <h4 class="timeline-header no-border">{{ $item->nama_tenaga_kesehatan. ' | ' .$item->jabatan_tenaga_kesehatan}}</h4>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            {{-- </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /.card-body -->
</div>
</div>
</div>
</div>
@if ($permohonan != null)
<div class="float-left mx-3">
    Showing
    {{ $permohonan->firstItem() }}
    to 
    {{ $permohonan->lastItem() }}
    of
    {{ $permohonan->total() }}
    entries
</div>
<div class="float-right mx-3">
    {{ $permohonan->links("pagination::bootstrap-4") }}
</div>
@endif
<br>
<br>
</div>
{{-- @endforeach --}}
        <!-- /.card-body -->
    {{-- </div> --}}
    <br>
@endsection
