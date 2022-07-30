@extends('layouts.app')

@section('title', 'Profile')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Profile</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ Auth::user()->nama }}" readonly>
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" readonly>
                            <div class="invalid-feedback">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ Auth::user()->password }}">
                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @if (Auth::user()->id_role == 3 || Auth::user()->id_role == 4)
                        <div class="form-group">
                            <label>Link Meeting</label>
                            <input name="link_meeting" class="form-control @error('link_meeting') is-invalid @enderror" value="{{ Auth::user()->tenagakesehatan->link_meeting }}">
                            <div class="invalid-feedback">
                                @error('link_meeting')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group mt-4">
                            <a href="/" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
