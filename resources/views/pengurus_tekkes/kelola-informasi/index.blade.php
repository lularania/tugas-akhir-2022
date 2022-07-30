@extends('layouts.app')

@section('title', 'Pengurus Tekkes | Informasi Kesehatan')

@section('header')
    <div class="col-sm-4">
        <form action="/pengurus-tekkes/kelola-informasi" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Judul">
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
            <a href="{{ route('pengurus-tekkes.kelola-informasi.add') }}" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Pembimbing</th>
                        <th>Judul</th>
                        <th>Sumber</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($informasi as $key => $item)
                        <tr class="text-center">
                            <td>{{ $informasi->firstItem() + $key }}</td>
                            <td>{{ $item->nama_tenaga_kesehatan }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->sumber }}</td>
                            <td><span class="badge badge-{{ $colors[($item->id_status - 1) % count($colors)] }}">{{ $item->status }}</span></td>
                            <td>
                                <a href="/pengurus-tekkes/kelola-informasi/detail/{{ $item->id }}" class="btn btn-sm btn-primary">Detail</a>
                                <a href="/pengurus-tekkes/kelola-informasi/edit/{{ $item->id }}" class="btn btn-sm btn-warning {{ $item->id_status == '1' ? '' : 'disabled' }}">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger {{ $item->id_status == '1' ? '' : 'disabled' }}" data-toggle="modal" data-target="{{ $item->id_status == '1' ? '#delete' . $item->id : '' }}">
                                    Delete
                                </button>                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($informasi) < 1)
            <div class="float-left">
                Showing
                {{ $informasi->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $informasi->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $informasi->firstItem() }}
                to 
                {{ $informasi->lastItem() }}
                of
                {{ $informasi->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $informasi->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($informasi as $data)
    <div class="modal fade" id="delete{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Informasi Kesehatan | {{ $data->judul }}"</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus data ini?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                    <a href="/pengurus-tekkes/kelola-informasi/delete/{{ $data->id }}" class="btn btn-sm btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
@endsection
