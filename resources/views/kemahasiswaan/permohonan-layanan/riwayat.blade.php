@extends('layouts.app')

@section('title', 'Kemahasiswaan | Riwayat Permohonan')

@section('header')
    <div class="col-sm-4">
        <form action="/kemahasiswaan/riwayat/permohonan-layanan" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="NRP Mahasiswa">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-8">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item active">Permohonan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Data Permohonan</b></h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NRP</th>
                        <th>Judul Keluhan</th>
                        <th>Layanan</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                {{-- @php
                var_dump($permohonan);
                @endphp --}}
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($permohonan as $key => $item)
                        <tr class="text-center">
                            <td>{{ $permohonan->firstItem() + $key }}</td>
                            <td>{{ $item->nrp }}</td>
                            <td>{{ $item->judul_keluhan }}</td>
                            <td>{{ $item->layanan }}</td>
                            <td><span class="badge badge-{{ $colors[($item->id_status - 1) % count($colors)] }}">{{ $item->status }}</span></td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('kemahasiswaan.permohonan-layanan.detail', $item->id_permohonan) }}" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($permohonan) < 1)
            <div class="float-left">
                Showing
                {{ $permohonan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $permohonan->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $permohonan->firstItem() }}
                to 
                {{ $permohonan->lastItem() }}
                of
                {{ $permohonan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $permohonan->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
@endsection
