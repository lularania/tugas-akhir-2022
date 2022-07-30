@extends('layouts.app')

@section('title', 'Kemahasiswaan | Jenis Penanganan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item active">Jenis Penanganan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Data Jenis Penanganan</b></h3>
        </div>
        <div class="card-body">
            <a href="{{ route('kemahasiswaan.jenis-penanganan.add') }}" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Jenis Penanganan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($penanganan as $key => $item)
                        <tr class="text-center">
                            <td>{{ $penanganan->firstItem() + $key }}</td>
                            <td>{{ $item->jenis_penanganan }}</td>
                            <td>
                                <a href="/kemahasiswaan/jenis-penanganan/detail/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-primary">Detail</button></a>
                                <a href="/kemahasiswaan/jenis-penanganan/edit/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($penanganan) < 1)
            <div class="float-left">
                Showing
                {{ $penanganan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $penanganan->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $penanganan->firstItem() }}
                to 
                {{ $penanganan->lastItem() }}
                of
                {{ $penanganan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $penanganan->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($penanganan as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Jenis Penanganan "{{ $data->jenis_penanganan }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="{{ route('kemahasiswaan.jenis-penanganan.delete', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
