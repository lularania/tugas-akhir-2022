@extends('layouts.app')

@section('title', 'Psikolog | Tambah Permohonan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('psikolog') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('psikolog.permohonan-layanan-dikonfirmasi') }}">Data Permohonan</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah Permohonan</b></h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Penjadwalan Pemeriksaan Lanjutan</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Hasil Pemeriksaan Langsung</a>
                </li>
              </ul>
              <br>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{ route('psikolog.permohonan-layanan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Data Mahasiswa</label>
                                    <select class="form-control theSelect1" name="id_mahasiswa">
                                        <option>Data Mahasiswa</option>
                                        @foreach ($mahasiswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nrp. ' | ' .$item->nama. ' | ' .$item->prodi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Penanganan</label>
                                    <select class="form-control" name="jenis_penanganan">
                                        <option>Pilih Jenis Penanganan</option>
                                        @foreach ($penanganan as $item)
                                            <option value="{{ $item->jenis_penanganan }}">{{ $item->jenis_penanganan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Metode Penanganan</label>
                                    <select class="form-control" name="id_status">
                                        <option>Pilih Jenis Metode Penanganan</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}">{{ $item->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="id_layanan" value="{{ 2 }}" />
                                <div class="form-group">
                                    <label>Judul Keluhan</label>
                                    <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ old('judul_keluhan') }}" placeholder="Masukkan Judul">
                                    <div class="invalid-feedback">
                                        @error('judul_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Penanganan Berikutnya <small>*Sertakan Tanggal dan Waktu Penjadwalan Pemeriksaan Lanjutan</small></label>
                                    <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Masukkan Deskripsi" value="{{ old('deskripsi_keluhan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('deskripsi_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Hasil Penanganan Sementara <small>*Sertakan Tanggal dan Waktu Penjadwalan Pemeriksaan Lanjutan</small></label>
                                    <textarea name="penanganan" class="form-control @error('penanganan') is-invalid @enderror" rows="3" placeholder="Hasil Penanganan Sementara" value="{{ old('penanganan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('penanganan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-group mt-4">
                                    <a href="{{ route('psikolog.permohonan-layanan-dikonfirmasi') }}" class="btn btn-dark btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="{{ route('psikolog.permohonan-layanan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Data Mahasiswa</label>
                                    <select class="form-control theSelect2" name="id_mahasiswa">
                                        <option>Data Mahasiswa</option>
                                        @foreach ($mahasiswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nrp. ' | ' .$item->nama. ' | ' .$item->prodi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="id_layanan" value="{{ 2 }}" />
                                <input type="hidden" name="jenis_penanganan" value="{{ "Via Offline Tatap Muka" }}" />
                                <input type="hidden" name="id_status" value="{{ 9 }}" />
                                <div class="form-group">
                                    <label>Judul Keluhan</label>
                                    <input name="judul_keluhan" class="form-control @error('judul_keluhan') is-invalid @enderror" value="{{ old('judul_keluhan') }}" placeholder="Masukkan Judul">
                                    <div class="invalid-feedback">
                                        @error('judul_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Keluhan</label>
                                    <textarea name="deskripsi_keluhan" class="form-control @error('deskripsi_keluhan') is-invalid @enderror" rows="3" placeholder="Opsional" value="{{ old('deskripsi_keluhan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('deskripsi_keluhan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Hasil Penanganan</label>
                                    <textarea name="penanganan" class="form-control @error('penanganan') is-invalid @enderror" rows="3" placeholder="Hasil Penanganan" value="{{ old('penanganan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('penanganan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('psikolog.permohonan-layanan-dikonfirmasi') }}" class="btn btn-dark btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts')
<script>
    $(".theSelect1").select2();
</script>
<script>
    $(".theSelect2").select2({
        width: '100%'
    });
</script>
@endsection