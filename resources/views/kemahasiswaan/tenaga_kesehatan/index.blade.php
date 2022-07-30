@extends('layouts.app')

@section('title', 'Kemahasiswaan | Tenaga Kesehatan')

@section('header')
<div class="col-sm-4">
    <form action="/kemahasiswaan/tenaga-kesehatan" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Nama Tenaga Kesehatan">
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
            <li class="breadcrumb-item active">Data Tenaga Kesehatan</li>
        </ol>
    </div>
    <hr>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Akumulasi Data Tenaga Kesehatan</b></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $role1 }}</h3>
                                    <p>Total Dokter</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $role2 }}</h3>
                                    <p>Total Psikolog</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Data Tenaga Kesehatan</b></h3>
        </div>
        <div class="card-body">
            <a href="{{ route('kemahasiswaan.tenaga-kesehatan.add') }}" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pekerjaan</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($tenagakesehatan  as $key => $item)
                        <tr class="text-center">
                            <td>{{ $tenagakesehatan->firstItem() + $key }}</td>
                            <td>{{ $item->nama_tenaga_kesehatan }}</td>
                            <td>{{ Str::of($item->name)->title() }}</td>
                            <td>{{ $item->jabatan_tenaga_kesehatan }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('kemahasiswaan.tenaga-kesehatan.detail', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                <a href="{{ route('kemahasiswaan.tenaga-kesehatan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($tenagakesehatan) < 1)
            <div class="float-left">
                Showing
                {{ $tenagakesehatan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $tenagakesehatan->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $tenagakesehatan->firstItem() }}
                to 
                {{ $tenagakesehatan->lastItem() }}
                of
                {{ $tenagakesehatan->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $tenagakesehatan->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($tenagakesehatan as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data "{{ $data->nama_tenaga_kesehatan }} | {{ $data->jabatan_tenaga_kesehatan }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="{{ route('kemahasiswaan.tenaga-kesehatan.delete', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
