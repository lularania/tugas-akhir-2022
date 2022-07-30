@extends('layouts.app')

@section('title', 'Kemahasiswaan | Program Studi')

@section('header')
<div class="col-sm-4">
    <form action="/kemahasiswaan/prodi" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Nama Program Studi">
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
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item active">Program Studi</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Data Jenis Program Studi</b></h3>
        </div>
        <div class="card-body">
            <a href="{{ route('kemahasiswaan.prodi.add') }}" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($prodi as $key => $item)
                        <tr class="text-center">
                            <td>{{ $prodi->firstItem() + $key }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>
                                <a href="/kemahasiswaan/prodi/detail/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-primary">Detail</button></a>
                                <a href="/kemahasiswaan/prodi/edit/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($prodi) < 1)
            <div class="float-left">
                Showing
                {{ $prodi->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $prodi->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $prodi->firstItem() }}
                to 
                {{ $prodi->lastItem() }}
                of
                {{ $prodi->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $prodi->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($prodi as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Program Studi "{{ $data->prodi }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="{{ route('kemahasiswaan.prodi.delete', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
