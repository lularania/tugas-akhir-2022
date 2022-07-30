@extends('layouts.app')

@section('title', 'Kemahasiswaan | User Kemahasiswaan')

@section('header')
<div class="col-sm-4">
    <form action="/kemahasiswaan/user/kemahasiswaan" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Nama Kemahasiswaan">
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
            <li class="breadcrumb-item active">User Kemahasiswaan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Data User Kemahasiswaan</b></h3>
        </div>
        <div class="card-body">
            <a href="/kemahasiswaan/user/kemahasiswaan/add" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan Pegawai</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($kemahasiswaan as $key => $data)
                        <tr class="text-center">
                            <td>{{ $kemahasiswaan->firstItem() + $key }}</td>
                            <td>{{ $data->nip }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jabatan }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="/kemahasiswaan/user/kemahasiswaan/detail/{{ $data->id }}" class="btn btn-sm btn-primary">Detail</a>
                                <a href="/kemahasiswaan/user/kemahasiswaan/edit/{{ $data->id }}" class="btn btn-sm btn-warning">Edit</a>
                                {{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                    Delete
                                </button> --}}
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($kemahasiswaan) < 1)
            <div class="float-left">
                Showing
                {{ $kemahasiswaan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $kemahasiswaan->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $kemahasiswaan->firstItem() }}
                to 
                {{ $kemahasiswaan->lastItem() }}
                of
                {{ $kemahasiswaan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $kemahasiswaan->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($kemahasiswaan as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data "{{ $data->nama }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data {{ $data->nip }} | {{$data->nama}} ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="/kemahasiswaan/user/kemahasiswaan/delete/{{ $data->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection