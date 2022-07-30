@extends('layouts.app')

@section('title', 'Mahasiswa | Permohonan')

@section('header')
    <div class="col-sm-4">
        <form action="{{ route('mahasiswa.permohonan-layanan') }}" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Judul Keluhan">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-8">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Permohonan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Data Permohonan Layanan</b></h3>
        </div>
        <div class="card-body">
            <a href="/mahasiswa/permohonan-layanan/add" class="btn btn-dark btn-sm mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center" >
                        <th>No</th>
                        <th style="width: 200px;">Judul Keluhan</th>
                        <th style="width: 175px;">Layanan</th>
                        <th>Status</th>
                        <th style="width: 200px;">Tanggal Pengajuan</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($permohonan as $key => $item)
                        <tr class=text-center>
                            <td>{{ $permohonan->firstItem() + $key  }}</td>
                            <td>{{ $item->judul_keluhan }}</td>
                            <td>{{ $item->layanan }}</td>
                            <td><span class="badge badge-{{ $colors[($item->id_status - 1) % count($colors)] }}">{{ $item->status }}</span></td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <a href="/mahasiswa/permohonan-layanan/detail/{{ $item->id_permohonan }}" class="btn btn-sm btn-primary">Detail</a>
                                <a href="/mahasiswa/permohonan-layanan/edit/{{ $item->id_permohonan }}" class="btn btn-sm btn-warning {{ $item->id_status == '1' ? '' : 'disabled' }}">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger {{ $item->id_status == '1' ? '' : 'disabled' }}" data-toggle="modal" data-target="{{ $item->id_status == '1' ? '#delete' . $item->id_permohonan : '' }}">
                                    Delete
                                </button>
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

   @foreach ($permohonan as $data)
        <div class="modal fade" id="delete{{ $data->id_permohonan }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Permohonan Layanan | {{ $data->judul_keluhan }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="/mahasiswa/permohonan-layanan/delete/{{ $data->id_permohonan }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
