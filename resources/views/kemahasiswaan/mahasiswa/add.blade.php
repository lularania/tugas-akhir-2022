@extends('layouts.app')

@section('title', 'Kemahasiswaan | Add User Mahasiswa')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/kemahasiswaan">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/user/mahasiswa">User Mahasiswa</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah User Mahasiswa</b></h3>
        </div>
        <div class="card-body">
            <form action="/kemahasiswaan/user/mahasiswa/save" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>NRP</label>
                            <input name="nrp" class="form-control @error('nrp') is-invalid @enderror" value="{{ old('nrp') }}">
                            <div class="invalid-feedback">
                                @error('nrp')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <select class="form-control" name="prodi">
                                <option>Pilih Program Studi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->prodi }}">{{ $item->prodi }}</option>
                                @endforeach 
                            </select>
                        </div>
                        <input type="hidden" name="id_role" value="{{ $roles->id }}" />
                        <input type="hidden" name="role" value="{{ $roles->name }}" />
                        <div class="form-group">
                            <label>Role</label>
                            <input name="mahasiswa" class="form-control @error('mahasiswa') is-invalid @enderror" value="Mahasiswa" readonly>
                            <div class="invalid-feedback">
                                @error('mahasiswa')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <select class="form-control" name="angkatan">
                                <option>Pilih Angkatan</option>
                                @foreach ($angkatan as $item)
                                    <option value="{{ $item->angkatan }}">{{ $item->angkatan }}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas">
                                <option>Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                            <div class="invalid-feedback">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('kemahasiswaan.user.mahasiswa') }}" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
